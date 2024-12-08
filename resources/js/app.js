import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { createHead } from '@vueuse/head';
import { ZiggyVue } from 'ziggy-js';
import 'izitoast/dist/css/iziToast.min.css';
import iziToast from 'izitoast';

window.iziToast = iziToast;


createInertiaApp({
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });
        app.use(plugin);
        app.use(createHead());
        app.use(ZiggyVue);
        app.mount(el);
    },
});
