import './bootstrap';
import { createApp, h } from 'vue'
import { Head, Link, createInertiaApp } from '@inertiajs/vue3';
import NProgress from 'nprogress'
import { router } from '@inertiajs/vue3';
import Layout from './Pages/Shared/Layout';

// const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel'; // ${appName}
createInertiaApp({
  title: (title) => `${title} - Laravel`,
  resolve: async name => {
    // let page = require(`./Pages/${name}.vue`).default;
    let page = (await import(`./Pages/${name}.vue`)).default;
    if (page.layout === undefined) {
      page.layout ??= Layout;
    }
    return page;
  },
  setup({ el, App, props, plugin }) {
    return createApp({ render: () => h(App, props) })
      .use(plugin)
      .component('Link', Link)
      .component('Head', Head)
      .mount(el);
  },
});
router.on('start', () => NProgress.start())
