import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router   from './router'
import * as mdb from 'mdb-ui-kit'; // lib
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import './components/icons/index.js'

const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(mdb)
app.component('font-awesome-icon', FontAwesomeIcon)
app.mount('#app')
