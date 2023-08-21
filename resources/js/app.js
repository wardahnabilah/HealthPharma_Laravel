import './bootstrap';
import { createApp } from "vue";
import App from './components/App.vue';
import { FlashMessage } from './utils/flashMessage';

if(document.querySelector("#app")) {
    const app = createApp(App)
    app.mount('#app')   
}

if(document.querySelector("#flash-message")) {
    new FlashMessage()
}