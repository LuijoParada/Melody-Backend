<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class AudioController extends Controller
{
    public function convertAudioToMidi(Request $request)
    {
        // Validar que se ha subido un archivo de audio
        $request->validate([
            'audio_file' => 'required|mimes:mp3,wav,ogg,flac|max:20480', // Máximo 20MB
        ]);

        // Guardar el archivo en la carpeta 'input' para procesarlo
        $audioFile = $request->file('audio_file');
        $inputPath = storage_path('app/input/' . $audioFile->getClientOriginalName());
        $audioFile->move(storage_path('app/input'), $audioFile->getClientOriginalName());

        // Definir el path para la salida
        $outputPath = storage_path('app/output/' . pathinfo($audioFile->getClientOriginalName(), PATHINFO_FILENAME) . '.midi');

        // Comando para ejecutar el script de Python
        $process = new Process(['python', base_path('app/Scripts/AudioToMidi/tu_script.py'), $inputPath, $outputPath]);
        $process->run();

        // Verificar si el proceso ha fallado
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Retornar la respuesta si el proceso es exitoso y descargar el archivo generado
        return response()->download($outputPath)->deleteFileAfterSend(true);
        //esto hara que el archivo se elimine despues de ser descargado
        //download es un metodo de laravel que permite descargar un archivo una vez que recibe la respuesta
    }
    //funcion para guardar el archivo de partitura en la carpeta publica en una carpeta llamada partituras
    public function saveSheetMusic(Request $request)
    {
        // Validar que se ha subido un archivo de partitura
        $request->validate([
            'sheet_music' => 'required|mimes:pdf|max:2048', // Máximo 2MB
        ]);

        // Guardar el archivo en la carpeta 'partituras'
        $sheetMusic = $request->file('sheet_music');
        $sheetMusic->move(public_path('partituras'), $sheetMusic->getClientOriginalName());

        // Retornar la respuesta con el path del archivo guardado
        return response()->json([
            'message' => 'Partitura guardada correctamente',
            'path' => asset('partituras/' . $sheetMusic->getClientOriginalName())
        ]);
    }
}
