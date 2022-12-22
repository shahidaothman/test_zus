import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

function guardMyroute(to, from, next) {
  var isAuthenticated = false;
  //this is just an example. You will have to find a better or 
  // centralised way to handle you localstorage data handling 
  if (localStorage.getItem('token'))
    isAuthenticated = true;
  else
    isAuthenticated = false;
  if (isAuthenticated) {
    next(); // allow to enter route
  }
  else {
    next('/login'); // go to '/login';
  }
}






const routes = [
  {
    path: '/', 
    redirect: 'login',
   

  },
  {
    path: '/dashboard',
    name: 'dashboard',
    beforeEnter: guardMyroute,
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
    beforeEnter: guardMyroute,
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

  // ADMIN

  {
    path: '/admin-view',
    name: 'admin-view',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/admin/admin-view.vue'),
  },
  {
    path: '/admin-create',
    name: 'admin-create',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/admin/admin-create.vue'),
  },

  {
    path: '/admin-edit/:id',
    name: 'admin-edit',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/admin/admin-edit.vue'),
    props: true
  },

  // SUPPORT

  {
    path: '/support-view',
    name: 'support-view',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/support/support-view.vue'),
  },
  {
    path: '/support-create',
    name: 'support-create',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/support/support-create.vue'),
  },

  {
    path: '/support-edit/:id',
    name: 'support-edit',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/support/support-edit.vue'),
    props: true
  },

  // PRODUCT

  {
    path: '/product-view',
    name: 'product-view',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/product/product-view.vue'),
  },
  {
    path: '/product-create',
    name: 'product-create',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/product/product-create.vue'),
  },
  {
    path: '/product-test',
    name: 'product-cretestate',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/product/product-test.vue'),
  },
  {
    // path: '/product-edit/:id/edit',
    // name: 'product.edit',
    // component: () => import('@/views/board/product/product-edit.vue'),
    // // props:true
    path: '/product-edit/:id',
    name: 'product.edit',
    beforeEnter: guardMyroute,

    component: () => import('@/views/board/product/product-edit.vue'),
    // props:true
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
