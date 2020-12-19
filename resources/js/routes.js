export default [
    {
        name: 'home',
        path: '/',
        component: require('./screens/discover').default
    },
    {
        name: 'entity.show',
        path: '/entitites/:entityId',
        component: require('./screens/entity').default
    },
    {
        name: 'trip.show',
        path: '/trips/:tripId',
        component: require('./screens/trip').default
    },
    {
        name: 'trips',
        path: '/trips',
        component: require('./screens/trips').default
    }
];
