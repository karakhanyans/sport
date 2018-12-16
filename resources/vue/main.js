import Vue from 'vue'
import VueResource from 'vue-resource'
import router from './router'
import App from './App'

Vue.use(VueResource);
Vue.http.options.root = 'http://sport.loc/api/';

new Vue({
    el:'#app',
    router,
    render: h => h(App)
});
