$('.hide').click(function(){
    // $('.pera').hide();
    $('.pera').fadeOut();
});

$('.show').click(function(){
    // $('.pera').show();
    $('.pera').fadeIn();
});

$('.hide_show').click(function(){
    $('.pera').fadeToggle();
});

// ===================================
    menu fix
// ==================================


let navoff=$('.main_menu').offset().top;
console.log(navoff)





$(window).scroll(function(){
  let scrolling = $(this).scroolTop();
});