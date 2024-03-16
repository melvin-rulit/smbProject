import './bootstrap';
import 'flowbite';

import {createApp} from 'vue'
import {createRouter, createWebHashHistory} from 'vue-router'

import App from "./components/App.vue";

import UsersList from "./components/users/UsersList.vue";
import UserCreate from "./components/users/UserCreateForm.vue";
import UserEdit from "./components/users/UserEditForm.vue";

import TradeList from "./components/branches/BranchesList.vue";
import TradeCreate from "./components/branches/BranchCreate.vue";
import TradeEdit from "./components/branches/BranchEdit.vue";


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
            name: 'listTrade',
            path: '/trade',
            component: TradeList
        },
        {
            name: 'createTrade',
            path: '/trade/create',
            component: TradeCreate
        },
        {
            name: 'updateTrade',
            path: '/trade/:id',
            component: TradeEdit
        },

    ],

    linkActiveClass: 'bg-gray-200'
})

createApp(App).use(router).mount('#app')
