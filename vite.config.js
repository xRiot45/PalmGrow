import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/icons.scss',
                'node_modules/nouislider/dist/nouislider.min.css',
                'node_modules/flatpickr/dist/flatpickr.min.css',
                'node_modules/choices.js/public/assets/styles/choices.min.css',
                'node_modules/swiper/swiper-bundle.min.css',
                'node_modules/quill/dist/quill.bubble.css',
                'node_modules/quill/dist/quill.snow.css',
                'node_modules/gridjs/dist/theme/mermaid.min.css',
                'node_modules/flatpickr/dist/flatpickr.min.css',
                'node_modules/swiper/swiper-bundle.min.css',

                'resources/js/app.js',
                'resources/js/config.js',
                'resources/js/layout.js',
            ],
            refresh: true,
        }),
    ],
});
