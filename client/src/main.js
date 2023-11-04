import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.css'
import './assets/phuc.css'
import './style.css'
import App from './App.vue'

//Vie splide (for slide show)
import VueSplide from '@splidejs/vue-splide';
import '@splidejs/vue-splide/css';

const app = createApp(App)

import router from './Router'
app.use( VueSplide );
app.use(router)

app.mount('#app')
