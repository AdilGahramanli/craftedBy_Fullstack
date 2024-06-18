/** @type {import('tailwindcss').Config} */
export default {
  content: ["./index.html",
    "./src/**/*.{vue,js,ts,jsx,tsx}",],
  theme: {
    extend: {
      colors: {
        'rose-peau': '#F0B3A1',
        'fond': '#FCFCFC',
      }
    },
  },
  plugins: [],
}

