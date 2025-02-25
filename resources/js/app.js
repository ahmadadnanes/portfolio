import '../css/app.css';
import './bootstrap';

import { createInertiaApp, Link } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createApp, h } from 'vue';
import { ZiggyVue } from '../../vendor/tightenco/ziggy';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: async (name) => {
        const pages =  await import.meta.glob('./Pages/**/*.vue' , {eager: true});

        let page = pages[`./Pages/${name}.vue`];
        console.log(name);

        if (!page) {
            console.log(`Page component not found: ./Pages/${name}.vue`);
        }

        if(page.default.layout === undefined){
            page.default.layout = AuthenticatedLayout
        }

        return page;
    },
        // resolvePageComponent(
        //     `./Pages/${name}.vue`,
        //     import.meta.glob('./Pages/**/*.vue'),
        // ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(ZiggyVue)
            .component("Link" , Link)
            .mount(el);
    },
    progress: {
        color: '#4B5563',
    },
});
