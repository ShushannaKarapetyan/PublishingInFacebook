/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************!*\
  !*** ./resources/js/fb.js ***!
  \****************************/
$(document).ready(function () {
  $('.openGroupModal').click(function () {
    $('.group-name').text($(this).attr('data-name'));
    window.group_id = $(this).attr('data-id');
  });
  $('.submit-group-post').click(function () {
    var url = "https://graph.facebook.com/" + window.group_id + "/feed";
    var message = $('textarea.group').val();
    $.ajax({
      type: "POST",
      url: url,
      data: {
        message: message,
        'access_token': window.user_access_token
      }
    }).done(function () {
      alert("The post has been published");
      location.reload();
    }).fail(function (error) {
      alert("Error - " + error);
    });
  });
  $('.openPageModal').click(function () {
    $('.page-name').text($(this).attr('data-name'));
    window.page_id = $(this).attr('data-id');
  });
  $('.submit-page-post').click(function () {
    var url = "https://graph.facebook.com/" + window.page_id + "/feed";
    var message = $('textarea.page').val();
    $.ajax({
      type: "POST",
      url: url,
      data: {
        message: message,
        'access_token': $(this).attr('data-pageAccessToken')
      }
    }).done(function () {
      alert("The post has been published");
      location.reload();
    }).fail(function (error) {
      alert("Error - " + error);
    });
  });
});
/******/ })()
;