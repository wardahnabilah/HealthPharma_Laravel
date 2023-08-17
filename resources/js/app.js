import './bootstrap';
import { createApp } from "vue";
import App from './components/App.vue';

if(document.querySelector("#app")) {
    const app = createApp(App)
    app.mount('#app')   
}