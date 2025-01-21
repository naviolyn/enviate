import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'oke' : '#10B981',
                'darkGreen' : 'rgba(11,127,100,1)',
                'fadeGreen' : 'rgba(27, 42, 15, 0.16)',
                'lightGreen' : '#E8F5EB',
                'bodybg' : '#fdfdf6',
                'green-900' : 'rgba(0, 79, 61, 1)',
                'orange' : '#E45E46',
            }
        },
    },
    plugins: [],
};
