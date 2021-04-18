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
                'wign-turkis': '#5CC5C5',
                'wign-turkis-600': '#4d9999',
                'translucent-80': 'rgba(255,255,255,0.80)',
                'translucent-60': 'rgba(255,255,255,0.60)',
                'translucent-25': 'rgba(255,255,255,0.25)',
            },
            boxShadow: {
                box: '0 0 5px 2px rgba(0,0,0,0.15)',
            },
            borderRadius: {
                DEFAULT: '2rem',
            },
            maxWidth: {
                'string': '20ch',
            },
            transitionProperty: {
                'width': 'width',
                DEFAULT: 'background-color, border-color, color, fill, stroke, opacity, box-shadow, transform, width',
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            maxWidth: ['hover'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
