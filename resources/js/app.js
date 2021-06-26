require('./bootstrap');

import Vue from 'vue'
import ChatMessages from './components/ChatMessages'

new Vue({
    el: '#app',
    components: {
        ChatMessages,
    }
})

