/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "*.{html,php}",
    "config/html/*.{html,php}",
    "projects/*.php",
    "projects/*/*.php",
    "panel/*.php",
    "panel/blogs/*.php",
    "blog/*.php"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
