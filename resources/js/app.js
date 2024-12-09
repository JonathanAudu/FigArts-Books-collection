import { createApp, h } from 'vue';
import { createInertiaApp, Head, Link, usePage, useForm } from '@inertiajs/vue3';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';

createInertiaApp({
    resolve: name =>
        resolvePageComponent(
            `../Pages/${name}.vue`,
            import.meta.glob('../Pages/**/*.vue')

        ),
    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
        .use(plugin)
        .component('InertiaHead', Head)
        .component('InertiaLink', Link)
        .component('InertiaUsePage', usePage)
        .component('InertiaUseForm', useForm)
        .mount(el);
    },
});

