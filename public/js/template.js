$(function() {

  //ハンバーガーメニュー
  $('#js-nav-toggle').on('click',function() {
    $('#js-nav-toggle,.header_nav').toggleClass('show');
  });

  // メッセージ表示
  var $jsShowMsg = $('#js-show-msg');
  var msg = $jsShowMsg.text();
  if(msg.replace(/^[\s　]+|[\s　]+$/g, "").length){
    $jsShowMsg.slideToggle('slow');
    setTimeout(function() { $jsShowMsg.slideToggle('slow'); }, 2000);
  }

  // 最新情報まで自動スクロール
  $('.js-scroll-bottom').animate({scrollTop: $('.js-scroll-bottom')[0].scrollHeight}, 'fast');

  // カレンダー機能
  flatpickr(document.getElementById('date'), {
    locale: 'ja',
    dateFormat: "Y/m/d",
    minDate: new Date()
  });

});
