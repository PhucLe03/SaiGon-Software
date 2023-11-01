import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.css'
import './assets/phuc.css'
import './style.css'
import App from './App.vue'

const app = createApp(App)

import router from './Router'
app.use(router)

app.mount('#app')
