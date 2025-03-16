let textArea = document.getElementById("typing-post");
let errorTxt = document.getElementById("tag-err-msg");

const blogBtns = Object.freeze({
  BOLD: { open: "[b]", close: "[/b]" },
  ITALIC: { open: "[i]", close: "[/i]" },
  UNDERLINE: { open: "[u]", close: "[/u]" },
  STRIKETHROUGH: { open: "[s]", close: "[/s]" },

  HYPERLINK: { open: "[a=url]", close: "[/a]" },
  QUOTE: { open: "[q]", close: "[/q]" },
  SPOILER: { open: "[sp]", close: "[/sp]" },
  IMAGE: { open: "[img=url", close: "|alt text]" },

  HEADER1: { open: "[h1]", close: "[/h1]" },
  HEADER2: { open: "[h2]", close: "[/h2]" },
  HEADER3: { open: "[h3]", close: "[/h3]" },
  HEADER4: { open: "[h4]", close: "[/h4]" },
  HEADER5: { open: "[h5]", close: "[/h5]" },
  HEADER6: { open: "[h6]", close: "[/h6]" },
});

function insertElement(btnKey) {
  if (!blogBtns[btnKey]) {
    errorTxt.textContent(`Error: invalid post button key: ${btnKey}`);
    throw new Error(`Invalid button key: ${btnKey}`);
  }

  let { open, close } = blogBtns[btnKey];

  let highlightedText = textArea.value.substring(
    textArea.selectionStart,
    textArea.selectionEnd,
  );

  textArea.setRangeText(
    open + highlightedText + close,
    textArea.selectionStart,
    textArea.selectionEnd,
    "end",
  );
  textArea.focus();
}
