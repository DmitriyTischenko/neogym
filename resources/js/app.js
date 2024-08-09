import './bootstrap';
import { createApp } from 'vue';
import router from "./router.js"
import store from './store/index.js'
import App from './components/App.vue'
import Auth from "./components/Auth.vue";

createApp(App).use(router).use(store).mount('#app') //подключение роутера опционально
createApp(Auth).use(router).mount('#auth') //подключение роутера опционально


