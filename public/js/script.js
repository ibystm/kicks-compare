$(function () {
  $('.image-box').mouseover(function () {
    $(this).css('cursor', 'pointer');
  });

  $('.image-box').on('click', function () {
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

  $(function(){
    //画像ファイルプレビュー表示のイベント追加 fileを選択時に発火するイベントを登録
    $('form').on('change', 'input[type="file"]', function(e) {
      var file = e.target.files[0],
          reader = new FileReader(),
          $preview = $(".preview");
          t = this;

      // 画像ファイル以外の場合は何もしない
      if(file.type.indexOf("image") < 0){
        return false;
      }

      // ファイル読み込みが完了した際のイベント登録
      reader.onload = (function(file) {
        return function(e) {
          //既存のプレビューを削除
          $preview.empty();
          // .prevewの領域の中にロードした画像を表示するimageタグを追加
          $preview.append($('<img>').attr({
                    src: e.target.result,
                    width: "150px",
                    class: "preview",
                    title: file.name
                }));
        };
      })(file);

      reader.readAsDataURL(file);
    });
  });


});

