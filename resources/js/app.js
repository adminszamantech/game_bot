import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { createHead } from '@vueuse/head';
import { ZiggyVue } from 'ziggy-js';
import 'izitoast/dist/css/iziToast.min.css';
import iziToast from 'izitoast';
import { formatDate, formatTime } from './utils/dateFormatter';

window.iziToast = iziToast;

createInertiaApp({
    resolve: (name) => {
        const pages = import.meta.glob('./Pages/**/*.vue');
        return pages[`./Pages/${name}.vue`]();
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.config.globalProperties.$formatDate = formatDate;
        app.config.globalProperties.$formatTime = formatTime;
        app.use(plugin);
        app.use(createHead());
        app.use(ZiggyVue);
        app.mount(el);
    },
});
