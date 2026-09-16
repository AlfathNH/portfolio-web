import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Portfolio primary palette
                primary: {
                    50:  '#eff6ff',
                    100: '#dbeafe',
                    200: '#bfdbfe',
                    300: '#93c5fd',
                    400: '#60a5fa',
                    500: '#3b82f6',
                    600: '#2563eb',  // main accent
                    700: '#1d4ed8',
                    800: '#1e40af',
                    900: '#1e3a8a',  // accent dark
                    950: '#172554',
                },
                // Custom dark mode surfaces
                dark: {
                    bg:      '#0f172a',
                    surface: '#1e293b',
                    card:    '#1e293b',
                    border:  'rgba(255, 255, 255, 0.07)',
                },
                // Custom light mode surfaces
                light: {
                    bg:      '#f8fafc',
                    surface: '#f1f5f9',
                    card:    '#ffffff',
                    border:  '#e2e8f0',
                },
            },
            boxShadow: {
                'glow-sm': '0 0 15px rgba(37, 99, 235, 0.15)',
                'glow-md': '0 0 30px rgba(37, 99, 235, 0.2)',
                'glow-lg': '0 0 60px rgba(37, 99, 235, 0.25)',
                'card-hover': '0 8px 28px rgba(37, 99, 235, 0.14), 0 2px 8px rgba(37, 99, 235, 0.08)',
            },
            animation: {
                'blink': 'blink 2s ease-in-out infinite',
                'blink-cursor': 'blinkCursor 0.8s step-end infinite',
                'float': 'float 3s ease-in-out infinite',
                'fade-in-up': 'fadeInUp 0.6s ease forwards',
                'slide-in-right': 'slideInRight 0.4s ease forwards',
                'pulse-soft': 'pulseSoft 2s ease-in-out infinite',
                'spin-slow': 'spin 8s linear infinite',
            },
            keyframes: {
                blink: {
                    '0%, 100%': { opacity: '1' },
                    '50%': { opacity: '0.35' },
                },
                blinkCursor: {
                    '0%, 100%': { opacity: '1' },
                    '50%': { opacity: '0' },
                },
                float: {
                    '0%, 100%': { transform: 'translateY(0)' },
                    '50%': { transform: 'translateY(-8px)' },
                },
                fadeInUp: {
                    from: { opacity: '0', transform: 'translateY(24px)' },
                    to:   { opacity: '1', transform: 'translateY(0)' },
                },
                slideInRight: {
                    from: { opacity: '0', transform: 'translateX(20px)' },
                    to:   { opacity: '1', transform: 'translateX(0)' },
                },
                pulseSoft: {
                    '0%, 100%': { opacity: '1', transform: 'scale(1)' },
                    '50%':      { opacity: '0.8', transform: 'scale(1.05)' },
                },
            },
            transitionTimingFunction: {
                'portfolio': 'cubic-bezier(0.4, 0, 0.2, 1)',
            },
            backdropBlur: {
                'xs': '2px',
            },
        },
    },

    plugins: [forms, typography],
};
