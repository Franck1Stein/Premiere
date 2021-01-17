import Dashboard from './components/Dashboard.vue'
import Profile from './components/Profile.vue'
import Users from './components/Users.vue'
import XCompo from './components/Developer.vue'

export let routes = [
    {
        path: '/dashboard',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path: '/developer',
        name: 'Developer',
        component: Developer
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
    }
];
