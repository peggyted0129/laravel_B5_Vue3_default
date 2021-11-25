require('./bootstrap');
// window.bootstrap = require("bootstrap")
// window.bootstrap = require('bootstrap/dist/js/bootstrap.bundle.js');

import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';

createApp({
  components: {
    HelloWorld,
  }
}).mount('#app');


