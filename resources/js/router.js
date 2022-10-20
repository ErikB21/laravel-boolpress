import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import ContactPage from './pages/ContactPage.vue';
import BlogPages from './pages/BlogPages.vue';
import HomePages from './pages/HomePages.vue';
import AboutPages from './pages/AboutPages.vue';
import NotFoundPages from './pages/NotFoundPages.vue';
import DetailsPostPages from './pages/DetailsPostPages';



const router = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: '/contact',
            name: 'contact',
            component: ContactPage
        },
        {
            path: '/',
            name: 'home',
            component: HomePages
        },
        {
            path: '/about',
            name: 'about',
            component: AboutPages
        },
        {
            path: '/blog',
            name: 'blog',
            component: BlogPages
        },
        {
            path: '/error',
            name: 'error',
            component: NotFoundPages
        },
        {
            path: '/blog/:slug',
            name: 'details-post',
            component: DetailsPostPages
        },
    ]
});

export default router;