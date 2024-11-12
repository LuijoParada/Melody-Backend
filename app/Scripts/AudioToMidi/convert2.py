import os
import numpy as np
from basic_pitch import ICASSP_2022_MODEL_PATH
from basic_pitch.inference import predict_and_save
import librosa
from music21 import converter, clef, meter
from music21 import environment

# Set the path to LilyPond
us = environment.UserSettings()
usPath = 'C:\\Program Files (x86)\\LilyPond\\usr\\bin\\lilypond.exe'
us['lilypondPath'] = usPath

def process_audio(input_path, output_path):
    print(f"Processing file: {input_path}")
    try:
        # Read audio file
        data, sample_rate = librosa.load(input_path, sr=None, mono=True)
        print(f"Original audio: shape={data.shape}, sample_rate={sample_rate}, min={np.min(data)}, max={np.max(data)}")

        # Predict pitch and create MIDI using Basic Pitch's built-in functions
        predict_and_save(
            audio_path_list=[input_path],
            output_directory=os.path.dirname(output_path),
            save_midi=True,
            sonify_midi=False,
            save_notes=False,
            save_model_outputs=False,
            onset_threshold=1.0,
            frame_threshold=0.3,
            minimum_note_length=120,
            midi_tempo=160,
            model_or_model_path=ICASSP_2022_MODEL_PATH,
            minimum_frequency=60,
            maximum_frequency=120,
            multiple_pitch_bends=False,
        )
        # Rename the output file to match the desired output path with the _basic_pitch suffix
        default_output = os.path.join(os.path.dirname(output_path), os.path.basename(input_path).rsplit('.', 1)[0] + '_basic_pitch.mid')
        if os.path.exists(default_output):
            os.rename(default_output, output_path)

        print(f"MIDI file saved: {output_path}")
    
    except Exception as e:
        print(f"Error processing {input_path}: {str(e)}")

def midi_to_pdf(midi_path, pdf_path, chosen_clef='treble'):
    # Convert MIDI to music21 stream
    midi_stream = converter.parse(midi_path)

    # Set 4/4 time signature
    time_signature = meter.TimeSignature('4/4')
    for part in midi_stream.parts:
        part.insert(0, time_signature)

    # Add clef based on user choice
    if chosen_clef.lower() == 'bass':
        for part in midi_stream.parts:
            part.insert(0, clef.BassClef())
    else:
        for part in midi_stream.parts:
            part.insert(0, clef.TrebleClef())

    # Save modified stream to a new MIDI file
    modified_midi_path = 'modified_midi_file.mid'
    midi_stream.write('midi', fp=modified_midi_path)

    # Create PDF using the original method
    midi_stream.write('lily.pdf', fp=pdf_path)

# Define input, output MIDI and output PDF directories
input_dir = "C:\\aplicacion-web\\Melody\\public\\temp\\input"
output_midi_dir = "C:\\aplicacion-web\\Melody\\public\\temp\\output"
output_pdf_dir = "C:\\aplicacion-web\\Melody\\public\\temp\\output-pdf"

# Create output directories if they don't exist
for directory in [output_midi_dir, output_pdf_dir]:
    if not os.path.exists(directory):
        os.makedirs(directory)

# Process all audio files in the input directory
for filename in os.listdir(input_dir):
    if filename.endswith((".wav", ".mp3", ".ogg", ".flac")):
        input_path = os.path.join(input_dir, filename)
        output_midi_path = os.path.join(output_midi_dir, os.path.splitext(filename)[0] + "_basic_pitch.mid")
        output_pdf_path = os.path.join(output_pdf_dir, os.path.splitext(filename)[0])

        print(f"\nProcessing {filename}...")
        # Process audio and create MIDI
        process_audio(input_path, output_midi_path)
        # Convert MIDI to PDF
        print(f"\nConverting to pdf: {filename}...")
        midi_to_pdf(output_midi_path, output_pdf_path, chosen_clef='bass')

print("\nAll conversions completed.")
