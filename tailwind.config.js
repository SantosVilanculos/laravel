/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue'
    ],
    theme: {
        fontFamily: {
            sans: [
                '"Inter Variable", "Inter", ui-sans-serif, system-ui, sans-serif',
                {
                    fontFeatureSettings: '"cv11", "ss01"',
                    fontVariationSettings: '"opsz" 32'
                }
            ]
        }
    },
    plugins: [import('@tailwindcss/forms'), import('@tailwindcss/aspect-ratio')]
};
