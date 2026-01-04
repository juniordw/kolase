/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#fff5f7',
          100: '#ffeef2',
          200: '#ffd4de',
          300: '#ffb3c6',
          400: '#ff8aa8',
          500: '#ff6b8a',
          600: '#e85575',
          700: '#d14060',
        },
        secondary: {
          50: '#faf8f9',
          100: '#f3eff1',
          200: '#e4dce0',
          300: '#c9b1b6',
          400: '#9d8189',
          500: '#7a6168',
          600: '#5a474d',
        },
        accent: {
          50: '#f0fdf9',
          100: '#ccfbef',
          200: '#99f6e0',
          300: '#5fe9ce',
          400: '#2dd4b8',
          500: '#14b8a0',
          600: '#0d9488',
        },
        neutral: {
          50: '#fdfcfb',
          100: '#f9f5f2',
          200: '#f3ebe5',
          300: '#e8ddd4',
          400: '#d4c4b8',
          500: '#b8a396',
          600: '#96644a',
          700: '#7a5039',
          800: '#3d2820',
          900: '#2a1a14',
        },
        rose: {
          50: '#fff5f7',
          100: '#ffeef2',
          200: '#ffd4de',
          300: '#ffb3c6',
          400: '#ff8aa8',
          500: '#ff6b8a',
          600: '#e85575',
          700: '#d14060',
          800: '#9f1239',
          900: '#881337',
        },
        mauve: {
          50: '#faf8f9',
          100: '#f3eff1',
          light: '#c9b1b6',
          DEFAULT: '#9d8189',
          dark: '#7a6168',
          deeper: '#5a474d',
        },
        cream: {
          50: '#fdfcfb',
          100: '#f9f5f2',
          200: '#f3ebe5',
          300: '#e8ddd4',
          400: '#d4c4b8',
          500: '#b8a396',
        },
        brown: {
          400: '#b37d5d',
          500: '#96644a',
          600: '#7a5039',
          700: '#3d2820',
          800: '#2a1a14',
        },
        success: {
          50: '#f0fdf4',
          500: '#22c55e',
          700: '#15803d',
        },
        warning: {
          50: '#fffbeb',
          500: '#f59e0b',
          700: '#b45309',
        },
        error: {
          50: '#fef2f2',
          500: '#ef4444',
          700: '#b91c1c',
        },
        info: {
          50: '#eff6ff',
          500: '#3b82f6',
          700: '#1d4ed8',
        },
        whatsapp: {
          DEFAULT: '#25D366',
          dark: '#20ba5a',
        },
      },
      fontFamily: {
        display: ['"Playfair Display"', 'Georgia', 'serif'],
        body: ['Nunito', '"Segoe UI"', 'sans-serif'],
        script: ['"Dancing Script"', 'cursive'],
        mono: ['"JetBrains Mono"', 'monospace'],
        sans: ['Nunito', '"Segoe UI"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
      },
      fontSize: {
        'xs': '0.75rem',      // 12px
        'sm': '0.875rem',     // 14px
        'base': '1rem',       // 16px
        'lg': '1.125rem',     // 18px
        'xl': '1.25rem',      // 20px
        '2xl': '1.5rem',      // 24px
        '3xl': '1.875rem',    // 30px
        '4xl': '2.25rem',     // 36px
        '5xl': '3rem',        // 48px
        '6xl': '3.75rem',     // 60px
      },
      spacing: {
        '18': '4.5rem',
        '88': '22rem',
        '100': '25rem',
        '112': '28rem',
        '128': '32rem',
      },
      borderRadius: {
        'sm': '0.375rem',
        'md': '0.5rem',
        'lg': '0.75rem',
        'xl': '1rem',
        '2xl': '1.5rem',
        '3xl': '1.75rem',
        '4xl': '2rem',
        'full': '9999px',
      },
      boxShadow: {
        'sm': '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
        'md': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
        'lg': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
        'xl': '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
        '2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
        'inner': 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
        'rose': '0 10px 30px -10px rgba(255, 107, 138, 0.3)',
        'rose-lg': '0 20px 40px -10px rgba(255, 107, 138, 0.4)',
        'primary': '0 10px 30px -10px rgba(255, 107, 138, 0.3)',
      },
      animation: {
        'float': 'float 3s ease-in-out infinite',
        'pulse-slow': 'pulse-slow 2s ease-in-out infinite',
        'slide-in-up': 'slideInUp 0.4s ease-out',
        'fade-in': 'fadeIn 0.3s ease-out',
        'scale-in': 'scaleIn 0.3s ease-out',
      },
      keyframes: {
        float: {
          '0%, 100%': { transform: 'translateY(0px)' },
          '50%': { transform: 'translateY(-20px)' },
        },
        'pulse-slow': {
          '0%, 100%': { opacity: '1' },
          '50%': { opacity: '0.7' },
        },
        slideInUp: {
          'from': { transform: 'translateY(20px)', opacity: '0' },
          'to': { transform: 'translateY(0)', opacity: '1' },
        },
        fadeIn: {
          'from': { opacity: '0' },
          'to': { opacity: '1' },
        },
        scaleIn: {
          'from': { transform: 'scale(0.95)', opacity: '0' },
          'to': { transform: 'scale(1)', opacity: '1' },
        },
      },
      transitionDuration: {
        '150': '150ms',
        '200': '200ms',
        '300': '300ms',
        '500': '500ms',
      },
      zIndex: {
        '1': '1',
        '1000': '1000',
        '1020': '1020',
        '1030': '1030',
        '1040': '1040',
        '1050': '1050',
        '1060': '1060',
        '1070': '1070',
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
