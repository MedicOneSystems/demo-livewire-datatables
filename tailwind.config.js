const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    purge: [
        './app/**/*.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './vendor/mediconesystems/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './app/Providers/AppServiceProvider.php',
    ],
    plugins: [
        require('@tailwindcss/forms'),
    ],
};
