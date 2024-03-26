/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        'light-black': '#121212',
      },
      backgroundImage: {
        'main-banner': "url('/resources/src/images/main-page-banner.png')",
      }
    },
  },
  plugins: [],
}

