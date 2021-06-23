import Vue from 'vue'
import VueRouter from 'vue-router'
// import Home from '../views/Home.vue'

Vue.use(VueRouter)

const routes = [
  // {
  //   path: '/',
  //   name: 'Home',
  //   component: Home
  // },
  {
    path: '/index',
    name: 'zc',
    component: () => import(/* webpackChunkName: "about" */ '../views/index.vue')
  },
  {
    path: '/zc',
    name: 'zc',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import( '../zc.vue')
  },
  {
    path: '/dl',
    name: 'dl',
   
    component: () => import( '../dl.vue')
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
