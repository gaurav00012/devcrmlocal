import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';

const app = new Vue({
   el : '.admin-user',
    data:{
        userData : {},
        userValidationError : {},
        url : {},
       
    },
  

    methods:{
       getUserData(){
        //let getUrl =    
        let _this = this;
        let getUserUrl = $('#urlAdminUserget').val();
        console.log(getUserUrl);
        axios.get(getUserUrl)
        .then(function(response){
         
            

        });

       },
       editUser : function($event){
           alert("Hello World");
       }
    //    editUser(){
    //        alert("edit user");
    //    }
    },

   created(){
  //  this.getUserData();
    

  },

});