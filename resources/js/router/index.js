import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    linkExactActiveClass: 'active',
    base: "/",
    fallback: true,
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        }

        return {
            el: '#app',
            behavior: 'smooth',
        }
    }
})

export default router
