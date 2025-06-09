/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
    './vendor/filament/**/*.blade.php', 
    './storage/framework/views/*.php',  
  ],
  theme: {
    extend: {
      colors: {
        primary: '#3B7BDB', // contoh kustomisasi warna
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'), // plugin bawaan filament
    require('@tailwindcss/typography'),
    require('@tailwindcss/aspect-ratio'),
  ],
};
