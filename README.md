# MD2HTML - Markdown to HTML Converter

MD2HTML is a simple, terminal-based PHP tool that converts Markdown (`.md`) files into clean, styled HTML pages. It supports basic Markdown syntax including headings, bold, italic, links, and unordered lists. The resulting HTML is automatically opened in your browser for live preview.

## Features

- Converts `.md` files to `output.html`
- Supports:
  - Headings (`#`, `##`, etc.)
  - Bold (`**bold**`)
  - Italic (`*italic*`)
  - Links (`[text](url)`)
  - Unordered lists (`- item`)
- Automatically opens output in the default browser
- No external dependencies

## Requirements

- PHP 7.0 or higher
- A terminal or command-line environment

## Usage

1. Place your Markdown file (e.g., `sample.md`) in the project directory.

2. Run the converter using:

   ```bash
   php converter.php sample.md
