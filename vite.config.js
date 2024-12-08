import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import { sync as globSync } from 'glob';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/tailwind.css',
                'resources/sass/app.sass',
            ],
            refresh: true,
        }),
        react(),
    ],
    build: {
    outDir: 'dist',
    emptyOutDir: true,
  },
});
