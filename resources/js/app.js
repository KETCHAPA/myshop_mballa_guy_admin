require('./bootstrap');

Vue.component('navbar', require('./components/Navbar.vue'));

const app = new Vue({
    el: '#app'
});