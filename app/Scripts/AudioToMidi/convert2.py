import os
import numpy as np
from basic_pitch import ICASSP_2022_MODEL_PATH
from basic_pitch.inference import predict_and_save
import librosa
import mido
import math
print(os.getcwd()+" ")
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
            onset_threshold=1.5,
            frame_threshold=0.3,
            minimum_note_length=120,
            midi_tempo=160,
            model_or_model_path=ICASSP_2022_MODEL_PATH,
            minimum_frequency=60,
            maximum_frequency=120, 
            multiple_pitch_bends=False,
        )
        
        # Rename the output file to match the desired output path
        default_output = os.path.join(os.path.dirname(output_path), os.path.basename(input_path).rsplit('.', 1)[0] + '.midi')
        if os.path.exists(default_output):
            os.rename(default_output, output_path)
        
        # Convert to monophonic MIDI
        convert_to_monophonic(output_path+"_basic_pitch")
        
        print(f"Monophonic MIDI file saved: {output_path}")
        
    except Exception as e:
        print(f"Error processing {input_path}: {str(e)}")


def freq_to_midi_note(freq):
    return 69 + 12 * math.log2(freq / 440.0)

def midi_note_to_freq(note):
    return 440 * (2 ** ((note - 69) / 12))

def closest_midi_note(freq):
    midi_note = round(freq_to_midi_note(freq))
    return midi_note, midi_note_to_freq(midi_note)

def convert_to_monophonic(midi_path, min_duration=60, fixed_velocity=128):
    mid = mido.MidiFile(midi_path)
    new_mid = mido.MidiFile()
    new_track = mido.MidiTrack()
    new_mid.tracks.append(new_track)

    notes = []
    current_time = 0

    # Collect all notes and adjust to closest standard pitch
    for msg in mid.tracks[1]:
        current_time += msg.time
        if msg.type == 'note_on' and msg.velocity > 0:
            adjusted_note, _ = closest_midi_note(midi_note_to_freq(msg.note))
            notes.append((adjusted_note, current_time))
        elif msg.type == 'note_off' or (msg.type == 'note_on' and msg.velocity == 0):
            for i, (note, start_time) in enumerate(notes):
                if note == msg.note:
                    duration = current_time - start_time
                    notes[i] = (note, start_time, duration)
                    break

    # Sort notes by start time, then by pitch (lower first)
    notes.sort(key=lambda x: (x[1], -x[0]))

    # Filter notes by duration and create new monophonic track
    first_note_start = None
    last_end_time = 0
    for note, start_time, duration in notes:
        if duration >= min_duration:
            if first_note_start is None:
                first_note_start = start_time
            
            relative_start = start_time - first_note_start
            if relative_start < last_end_time:
                relative_start = last_end_time
            
            delta_time = int(round((relative_start - last_end_time) * mid.ticks_per_beat))
            new_track.append(mido.Message('note_on', note=note, velocity=fixed_velocity, time=delta_time))
            new_track.append(mido.Message('note_off', note=note, velocity=fixed_velocity, time=int(round(duration * mid.ticks_per_beat))))

            last_end_time = relative_start + duration

    # Save the new MIDI file
    new_mid.save(midi_path)

# Define input and output directories
#
# Mauricio para bola a esto, hay que estar pendiente del directorio de trabajo
#
#quiero que el input sea la carpeta de storage/app/temp/input de laravel
#input_dir = "..\\..\\..\\storage\\app\\temp\\input"
input_dir = "C:\\xampp\\htdocs\\aplicacion web\\Melody\\storage\\app\\temp\\input"
print(input_dir)
#quiero que el output vaya a la carpeta de storage/app/temp/output de laravel
#output_dir = "..\\..\\..\\storage\\app\\temp\\output"
output_dir = "C:\\xampp\\htdocs\\aplicacion web\\Melody\\storage\\app\\temp\\output"


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