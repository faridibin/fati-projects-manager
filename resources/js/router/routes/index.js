import App from '../../App.vue'
import dashboard from './dashboard'
import settings from './settings'

const routes = [{
    path: '/app',
    component: App,
    children: [
        ...dashboard,
        ...settings
    ]
}, ]

export default routes
