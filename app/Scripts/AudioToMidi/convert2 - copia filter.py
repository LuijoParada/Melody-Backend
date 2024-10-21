import os
import numpy as np
from basic_pitch import ICASSP_2022_MODEL_PATH
from basic_pitch.inference import predict_and_save
import librosa

def process_audio(input_path, output_path):
    print(f"Processing file: {input_path}")
    
    try:
        # Read audio file
        data, sample_rate = librosa.load(input_path, sr=None, mono=True)
        
        print(f"Original audio: shape={data.shape}, sample_rate={sample_rate}, min={np.min(data)}, max={np.max(data)}")
        
        # Predict pitch and create MIDI using Basic Pitch's built-in functions
        predict_and_save(
            audio_path_list=[input_path],  # Changed to a list
            output_directory=os.path.dirname(output_path),
            save_midi=True,
            sonify_midi=False,
            save_notes=False,
            save_model_outputs=False,
            onset_threshold=0.5,
            frame_threshold=0.3,
            minimum_note_length=58,
            midi_tempo=160,
            model_or_model_path=ICASSP_2022_MODEL_PATH,
            minimum_frequency=40,
            maximum_frequency=100, 
            multiple_pitch_bends=False,
        )
        
        # Rename the output file to match the desired output path
        default_output = os.path.join(os.path.dirname(output_path), os.path.basename(input_path).rsplit('.', 1)[0] + '.midi')
        if os.path.exists(default_output):
            os.rename(default_output, output_path)
        
        print(f"MIDI file saved: {output_path}")
        
    except Exception as e:
        print(f"Error processing {input_path}: {str(e)}")

# Define input and output directories
input_dir = "input"
output_dir = "output"

# Create output directory if it doesn't exist
if not os.path.exists(output_dir):
    os.makedirs(output_dir)

# Process all audio files in the input directory
for filename in os.listdir(input_dir):
    if filename.endswith((".wav", ".mp3", ".ogg", ".flac")):
        input_path = os.path.join(input_dir, filename)
        output_path = os.path.join(output_dir, os.path.splitext(filename)[0] + ".midi")
        
        print(f"\nProcessing {filename}...")
        
        # Process audio and create MIDI
        process_audio(input_path, output_path)

print("\nAll conversions completed.")