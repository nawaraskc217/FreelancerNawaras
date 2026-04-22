/** @type {import('tailwindcss').Config} */
module.exports = {
    important: ":is(.wp-theme-authorpro, .editor-styles-wrapper)",
    content: [
        './*.php',                // Root PHP files (index.php, header.php etc)
        './inc/**/*.php',         // Includes folder
        './js/**/*.js',           // JS files
        './patterns/**/*.php',    // Patterns folder
        './template-parts/**/*.php', // Template parts
        './src/**/*.js',          // JS files manipulating classes (e.g., search modal, mobile menu)
    ],
    safelist: [
        // Dynamic classes for nested menu levels (see inc/header-helpers.php)
        // Level 3 Groups
        'group/level3',
        'group-hover/level3:opacity-100',
        'group-hover/level3:visible',
        'group-focus-within/level3:opacity-100',
        'group-focus-within/level3:visible',

        // Level 4 Groups
        'group/level4',
        'group-hover/level4:opacity-100',
        'group-hover/level4:visible',
        'group-focus-within/level4:opacity-100',
        'group-focus-within/level4:visible',
    ],
    corePlugins: {
        container: false,
        //preflight: false,
    },
    theme: {
        extend: {
            fontFamily: {
                sans: ['var(--font-body)', 'sans-serif'],
                serif: ['var(--font-heading)', 'serif'],
                heading: ['var(--font-heading)', 'serif'],
                mono: ['JetBrains Mono', 'monospace'],
            },
            colors: {
                brand: {
                    50: '#fef2f2',
                    100: '#fee2e2',
                    500: '#ef4444',
                    600: 'var(--color-brand-600, #ea580c)',
                    700: 'var(--color-brand-700, #c2410c)',
                },
                slate: {
                    600: 'var(--color-slate-600, #475569)',
                    900: 'var(--color-slate-900, #0f172a)',
                }
            },
            screens: {
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1400px',
            },

        },
    },
    plugins: [
        require('@tailwindcss/typography'),

        function ({ addComponents }) {
            addComponents({
                '.authorpro-container': {
                    width: '100%',
                    marginLeft: 'auto',
                    marginRight: 'auto',
                    paddingLeft: '1.5rem',
                    paddingRight: '1.5rem',
                    maxWidth: '100%',

                    '@screen sm': { maxWidth: '640px' },
                    '@screen md': { maxWidth: '768px' },
                    '@screen lg': { maxWidth: '1024px' },
                    '@screen xl': { maxWidth: '1280px' },
                    '@screen 2xl': { maxWidth: '1400px' },
                }
            })
        }
    ],
};