import './bootstrap';
import 'flowbite';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from "./components/App.vue";

import UsersList from "./components/users/UsersList.vue";
import UserCreate from "./components/users/UserCreateForm.vue";
import UserEdit from "./components/users/UserEditForm.vue";

import BranchList from "./components/branches/BranchesList.vue";
import BranchCreate from "./components/branches/BranchCreate.vue";
import BranchEdit from "./components/branches/BranchEdit.vue";

import ClientList from "./components/clients/ClientList.vue";
import ClientCreate from "./components/clients/ClientCreate.vue";
import ClientEdit from "./components/clients/ClientEdit.vue";


import ActiveList from "./components/actives/ActiveList.vue";
import ActiveCreate from "./components/actives/ActiveCreate.vue";
import ActiveEdit from "./components/actives/ActiveEdit.vue";

const router = createRouter({
    history: createWebHashHistory(),
    routes: [
        {
            path: '/',
            component: UsersList
        },
        {
            name: 'listUsers',
            path: '/users',
            component: UsersList
        },
        {
            name: 'createUsers',
            path: '/users/create',
            component: UserCreate
        },
        {
            name: 'updateUser',
            path: '/users/:id',
            component: UserEdit
        },
        {
            name: 'listBranches',
            path: '/branches',
            component: BranchList
        },
        {
            name: 'createBranch',
            path: '/branches/create',
            component: BranchCreate
        },
        {
            name: 'updateBranch',
            path: '/branches/:id',
            component: BranchEdit
        },
        {
            name: 'listClient',
            path: '/clients',
            component: ClientList
        },
        {
            name: 'createClient',
            path: '/clients/create',
            component: ClientCreate
        },
        {
            name: 'updateClient',
            path: '/clients/:id',
            component: ClientEdit
        },
        {
            name: 'listActive',
            path: '/actives',
            component: ActiveList
        },
        {
            name: 'createActive',
            path: '/actives/create',
            component: ActiveCreate
        },
        {
            name: 'updateActive',
            path: '/actives/:id',
            component: ActiveEdit
        },

    ],

    linkActiveClass: 'bg-gray-200'
})

createApp(App).use(router).mount('#app')
