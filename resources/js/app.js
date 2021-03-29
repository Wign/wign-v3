require('./bootstrap');

// Import modules...
import Vue from 'vue';
import {App as InertiaApp, plugin as InertiaPlugin} from '@inertiajs/inertia-vue';
import PortalVue from 'portal-vue';
import VTooltip from 'v-tooltip';

Vue.mixin({methods: {route}});
Vue.use(InertiaPlugin);
Vue.use(PortalVue);
Vue.use(VTooltip);

// Font Awesome
import { library } from '@fortawesome/fontawesome-svg-core';
//import {  } from '@fortawesome/free-solid-svg-icons';
import { faFacebookSquare, faGithub } from '@fortawesome/free-brands-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(faFacebookSquare, faGithub);

Vue.component('font-awesome-icon', FontAwesomeIcon);

import 'v-tooltip/dist/v-tooltip.css';

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
