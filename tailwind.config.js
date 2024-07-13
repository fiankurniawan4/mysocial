/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            gridTemplateColumns: {
                // Simple 16 column grid
                '16': 'repeat(16, minmax(0, 1fr))',

                // Complex site-specific column configuration
                'footer': '200px minmax(900px, 1fr) 100px',
            }
        },
    },
    plugins: [
        require('daisyui'),
        require('flowbite/plugin')
    ],
}

