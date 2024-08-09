import {createWebHistory, createRouter} from "vue-router";

const route = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            name: 'index',
            component: () => import('./components/Main/Index.vue'),
        },
        {
            path: '/trainers',
            name: 'trainers',
            component: () => import('./components/Main/Trainers.vue'),
        },
        {
            path: '/contact_us',
            name: 'contactus',
            component: () => import('./components/Main/Contact_us.vue'),
        },
        {
            path: '/why_us',
            name: 'whyus',
            component: () => import('./components/Main/Why_us.vue'),
        },
        {
            path: '/admin',
            name: 'admin',
            component: () => import('./components/Admin/Index.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/administrators',
            name: 'administrators',
            component: () => import('./components/Admin/administrators/Index.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/administrators/create',
            name: 'administrators.create',
            component: () => import('./components/Admin/administrators/Create.vue'),
            meta: { requiresAuth: false }
        },
        {
            path: '/admin/trainers',
            name: 'trainer',
            component: () => import('./components/Admin/trainers/Index.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/trainers/create',
            name: 'trainer.create',
            component: () => import('./components/Admin/trainers/Create.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/trainers/:id',
            name: 'trainer.update',
            component: () => import('./components/Admin/trainers/Update.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/gym_info',
            name: 'gym_info',
            component: () => import('./components/Admin/gyminfo/Index.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/gym_info/create',
            name: 'gym_info_create',
            component: () => import('./components/Admin/gyminfo/Create.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/gym_info/:id',
            name: 'gym_info_update',
            component: () => import('./components/Admin/gyminfo/Update.vue'),
            meta: { requiresAuth: true }
        },
        {
            path: '/admin/login',
            name: 'admin.login',
            component: () => import('./components/Admin/Login.vue'),
        },
    ]
});


route.beforeEach((to, from, next) => {
    const accessToken = localStorage.getItem('access_token');

    // Проверяем, требуется ли аутентификация для маршрута
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!accessToken) {
            // Если токена нет, перенаправляем на страницу входа
            return next({ name: 'admin.login' });
        }
    }

    // Если пользователь аутентифицирован и пытается перейти на страницу логина, перенаправляем его на админку
    if (to.name === 'admin.login' && accessToken) {
        return next({ name: 'admin' });
    }

    next(); // В остальных случаях продолжаем переход
});

export default route;
