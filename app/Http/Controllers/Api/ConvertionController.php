<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;


class ConvertionController extends Controller
{
    // public function test()
    // {
    //     // Ruta absoluta al script de Python
    //     $scriptPath = base_path('app/Scripts/AudioToMidi/convert2.py');

    //     // Verificar si el archivo existe
    //     if (file_exists($scriptPath)) {
    //         response()->json([
    //             'message' => 'El archivo existe en la ruta especificada.',
    //             'path' => $scriptPath
    //         ], 200);
    //     }

    // // Ejecutar el script con la ruta absoluta y capturar salida y errores
    // $output = shell_exec("python  \"$scriptPath\" 2>&1");
    // if ($output !== null) {
    //     return response()->json([
    //         'message' => 'Hubo un error al ejecutar el script.',
    //         'error' => $output
    //     ], 500);
    // }

    // // retornar el archivo midi generado junto con un mensaje de éxito

    // return response()->json([
    //     'message' => 'El archivo midi fue generado con éxito.',
    //     'path' => 'storage/app/public/temp/audio.mid'
    // ], 200);
    // }

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
            'midiurl' => url("temp/output/{$midiName}"),
            'pdfurl' => url("temp/output-pdf/{$pdfname}")
        ], 200);


    // Retornar el archivo MIDI generado
    // return response()->json([
    //     'message' => 'El archivo MIDI fue generado con éxito.',
    //     'name' => $midiName,
    //     'url' => url("storage/app/temp/output/{$midiName}"),
    // ], 200)->download(storage_path("app/temp/output/{$midiName}"));
    //return Response::download($outputPath, $midiName);
    }
}
