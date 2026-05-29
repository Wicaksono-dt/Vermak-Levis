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
        'denim-dark': '#0f0f0f',
        'denim-card': '#1a1a1a',
        'denim-red': '#e63946',
        'denim-yellow': '#ffd60a',
        'denim-blue': '#1d3557',
        'denim-indigo': '#3a0ca3',
        'denim-text': '#f8f8f8',
        'denim-muted': '#9ca3af',
        'denim-green': '#25D366',
      },
      fontFamily: {
        'oswald': ['Oswald', 'sans-serif'],
        'dmsans': ['"DM Sans"', 'sans-serif'],
        'mono': ['"JetBrains Mono"', 'monospace'],
      },
      boxShadow: {
        'red-glow': '0 0 15px rgba(230, 57, 70, 0.4)',
        'yellow-glow': '0 0 15px rgba(255, 214, 10, 0.3)',
      }
    },
  },
  plugins: [],
}
