import Dashboard from './components/Dashboard.vue'
import Profile from './components/Profile.vue'
import Users from './components/Users.vue'
import XCompo from './components/Xcompo.vue'

export let routes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/Users',
        name: 'Users',
        component: Users
    },
    {
        path: '/xcompo',
        name: 'Xcompo',
        component: XCompo
    }
];
