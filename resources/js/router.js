import { createRouter, createWebHistory } from 'vue-router';

const routes = [
    { path: '/back-office/login', component: () => import('./views/Login.vue'), name: 'login' },
    {
        path: '/back-office/', component: () => import('./views/Home.vue'),  redirect: '/back-office/dashboard', name: 'home',  children: [
            { path: 'dashboard', component: () => import('./layouts/Dashboard.vue'), name: 'dashboard' },
            { path: '/back-office/user', component: () => import('./layouts/User.vue'), name: 'user' },
            { path: '/back-office/user/edit/:id', component: () => import('./components/edit/EditUser.vue'), name: 'edit-user' },
            { path: '/back-office/user/permission/edit/:id', component: () => import('./components/edit/EditPermission.vue'), name: 'edit-permission' },
            { path: '/back-office/user/show/:id', component: () => import('./components/show/ShowUser.vue'), name: 'show-user' },
            { path: '/back-office/projets', component: () => import('./layouts/Projet.vue'), name: 'projets' },
            { path: '/back-office/type-service', component: () => import('./layouts/TypeService.vue'), name: 'type-service' },
            { path: '/back-office/type-service/edit/:id', component: () => import('./components/edit/EditTypeService.vue'), name: 'edit-type-service' },
            { path: '/back-office/services', component: () => import('./layouts/Service.vue'), name: 'services' },
            { path: '/back-office/services/edit/:id', component: () => import('./components/edit/EditService.vue'), name: 'edit-service' },
            { path: '/back-office/demande-service', component: () => import('./layouts/DemandeService.vue'), name: 'demande-service' },
            { path: '/back-office/emploi', component: () => import('./layouts/Emploi.vue'), name: 'emploi' },
            { path: '/back-office/emploi/show/:id', component: () => import('./components/show/ShowEmploi.vue'), name: 'show-emploi' },
            { path: '/back-office/emploi/edit/:id', component: () => import('./components/edit/EditEmploi.vue'), name: 'edit-emploi' },
            { path: '/back-office/categorie', component: () => import('./layouts/Categorie.vue'), name: 'categorie' },
            { path: '/back-office/categorie/edit/:id', component: () => import('./components/edit/EditCategorie.vue'), name: 'edit-categorie' },
            { path: '/back-office/candidats', component: () => import('./layouts/Candidat.vue'), name: 'candidats' },
            { path: '/back-office/candidats/show/:id', component: () => import('./components/show/ShowCandidat.vue'), name: 'show-candidat' },
        ], meta: { requiresAuth: true }
    }
]



const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes
})

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);

    if (requiresAuth && !isAuthenticated()) {
        next({ name: 'login' });
    } else {
        next();
    }
});

function isAuthenticated() {
    const token = localStorage.getItem('auth_token');
    return token !== null;
}

export default router