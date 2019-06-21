$(function () {
  $('.card').mouseover(function () {
    $(this).css('cursor', 'pointer');
  });

  $('.card').on('click', function () {
    // idを取得。.cardクラスをクリックした時に、子要素のaタグのhref属性を取得。
    let href = $(this).children('a').attr('href');
    // 取得したidをlocation.hrefに代入。
    location.href = href;
  });

  $('.comp-dp-btn').on('click', function () {
    var manufacturer_id = $(this).attr('id');
    $('#manufacturer-val').val(manufacturer_id);
    $('form').submit();
  });

});

$('.like-btn').on('click', function(event) {
  console.log(event);
});
