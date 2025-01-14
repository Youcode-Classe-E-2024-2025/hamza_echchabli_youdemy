/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./src/**/*.{html,js,php}", // Include PHP files in the src folder
    "./public/index.php",
    "./views/home.php",
    "./views/displayCourses.php",
    "./views/adminDash.php",
    "./views/studentDash.php",
    "./views/teacherDash.php",
    "./views/coursDetails.php"

      
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

