import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
   content: [
      "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
      "./storage/framework/views/*.php",
      "./resources/views/**/*.blade.php",
   ],

   theme: {
      extend: {
         colors: {
            primary: "#1f2937",
            accent: "#3b82f6",
         },
         container: {
            center: true,
            screens: {
               "2xl": "1290px",
            },
         },
         fontFamily: {
            sans: ["Figtree", ...defaultTheme.fontFamily.sans],
         },
      },
   },

   plugins: [forms],
};
