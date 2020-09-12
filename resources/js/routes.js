import Dashboard from './components/Dashboard.vue'
import Profile from './components/Profile'

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
    }
];
