import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router   from './router'
import * as mdb from 'mdb-ui-kit'; // lib
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import './components/icons/index.js'

import Echo   from 'laravel-echo';
import Pusher from "pusher-js";
window.Pusher = Pusher;
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(mdb)
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')
