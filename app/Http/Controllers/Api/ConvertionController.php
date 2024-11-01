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
    public function test()
    {   
        // Ruta absoluta al script de Python
        $scriptPath = base_path('app/Scripts/AudioToMidi/convert2.py');
        
        // Verificar si el archivo existe
        if (file_exists($scriptPath)) {
            response()->json([
                'message' => 'El archivo existe en la ruta especificada.',
                'path' => $scriptPath
            ], 200);
        }
        
    // Ejecutar el script con la ruta absoluta y capturar salida y errores
    $output = shell_exec("python  \"$scriptPath\" 2>&1");
    if ($output !== null) {
        return response()->json([
            'message' => 'Hubo un error al ejecutar el script.',
            'error' => $output
        ], 500);
    }

    // retornar el archivo midi generado junto con un mensaje de éxito

    return response()->json([
        'message' => 'El archivo midi fue generado con éxito.',
        'path' => 'storage/app/public/temp/audio.mid'
    ], 200);
    }

    public function convertAudioToMidi(Request $request)
    {
        //borrar archivos temporales
        $inputPath = storage_path('app/temp/input');
        $outputPath = storage_path('app/temp/output');
        // Borrar archivos temporales
        array_map('unlink', glob("$inputPath/*"));
        array_map('unlink', glob("$outputPath/*"));
        
        // Validar que el archivo de audio vino en la petición y que es un archivo de audio sino devolver un error
        if (!$request->hasFile('audiofile') || !$request->file('audiofile')->isValid()) {
            return response()-> json([
                'message' => 'Revisa el formato del archivo de audio.',
                'error' => '400'
            ], 400);
        }
        // Crear un nombre único para el archivo de audio y guardarlo en la carpeta storage/app/temp/input
        $audio = $request->file('audiofile');
        $audioName = uniqid('audio_') . '.' . $audio->extension();
        $audio->storeAs('temp/input', $audioName);

        // Ruta absoluta al script de Python
        $scriptPath = base_path('app/Scripts/AudioToMidi/convert2.py');
        
        // Verificar si el archivo existe
        if (file_exists($scriptPath)) {
            response()->json([
                'message' => 'El archivo existe en la ruta especificada.',
                'path' => $scriptPath
            ], 200);
        }
        // Ejecutar el script con la ruta absoluta y capturar salida y errores
        $output = shell_exec("python  \"$scriptPath\" 2>&1");
        
        // Nombre del archivo MIDI convertido
        $midiName = pathinfo($audioName, PATHINFO_FILENAME) . '_basic_pitch.mid';

        // Confirmar que el archivo convertido existe en la carpeta de salida
        $outputPath = storage_path("\\app\\temp\\output\\{$midiName}");

        //confirmar que el archivo convertido existe y mandar mensaje de éxito
    // Confirmar que el archivo convertido exista
    if($output === null) {//si el output es null significa que hubo un error
        return response()->json([
            'message' => 'Hubo un error al ejecutar el script.',
            'error' => $output
        ], 500);
    }
    if (!file_exists($outputPath)) {
        return response()->json([
            'scan' => scandir(storage_path('app/public/temp/output')),
            'message' => 'no se encontró el archivo MIDI convertido.',
            'midiName' => $midiName,
            'outputPath' => $outputPath,
            'error' => $output
        ], 500);
    }

    // Retornar el archivo MIDI generado
    // return response()->json([
    //     'message' => 'El archivo MIDI fue generado con éxito.',
    //     'name' => $midiName,
    //     'url' => url("storage/app/temp/output/{$midiName}"),
    // ], 200)->download(storage_path("app/temp/output/{$midiName}"));
    return Response::download($outputPath, $midiName);
    }
}
