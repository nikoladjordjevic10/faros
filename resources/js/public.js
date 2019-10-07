// Admin Panel - Adding dynamic text to custom file input fields 
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


// Home Page Slideshow
$(document).ready(function() {
  $('.previous').on('click', function(){
    $('#img_' + currentImage).stop().fadeOut(1);
    decreaseImage();
    $('#img_' + currentImage).stop().fadeIn(1).attr('style', 'display: flex;');
  }); 
  $('.next').on('click', function(){
    $('#img_' + currentImage).stop().fadeOut(1);
    increaseImage();
    $('#img_' + currentImage).stop().fadeIn(1).attr('style', 'display: flex;');
  }); 

  var currentImage = 1;
  var totalImages = 3;

  function increaseImage() {
    ++currentImage;
    if(currentImage > totalImages) {
      currentImage = 1;
    }
  }
  function decreaseImage() {
    --currentImage;
    if(currentImage < 1) {
      currentImage = totalImages;
    }
  }

  // window.setInterval(function() {
  //   $('.next').click();
  // }, 10000);
  
});


// showOne Page Images Slider
$(document).ready(function() {
  
  $(window).resize(function(){
    
    $(".imageBig img").css("transform", "translateX(0px)");

  });
  
  $(".imagesNav").on('click', 'img', function() {

    var indexImg = $(this).parent().index();

    var imgWidth = $(".imageBig img").width() + 16;
    

    $(".imageBig img").css("transform", "translateX("+indexImg * -imgWidth+"px)");

    // $(".imageBig img").eq(newImage).addClass("opaque");

    $(".imagesNav img").removeClass("selected");
    $(this).addClass("selected");
  });
});


// Home Page Ajax Changing Categories
// New Products
$(document).ready(function(){

  $(".changeCatNew").click(function(e){
    
    e.preventDefault();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var cat_id = $(this).data('value');
    
    $.ajax({
      type: 'post',
      dataType : 'json',
      data: {'id' : cat_id},
      success: function(response){
        
        $('.changeCatNew').each(function(){
          
          $(this).removeClass('disabled-link-dark');
          
          if((this.innerText) == response['defaultCategory'].name){
            $(this).addClass('disabled-link-dark');
          }

        });

        var newResponse = response['newProducts'];
        var newProducts = $('ul.newProducts').empty();
        newResponse = reverseJsonOrder(newResponse);
        
        $.each(newResponse, function(){
          
          newProducts.append(printData($(this)[1]));
          
        });
        
        function reverseJsonOrder(response){

          var jsonArr = Object.keys(newResponse).map(function(key){
            return [key, newResponse[key]];
          });
          
          jsonArr = jsonArr.reverse();
          
          return jsonArr;
        }

        function formatNumber(num) {
          var num = num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
          return num.slice(0, num.lastIndexOf('.'));
        }
        
        function printData(data){
          var output = [];
          output += '<div class="col-xl-3 col-md-6 mt-4 newProducts">';
          output += '<li class="shadow mx-auto">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<div class="productsListImage" style="background-image: url(\'storage/images/' + data.images[0].name + '\')">';
          output += '<div class="productsListBg"></div>';
          output += '<div class="productsListLinks">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<i class="fas fa-plus details"></i>';
          output += '</a>';
          output += '</div>';
          output += '</div>';
          output += '</a>';
          output += '<div class="productsListInfo">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<h4>' + data.images[0].item_name + ' </h4>';
          output += '</a>';
          output += '<p>' +  formatNumber(data.price) + " din" + ' </p>';
          output += '</div>';
          output += '</li>';
          output += '</div>';
          return output;
        }
      },
      error: function (response) {

        $('.changeCatNew').each(function(){
          
          $(this).removeClass('disabled-link-dark');

          if(($(this).data('value')) == response.responseJSON.id){
            $(this).addClass('disabled-link-dark');
          }

        });

        var newProducts = $('ul.newProducts').empty();
        newProducts.append('<div class="productsError w-100 text-center">' + response.responseJSON.error + '</div>');
       
      }
    });
  
  });

  // Popular Products
  $(".changeCatPopular").click(function(e){
    
    e.preventDefault();

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    
    var cat_id = $(this).data('value');
    
    $.ajax({
      type: 'post',
      dataType : 'json',
      data: {'id' : cat_id},
      success: function(response){
        
        $('.changeCatPopular').each(function(){
          
          $(this).removeClass('disabled-link-dark');
          
          if((this.innerText) == response['defaultCategory'].name){
            $(this).addClass('disabled-link-dark');
          }

        });
        
        var newResponse = response['popularProducts'];
        var popularProducts = $('ul.popularProducts').empty();
        newResponse = randomJsonOrder(newResponse);
        
        $.each(newResponse, function(){
          
          popularProducts.append(printData($(this)[1]));
          
        });
        
        function randomJsonOrder(response){

          var jsonArr = Object.keys(newResponse).map(function(key){
            return [key, newResponse[key]];
          });
          
          jsonArr = jsonArr.sort(function() { return 0.5 - Math.random() });;
          
          return jsonArr;
        }

        function formatNumber(num) {
          var num = num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
          return num.slice(0, num.lastIndexOf('.'));
        }
        
        function printData(data){
          var output = [];
          output += '<div class="col-xl-3 col-md-6 mt-4 popularProducts">';
          output += '<li class="shadow mx-auto">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<div class="productsListImage" style="background-image: url(\'storage/images/' + data.images[0].name + '\')">';
          output += '<div class="productsListBg"></div>';
          output += '<div class="productsListLinks">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<i class="fas fa-plus details"></i>';
          output += '</a>';
          output += '</div>';
          output += '</div>';
          output += '</a>';
          output += '<div class="productsListInfo">';
          output += '<a href="/' + data.category_id + '/' + data.id + '">';
          output += '<h4>' + data.images[0].item_name + ' </h4>';
          output += '</a>';
          output += '<p>' +  formatNumber(data.price) + " din" + ' </p>';
          output += '</div>';
          output += '</li>';
          output += '</div>';
          return output;
        }
      },
      error: function (response) {

        $('.changeCatPopular').each(function(){
          
          $(this).removeClass('disabled-link-dark');

          if(($(this).data('value')) == response.responseJSON.id){
            $(this).addClass('disabled-link-dark');
          }

        });

        var popularProducts = $('ul.popularProducts').empty();
        popularProducts.append('<div class="productsError w-100 text-center">' + response.responseJSON.error + '</div>');
       
      }
    });
  
  });

});