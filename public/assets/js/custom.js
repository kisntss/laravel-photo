/**
 * created by mohamed
 */
'use strict'

$(document).ready(function () {

  $(".edu_edit").click(function () {
    var _parent = $(this).parents("div.content");
    var _academy = _parent.find(".edu_academy").text();
    var _year = _parent.find(".edu_year").text();
    var _title = _parent.find(".edu_title").text();
    var _description = _parent.find('.edu_description').text();
    $(".edu_title_modal").val(_title);
    $(".edu_year_modal").val(_year);
    $(".edu_academy_modal").val(_academy);
    $(".edu_description_modal").text(_description);
  });

  $(".exp_edit").click(function () {
    var _parent = $(this).parents("div.content");
    var _company = _parent.find(".exp_company").text();
    var _year = _parent.find(".exp_year").text();
    var _title = _parent.find(".exp_title").text();
    var _description = _parent.find('.exp_description').text();
    $(".exp_title_modal").val(_title);
    $(".exp_year_modal").val(_year);
    $(".exp_company_modal").val(_company);
    $(".exp_description_modal").text(_description);
  });

  $(".awd_edit").click(function () {
    var _parent = $(this).parents("div.content");
    var _year = _parent.find(".awd_year").text();
    var _award = _parent.find(".awd_award").text();
    var _description = _parent.find('.awd_description').text();
    $(".awd_award_modal").val(_award);
    $(".awd_year_modal").val(_year);
    $(".awd_description_modal").text(_description);
  });

  $("#portfolioUpload").blur(function () {
    alert();
  });

});