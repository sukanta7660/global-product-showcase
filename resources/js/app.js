require('./bootstrap');

import { createApp } from 'vue';
import HomeContent from './components/HomeContent.vue';

const app = createApp({});

app.component('home-content', HomeContent);

app.mount('#app');
