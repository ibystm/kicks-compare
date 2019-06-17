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
});