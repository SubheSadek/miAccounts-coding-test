import { createRouter, createWebHistory } from "vue-router";
const auth = window.authUser || null;
const routes = [
    {
        path: "/",
        name: "home",
        component: () => import("../views/AccountTable/AccountTable.vue"),
        meta: {
            title: "Account Head Tabel",
            menuName: "Account Head Tabel",
            icon: "homeIcon",
        },
    },
    {
        path: "/hierarchical-view",
        name: "hierarchical",
        component: () =>
            import("../views/AccountHierarchical/AccountHierarchical.vue"),
        meta: {
            title: "Account Hierarchical View",
            menuName: "Account Hierarchical View",
            icon: "homeIcon",
        },
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    document.title = to.meta.title;
    next();
});

export default router;
