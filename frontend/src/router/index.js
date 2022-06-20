import { createRouter, createWebHistory } from 'vue-router'
import HomeView                           from '../views/HomeView.vue'
import UseAuthStore                       from "../stores/auth";
import isEmpty                            from "../is_empty";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,
      meta: {
        auth: true
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/LoginView.vue'),
      meta: {
        guest: true
      }

    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/RegisterView.vue'),
      meta: {
        guest: true
      }

    },
    {
      path: '/about',
      name: 'about',
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import('../views/AboutView.vue')
    }
  ]
})
router.beforeEach((to, from, next) => {
  window.scrollTo(0, 0)
  const auth = UseAuthStore();
  if (to.matched.some(record => record.meta.auth)) {
    if (isEmpty(auth.getToken)) {
      next({
        path: '/login',
        params: {nextUrl: to.fullPath}
      })
    } else {
      next()
    }
  } else if (to.matched.some(record => record.meta.guest)) {
    if (isEmpty(auth.getToken)) {
      next()
    } else {
      next({
        path: '/',
        params: {nextUrl: to.fullPath}
      })
    }
  } else {
    next()
  }
})

export default router
