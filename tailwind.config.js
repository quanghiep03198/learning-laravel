const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')
/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans]
             },
            colors: {
                ...colors,
                'primary': '#ff2d20',
                'border': '#e5e7eb',
                'muted': '#9ca3af',
                'destructive': '#dc2626',
                'success': '#22c55e',
                'warning': '#fb923c'
            }
        },
        screens: {
            'sm': { 'min': '320px', 'max': '599px' },
            'md': { min: '600px', 'max': '1023px' },
            'lg': { 'min': '1024px', 'max': '1365px' },
            'xl': { 'min': '1366px' }
        },

    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/container-queries'),
    ]
}
