import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from 'ziggy-js';
import { createI18n } from './i18n';
import '../css/app.css';

createInertiaApp({
    title: (title) => title ? `${title} - TechMart Oman` : 'TechMart Oman',
    progress: {
        color: '#2563EB',
    },
    resolve: {
        name: name => name,
        map: (name) => {
            const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
            return pages[`./Pages/${name}.vue`];
        },
    },
    setup({ el, App, props, plugin }) {
        const i18n = createI18n();
        
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(i18n)
            .use(ZiggyVue)
            .mount(el);
    },
});
