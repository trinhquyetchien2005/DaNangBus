import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { sync as globSync } from 'glob';

export default defineConfig({
    plugins: [
        laravel({
            input: globSync('resources/sass/**/*.sass'),
            refresh: true,
        }),
    ],
});
