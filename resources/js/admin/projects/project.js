import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';


const app = new Vue({
    el : '.admin-user',
     data:{
         projects : {},
         userValidationError : {},
         url : {},
         company : {},
        
     },
     
     methods:{
         getProjects(){
             alert("hello world")
         }
     }

    });