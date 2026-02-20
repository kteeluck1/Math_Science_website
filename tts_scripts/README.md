This folder contains helper files to generate narrated audio (MP3) from step text using gTTS (Google Text-to-Speech) or similar local TTS tools.

Requirements
- Python 3.7+
- Install dependencies:

```bash
pip install gTTS
pip install pydub    # optional, to convert/merge formats (requires ffmpeg)
```

Generate audio (MP3) for all steps:

```bash
python generate_audio.py
```

The script will read the `steps/` folder and produce MP3 files into `output/`.

If you prefer another TTS provider, replace the content-reading portion with the provider's API call.
