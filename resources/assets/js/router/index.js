import VueRouter from 'vue-router'
import Home from '../components/Home.vue'
import Admin from '../components/admin/Admin.vue'
import AdminCities from '../components/admin/Cities.vue'
import AdminDestinations from '../components/admin/Destinations.vue'
import Destination from '../components/Destination.vue'
import Tips from '../components/Tips.vue'
import AboutUs from '../components/AboutUs.vue'
import City from '../components/City.vue'
import Favorite from '../components/Favorite.vue'
import Rating from '../components/Rating.vue'
import Event from '../components/Event.vue'
import LocationDetail from '../components/LocationDetail.vue'
import EventDetail from '../components/EventDetail.vue'

let routes=[
    {
        path:'/',
        component: Home
    },
    {
        path:'/admin',
        component: Admin,
        children: [
            {
                path: '', redirect: 'cities'
            },
            {
                path: 'cities',component: AdminCities
            },
            {
                path: 'destinations',component: AdminDestinations
            }
        ]
    },
    {
        path:'/destination',
        component: Destination,
        children: [
            {
                path: '', redirect: 'city'
            },
            {
                path: 'city',component: City
            },
            {
                path: 'favorite', component: Favorite
            },
            {
                path: 'rating', component: Rating
            },
            {
                path: 'event', 
                component: Event
            }
        ]
    },
    {
        path:'/location/:location_id',
        component: LocationDetail
    },
    {
        path:'/event/:event_id',
        component: EventDetail
    },
    {
        path:'/tips',
        component: Tips
    },
    {
        path:'/about',
        component: AboutUs
    }
];
export default new VueRouter({linkActiveClass: 'active' ,
    routes
});