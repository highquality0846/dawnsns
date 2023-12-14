
$(function() {
  $(".user_name").on('click',
      function() {
        $(".menu_item").slideToggle();
        $(".ku").toggleClass('open');
      });
});

$(function () {
  $('.modal-open').each(function () {
    $(this).on('click', function () {
      var target = $(this).data('target');
      var modal = document.getElementById(target);
      console.log(target);
      console.log(modal);
      $(modal).fadeIn();
      return false;
    });
  });
  $('.modal-inner').on('click', function (e) {
    if(!$(e.target).closest('.inner').length) {
      $('.js-modal').fadeOut();
    }
    return false;
  });
});
