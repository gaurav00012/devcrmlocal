import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';
import jQuery from "jquery";
window.$ = window.jQuery = jQuery;


const app = new Vue({
    el : '#task-list',
    
     
     methods:{
         getProjects(){
             alert("hello world")
         }
     }

    });