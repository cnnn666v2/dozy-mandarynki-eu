/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*.{html,php}",
    "config/html/*.{html,php}",
    "projects/*.php",
    "projects/*/*.php",
    "panel/*.php",
    "panel/blogs/*.php",
    "blogs/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
