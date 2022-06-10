import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

/**
 * Vue router routes that will be used
 * @type {({path: string, component: (function(): *), name: string}|{path: string, component: (function(): *), name: string})[]}
 */
const routes = [
    {
        path: '/',
        name: 'main',
        component: () => import(/* webpackChunkName: "Main" */ '../components/pages/Main.vue')
    },
    {
        path: '/recent-searches',
        name: 'recent_searches',
        component: () => import(/* webpackChunkName: "RecentSearches" */ '../components/pages/RecentSearches.vue')
    }
];

/**
 * Vue Router
 * @type {VueRouter}
 */
const router = new VueRouter({
    mode: 'history',
    routes
});

/**
 * Router
 *
 * @author Simon Peter Calamno
 * @since 2022.06.10
 */
export default router;
