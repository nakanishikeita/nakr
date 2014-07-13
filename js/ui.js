$(function() {

  // input area
  var $inputArea = $('.js-input-area');

  $inputArea
    .focus(function() {
      $(this).addClass('focus');
    })
    .blur(function() {
      $(this).removeClass('focus');
    });

  $inputArea.focus();


  // radio button, label
  $('label[for=' + getCheckedItem("id") + ']').addClass('is-selected');

  $('input[name="type"]:radio').change(function() {
    $('.ui label').each(function() {
      $(this).removeClass('is-selected');
    });
    $('label[for=' + getCheckedItem("id") + ']').addClass('is-selected');
  });


  function getCheckedItem(attr) {
    return $('input[name="type"]:radio:checked').attr(attr);
  }

});