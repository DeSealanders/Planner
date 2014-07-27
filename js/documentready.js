$(document).ready(function () {
  helloWorld();
  listOrGrid();

  menuSetup();


});

function helloWorld() {
  console.log('Hello world');
}

function listOrGrid() {
  $('button').on('click',function(){
    
    var type = $(this).data('type');
    var width = $( document ).width();
    
    if ( type === "list") {
      $('body').removeClass('grid');    
    } else if ( type === "grid" ) {
      $('body').addClass('grid');
    } 
  });

  $(window).resize(function() {
    if ($(window).width() <= 800) {
     $('body').removeClass('grid');
   }
   else {
    $('body').addClass('grid');
  }
});
}

function menuSetup(){
  var w = $(window).width(),
  toggle    = $('#toggle-menu'),
  menu    = $('nav ul'),
  hasChild = $('.has-child'),
  dropdown = $('.dropdown');

  $(function() {
    $(toggle).on('click', function(e) {
      e.preventDefault();
      menu.toggle();
    });
    
    $(hasChild).click(function(e) {
      e.preventDefault();
      dropdown.toggle();
    });
  });

  $(window).resize(function(){
    if(w > 320 && menu.is(':hidden')) {
      menu.removeAttr('style');}
    });


}