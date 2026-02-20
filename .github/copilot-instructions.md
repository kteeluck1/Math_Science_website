# Copilot / Contributor Notes

Purpose
-------
This short guide explains the repository layout, conventions, and common tasks so GitHub Copilot or contributors can make consistent edits to the site.

Repository layout (high level)
------------------------------
- [math-hl.html](math-hl.html) — course/index page and sidebar of topics.
- math-hl/ — topic pages. Use `template-topic.html` as the scaffold for new topics.
- [math-hl/template-topic.html](math-hl/template-topic.html) — canonical topic template (includes MathJax and basic layout).
- [tts_scripts/](tts_scripts/) — helper scripts and step text files used to generate offline MP3 narration.

Key conventions
---------------
- Topic files: place in `math-hl/` and name using hyphens (e.g., `geometric-sequences.html`).
- Sidebar entries: update `math-hl.html` to add new topics. The sidebar expects a `.topic` button followed immediately by a `.children` div containing anchor links to the topic pages.
- Links: use relative hrefs that point to the `math-hl/` folder (e.g., `math-hl/my-topic.html`). Avoid `#` placeholders unless intended.

Math and rendering
-------------------
- MathJax v3 is used. The template already includes the MathJax loader and configuration (inline delimiters `$...$` and `$$...$$`). New topic pages should start from `template-topic.html` so MathJax is present by default.
- If you create a topic file outside the template, include the MathJax loader or use the dynamic loader pattern present in other `math-hl/*.html` files.

Frontend JS conventions
-----------------------
- Sidebar delegation: there is a single delegated click handler bound to the topics root (the element with id `topics`). Follow the same DOM pattern: a `.topic` button followed by a `.children` div. Do not add duplicate handlers for expanding/collapsing.
- Search/filter: use the existing `filterTopics(q)` implementation when adding search behavior.
- Solution toggles: use `button[data-target="..."]` that points to a `div.solution`. The toggle script sets `.style.display` and updates button text; keep the `.solution` hidden-by-default in CSS.
- Accessibility: keyboard Enter/Space behavior for topic links is supported — maintain that convention when adding interactive elements.

TTS / voice
-----------
- Client-side: per-step Listen buttons use `.listen-step` with a `data-text` attribute and the Web Speech `SpeechSynthesis` API. Keep `data-text` short and plain-text (avoid embedding raw HTML).
- Offline export: `tts_scripts/generate_audio.py` reads `tts_scripts/steps/*.txt` and writes MP3 files to `tts_scripts/output/` using gTTS. See `tts_scripts/README.md` for detailed instructions.

How to add a new topic (quick steps)
------------------------------------
1. Copy `math-hl/template-topic.html` to `math-hl/<your-topic>.html`.
2. Update the page title and content; write math in LaTeX using `$...$` or `$$...$$`.
3. Add a sidebar link in `math-hl.html` under the appropriate parent: ensure the pattern `.topic` then `.children` is retained.
4. Test locally by serving the folder (see quick preview below) and verify MathJax rendering and sidebar expand/collapse.

Local preview (quick)
---------------------
Run a simple file server from the repository root and open `math-hl.html` in a browser:

```powershell
python -m http.server 8000
# then open http://localhost:8000/math-hl.html in your browser
```

Generating MP3s locally (quick)
-------------------------------
1. Create and activate a Python virtual env.

```powershell
python -m venv venv
venv\Scripts\Activate.ps1
pip install gTTS
python tts_scripts/generate_audio.py
```

Notes and best practices
------------------------
- Keep changes minimal and focused: when editing many topic files, edit the template first so new files inherit the correct includes.
- Avoid duplicate global scripts: prefer adding small per-page scripts only when necessary and reuse the template for shared behavior.
- When adding new interactive features, test with keyboard-only navigation and a modern Chromium or Firefox browser to validate `SpeechSynthesis` behavior.

If you want, I can:
- run a search and add MathJax to any remaining pages missing it,
- generate MP3s locally if you allow me to run the helper (requires your environment to run Python), or
- open a PR with these instructions and any split changes you request.

Thanks — use this as the living guide for Copilot contributions and small edits.
