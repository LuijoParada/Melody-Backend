<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
use App\Models\Partitura;  // Aquí se importa la clase Partitura


class ConvertionController extends Controller
{
    public function convertAudioToMidi(Request $request)
    {
        //borrar archivos temporales
        $inputPath = public_path('temp/input');
        $outputPath = public_path('temp/output');
        $outputpdf = public_path('temp/output-pdf');

        // Borrar archivos temporales
        array_map('unlink', glob("$inputPath/*"));
        array_map('unlink', glob("$outputPath/*"));
        array_map('unlink', glob("$outputpdf/*"));

        // Validar que el archivo de audio vino en la petición y que es un archivo de audio sino devolver un error
        if (!$request->hasFile('audiofile') || !$request->file('audiofile')->isValid()) {
            return response()-> json([
                'message' => 'Revisa el formato del archivo de audio.',
                'error' => '400'
            ], 400);
        }
        // Crear un nombre único para el archivo de audio y guardarlo en la carpeta public/temp/input
        $audio = $request->file('audiofile');
        $audioName = uniqid(pathinfo($audio->getClientOriginalName(), PATHINFO_FILENAME).'_') . '.' . $audio->extension();
        $audio->move(public_path('temp/input'), $audioName);//guardar el archivo en la carpeta input de la carpeta temp en public

        // Ruta absoluta al script de Python
        $scriptPath = base_path('app\\Scripts\\AudioToMidi\\convert2.py');

        // Verificar si el archivo existe
        if (file_exists($scriptPath)) {
            response()->json([
                'message' => 'El archivo no existe en la ruta especificada.',
                'path' => $scriptPath
            ], 200);
        }
        // Ejecutar el script con la ruta absoluta y capturar salida y errores
        $output = shell_exec("py \"$scriptPath\" 2>&1");

        //confirmar que el archivo convertido existe y mandar mensaje de éxitoa
        if($output === null) {//si el output es null significa que hubo un error
        return response()->json([
            'message' => 'Hubo un error al ejecutar el script.',
            'error' => $output
        ], 500);
        }

        // Nombre del archivo MIDI convertido
        $midiName = pathinfo($audioName, PATHINFO_FILENAME) .'_basic_pitch.mid';
        $pdfname = pathinfo($audioName, PATHINFO_FILENAME) .'.pdf';

        // Confirmar que el archivo convertido existe en la carpeta de salida
        $outputPath = public_path("temp\\output\\{$midiName}");
        $outputPdfPath = public_path("temp\\output-pdf\\{$pdfname}");

        if (!file_exists($outputPath) || !file_exists($outputPdfPath)) {
            $missingFiles = [];
            if (!file_exists($outputPath)) {
                $missingFiles[] = $midiName;
            }
            if (!file_exists($outputPdfPath)) {
                $missingFiles[] = $pdfname;
            }

            return response()->json([
                'message' => 'No se encontró el archivo MIDI o el archivo PDF.',
                'missingFiles' => $missingFiles,
                'outputPath' => $outputPath,
                'outputPdfPath' => $outputPdfPath,
                'error' => $output
            ], 500);
        }

        return response()->json([
            'message' => 'El archivo MIDI y el pdf fueron generados con éxito.',
            'name' => $midiName,
            'pdf' => $pdfname,
            'audioname' => $audioName,
            'midiurl' => url("temp/output/{$midiName}"),
            'pdfurl' => url("temp/output-pdf/{$pdfname}")
        ], 200);
    }

    public function saveToFavorites(Request $request)
    {
        // Validar que se proporcionan los datos necesarios
        $request->validate([
            'audio_name' => 'required|string',
            'pdf_name' => 'required|string',
            'id_usuario' => 'required|exists:users,id',
        ]);
    
        // Obtener el ID del usuario desde la solicitud
        $userId = $request->input('id_usuario');
    
        // Confirmar las rutas de los archivos
        $tempAudioPath = public_path('temp/input');
        $tempPdfPath = public_path('temp/output-pdf');
        $favoritesAudioPath = public_path('favorites/audio');
        $favoritesPdfPath = public_path('favorites/pdf');
    
        $audioName = $request->input('audio_name');
        $pdfName = $request->input('pdf_name');
    
        $sourceAudioFile = "{$tempAudioPath}/{$audioName}";
        $sourcePdfFile = "{$tempPdfPath}/{$pdfName}";
    
        if (!file_exists($sourceAudioFile) || !file_exists($sourcePdfFile)) {
            $missingFiles = [];
            if (!file_exists($sourceAudioFile)) {
                $missingFiles[] = $audioName;
            }
            if (!file_exists($sourcePdfFile)) {
                $missingFiles[] = $pdfName;
            }
    
            return response()->json([
                'message' => 'No se encontraron los archivos especificados en las carpetas temporales.',
                'missingFiles' => $missingFiles,
            ], 404);
        }
    
        // Crear las carpetas de destino si no existen
        if (!is_dir($favoritesAudioPath)) {
            mkdir($favoritesAudioPath, 0755, true);
        }
        if (!is_dir($favoritesPdfPath)) {
            mkdir($favoritesPdfPath, 0755, true);
        }
    
        // Mover los archivos a las carpetas de favoritos
        $destinationAudioFile = "{$favoritesAudioPath}/{$audioName}";
        $destinationPdfFile = "{$favoritesPdfPath}/{$pdfName}";
    
        if (!rename($sourceAudioFile, $destinationAudioFile) || !rename($sourcePdfFile, $destinationPdfFile)) {
            return response()->json([
                'message' => 'Error al mover los archivos a las carpetas de favoritos.',
                'audio' => file_exists($destinationAudioFile) ? 'Movido con éxito' : 'Error',
                'pdf' => file_exists($destinationPdfFile) ? 'Movido con éxito' : 'Error',
            ], 500);
        }
    
        // Guardar la información en la base de datos
        $partitura = new Partitura([
            'id_usuario' => $userId,
            'nombre_pdf' => $pdfName,
            'ruta_pdf' => "favorites/pdf/{$pdfName}",
            'nombre_audio' => $audioName,
            'ruta_audio' => "favorites/audio/{$audioName}",
            'fecha_generacion' => now(),
        ]);
        $partitura->save();
    
        // Retornar respuesta de éxito
        return response()->json([
            'message' => 'Los archivos se movieron a favoritos con éxito.',
            'audioPath' => url($partitura->ruta_audio),
            'pdfPath' => url($partitura->ruta_pdf),
        ], 200);
    }
    public function getFavorites($userId)
    {
        $favorites = Partitura::where('id_usuario', $userId)->get();
        return response()->json($favorites);
    }
    
}
