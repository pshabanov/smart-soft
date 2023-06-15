/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
    theme: {
        extend: {
            colors: {
                'main-yellow': '#ffcb3d',
                'main-red': '#d81921',
                'main-black': '#010101',
                'main-grey': '#555555',
                'main-orange': '#ff813d'
            }
        },
    },
    plugins: [],
}
