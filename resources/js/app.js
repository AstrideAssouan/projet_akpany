import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue'
import router from './router';

// css
import '../css/sb-admin-2.css'
import '../vendor/fontawesome-free/css/all.min.css'


// sweetalert
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

// boxicons
import '../css/boxicons/css/boxicons.css';
import { api } from './api';
import errorHandler from './errorHandler';

api.interceptors.response.use(
    response => response,
    error => {
        errorHandler(error, router);
        return Promise.reject(error);
    }
);


const app = createApp(App);

app.use(VueSweetalert2)
app.use(router)
app.mount('#app');


