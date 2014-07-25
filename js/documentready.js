$(document).ready(function () {
    helloWorld();
    listOrGrid();
});

function helloWorld() {
    console.log('Hello world');
}

function listOrGrid() {
      $('button').on('click',function(){
  
    var type = $(this).data('type');
    
    if ( type === "list" ) {
      $('body').removeClass('grid');    
    } else if ( type === "grid" ) {
      $('body').addClass('grid');
    }
  
  });
}