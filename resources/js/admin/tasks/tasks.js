import swal from 'sweetalert';
window.Vue = require('vue');
import axios from 'axios';
//import jQuery from "jquery";
//window.$ = window.jQuery = jQuery;


const app = new Vue({
    el : '#task-list',
     methods:{
         getProjects(){
             alert("hello world")
         }
     }

    });



    $(document).ready(function() {
  
        $('.resource-list').select2({
          placeholder: 'Select Assignee'
        });
       
         myDropzone = new Dropzone("#dZUpload", {
            autoProcessQueue: false,
            url: "hn_SimpeFileUploader.ashx",
            addRemoveLinks: true,
            maxFiles: 2,
            success: function (file, response) {
                var imgName = response;
                file.previewElement.classList.add("dz-success");
                console.log("Successfully uploaded :" + imgName);
            },
            error: function (file, response) {
                file.previewElement.classList.add("dz-error");
            }
            // other options
          });
    
          myDropzone.on("addedfile", function(file) {
          console.log("file uploades")
          });
          
          $('.btn-add-task').click(function(){           
            myDropzone.processQueue();
          });
    
          $('#datepicker').datepicker({
            format: 'mm-dd-yyyy',
            startDate: '-3d'
        });
        // $("#dZUpload").dropzone({
        //     url: "hn_SimpeFileUploader.ashx",
        //     addRemoveLinks: true,
        //     success: function (file, response) {
        //         var imgName = response;
        //         file.previewElement.classList.add("dz-success");
        //         console.log("Successfully uploaded :" + imgName);
        //     },
        //     error: function (file, response) {
        //         file.previewElement.classList.add("dz-error");
        //     }
        // });
    
        // $('.btn-add-task').click(function(){
        //   alert
        // });
    
    });
    