from gtts import gTTS
import os

STEPS_DIR = os.path.join(os.path.dirname(__file__), 'steps')
OUT_DIR = os.path.join(os.path.dirname(__file__), 'output')
os.makedirs(OUT_DIR, exist_ok=True)

for fname in sorted(os.listdir(STEPS_DIR)):
    if not fname.lower().endswith('.txt'):
        continue
    path = os.path.join(STEPS_DIR, fname)
    with open(path, 'r', encoding='utf-8') as f:
        text = f.read().strip()
    if not text:
        continue
    lang = 'en'
    tts = gTTS(text=text, lang=lang)
    out_name = os.path.splitext(fname)[0] + '.mp3'
    out_path = os.path.join(OUT_DIR, out_name)
    print('Generating', out_path)
    tts.save(out_path)

print('Done. MP3 files are in', OUT_DIR)
