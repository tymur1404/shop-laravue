import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios';
require('./bootstrap');


const app = createApp(App)

app.use(router)
app.config.globalProperties.axios = axios

app.mount('#app')
