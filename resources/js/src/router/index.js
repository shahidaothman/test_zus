import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    redirect: 'dashboard',
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('@/views/dashboard/Dashboard.vue'),
  },
  {
    path: '/typography',
    name: 'typography',
    component: () => import('@/views/typography/Typography.vue'),
  },
  {
    path: '/icons',
    name: 'icons',
    component: () => import('@/views/icons/Icons.vue'),
  },
  {
    path: '/cards',
    name: 'cards',
    component: () => import('@/views/cards/Card.vue'),
  },
  {
    path: '/simple-table',
    name: 'simple-table',
    component: () => import('@/views/simple-table/SimpleTable.vue'),
  },
  {
    path: '/form-layouts',
    name: 'form-layouts',
    component: () => import('@/views/form-layouts/FormLayouts.vue'),
  },
  {
    path: '/pages/account-settings',
    name: 'pages-account-settings',
    component: () => import('@/views/pages/account-settings/AccountSettings.vue'),
  },
  {
    path: '/login',
    name: 'login',
    component: () => import('@/views/pages/Login.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/pages/register',
    name: 'pages-register',
    component: () => import('@/views/pages/Register.vue'),
    meta: {
      layout: 'blank',
    },
  },
  {
    path: '/error-404',
    name: 'error-404',
    component: () => import('@/views/Error.vue'),
    meta: {
      layout: 'blank',
    },
  },


  {
    path: '/board',
    name: 'board',
    component: () => import('@/views/board/main.vue'),
  },

  {
    path: '/user-view',
    name: 'user-view',
    component: () => import('@/views/board/admin/user-view.vue'),
  },
  {
    path: '/user-create',
    name: 'user-create',
    component: () => import('@/views/board/admin/user-create.vue'),
  },

  {
    path: '/product-view',
    name: 'product-view',
    component: () => import('@/views/board/product/product-view.vue'),
  },
  {
    path: '/product-create',
    name: 'product-create',
    component: () => import('@/views/board/product/product-create.vue'),
  },
  {
    path: '/product-edit',
    name: 'product-edit',
    component: () => import('@/views/board/product/product-edit.vue'),
    props:true
  },
  {
    path: '*',
    redirect: 'error-404',
  },
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes,
})

export default router
