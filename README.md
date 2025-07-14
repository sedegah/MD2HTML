# MD2HTML - Markdown to HTML Terminal Converter

**MD2HTML** is a lightweight, command-line tool written in PHP that converts `.md` (Markdown) files into clean, styled `.html` web pages — instantly viewable in your default browser.

It supports headings, bold/italic text, links, and unordered lists, with a simple interface for developers who prefer working in the terminal.

---

## Features

- Convert `.md` files to valid HTML
- Supports:
  - Headings (`#`, `##`, etc.)
  - **Bold** and *italic* text
  - Links (`[text](url)`)
  - Unordered lists (`- item`)
- Automatically opens output in the default web browser
- No external dependencies required
- Cross-platform support (tested on Windows)

---

## Requirements

- PHP 7.0 or higher
- Terminal (PowerShell, CMD, or Bash)
- A Markdown `.md` file to convert

---

## Installation

1. [Install PHP](https://www.php.net/downloads.php) if you don't already have it.

   You should be able to run:

   ```bash
   php -v
````

If not, make sure PHP is installed and its path is added to your system environment variables.

2. [Download the MD2HTML ZIP](#)

3. Extract it to a directory of your choice.

4. The folder should contain:

   ```
   converter.php
   sample.md
   README.md
   ```

---

## Usage

### A. Navigate to the Project Folder

In your terminal, run:

```bash
cd "C:\Users\Kimat\Downloads\markdown-converter"
```

### B. Run the Converter

```bash
php converter.php sample.md
```

### C. Output

* A new file `output.html` will be created in the same folder.
* The browser will automatically open to display the converted content.
* If it doesn’t open, you can double-click `output.html` manually.

---

## Example Markdown Input (`sample.md`)

```markdown
# Kimathi Sedegah

Welcome to my **personal homepage**. This Markdown file was converted to HTML using MD2HTML.

## About Me

- Trumpeter, saxophonist, and French hornist
- Computer Science student at the University of Ghana (2024–2027)
- Developer of Code Comparator, ResumeCraft, and more

## Contact

- GitHub: [sedegah](https://github.com/sedegah)
- Portfolio: [kimathisedegah.vercel.app](https://kimathisedegah.vercel.app)
```

---

## Troubleshooting

###  `php is not recognized`

> PHP is not in your system PATH.

 Use the full path to `php.exe` or add PHP to your environment variables.

###  `Could not open input file: converter.php`

> You're in the wrong folder.

 Navigate to the correct directory first:

```bash
cd "C:\Users\Kimat\Downloads\markdown-converter"
```

---

## License

MIT License — free to use, modify, and share.

---

## Author

**Kimathi Elikplim Sedegah**
GitHub: [@sedegah](https://github.com/sedegah)
Portfolio: [kimathisedegah.vercel.app](https://kimathisedegah.vercel.app)
Email: [kimathisedegah@gmail.com](mailto:kimathisedegah@gmail.com)

