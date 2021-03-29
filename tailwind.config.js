const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Titillium Web', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'wign-green': '#86CDAF',
                'wign-green-10': 'rgba(134, 205, 175, 0.1)',
                'wign-green-30': 'rgba(134, 205, 175, 0.3)',
                'wign-green-700': '#4d997a',
                'wign-turkis': '#5CC5C5'
            }
        }
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
