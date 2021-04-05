require('./bootstrap');

/**
 * Importing and uses required modules
 */
import Vue from 'vue';
import {App as InertiaApp, plugin as InertiaPlugin} from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';

Vue.mixin({methods: {route}});
Vue.use(InertiaPlugin);
Vue.use(PortalVue);

/**
 * Importing and uses additional modules
 */
// Font Awesome
import {library} from '@fortawesome/fontawesome-svg-core';
import {faFacebookSquare, faGithub} from '@fortawesome/free-brands-svg-icons';
import {FontAwesomeIcon} from '@fortawesome/vue-fontawesome';
//import {  } from '@fortawesome/free-solid-svg-icons';

library.add(faFacebookSquare, faGithub);
Vue.component('font-awesome-icon', FontAwesomeIcon);

// VTooptip
import VTooltip from 'v-tooltip';
import 'v-tooltip/dist/v-tooltip.css';

Vue.use(VTooltip);

/**
 * Configuring and initalizing the app
 */
const app = document.getElementById('app');

Vue.config.ignoredElements = ['camera', 'player'];

new Vue({
    render: (h) =>
        h(InertiaApp, {
            props: {
                initialPage: JSON.parse(app.dataset.page),
                resolveComponent: (name) => require(`./Pages/${name}`).default,
            },
        }),
}).$mount(app);
