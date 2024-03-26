import {createApp} from 'vue'
import {createRouter, createWebHistory} from 'vue-router'

import App from './App.vue'

import Home from './Pages/Home.vue'
import CreateOrEdit from './Pages/CreateOrEdit.vue'

const routes = [
    {path: '/', component: Home, meta: { title: 'Home'}},
    
    // books routes
    {path: '/books/create', component: CreateOrEdit, meta: { title: 'Create Book'}},
    {path: '/books/edit/:id', component: CreateOrEdit, meta: { title: 'Edit Book'}},   
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    next()
});

createApp(App).use(router).mount("#app")