/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});


// Adding dynamic text to custom file input fields 

$(document).ready(function(){
  
  $('#image').on("change", function(e){

    var files = $(this)[0].files;

    if (files.length >= 2 && files.length < 5) {

      var allFiles = [];
      
      for(i = 0; i < files.length; i++){

        allFiles[i] = files[i].name;

      }

      allFilesList = allFiles.toString().replace(/,/g, "; ");

      $('.custom-text-label').text(allFilesList);
      
    } else if (files.length >= 5){

      $('.custom-text-label').text(files.length + " files selected");

    } else {

      var filename = e.target.value.split('\\').pop();

      $('.custom-text-label').text(filename);

    }
    
  });

});