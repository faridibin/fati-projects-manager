import Settings from '../../views/dashboard/settings/Settings.vue'
import Profile from '../../views/dashboard/settings/Profile.vue'
import Password from '../../views/dashboard/settings/Password.vue'
import Notifications from '../../views/dashboard/settings/Notifications.vue'

export default [{
    path: 'settings',
    component: Settings,
    redirect: {
        name: 'settings.profile'
    },
    children: [{
            path: 'profile',
            component: Profile,
            name: 'settings.profile'
        },
        {
            path: 'password',
            component: Password,
            name: 'settings.password'
        },
        {
            path: 'notifications',
            component: Notifications,
            name: 'settings.notifications'
        }
    ]
}]
