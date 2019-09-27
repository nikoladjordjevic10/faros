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

// Slideshow

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

// Slider One Product Page

// const small = document.querySelectorAll(".small"); // dots
// const big = document.querySelectorAll('.big'); // x

// for (let i = 0; i < small.length; i++){
//   small[i].addEventListener("click", function(){
//     currentDiv(i);
//     small[i].classList.add('selected');
//   });
// }

// function currentDiv(n){
//   showDiv(slideIndex = n + 1);
// }

// function showDiv(n){
//   if (n > big.length) {slideIndex = 1}
//   if (n < 1){slideIndex = big.length}
//   for(let i = 0; i < big.length; i++){
//     big[i].style.display = "none";
//     big[i].classList.remove('faded');
//     small[i].classList.remove('selected');
//   }
//   big[slideIndex - 1].style.display = "flex";
//   big[slideIndex - 1].classList.add('faded');
// }

$(document).ready(function() {
  
  $(window).resize(function(){
    
    $(".imageBig img").css("transform", "translateX(0px)");

  });
  
  $(".imagesNav").on('click', 'img', function() {

    var indexImg = $(this).parent().index();

    var imgWidth = $(".imageBig img").width();
    

    $(".imageBig img").css("transform", "translateX("+indexImg * -imgWidth+"px)");

    // $(".imageBig img").eq(newImage).addClass("opaque");

    $(".imagesNav img").removeClass("selected");
    $(this).addClass("selected");
  });
});