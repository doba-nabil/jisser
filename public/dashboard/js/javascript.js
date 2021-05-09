setTimeout(function () {
  $('#myMsg').fadeOut('fast');
}, 5000);

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

// $(".select").select2({
//   dir: "rtl"
// })

$('.confirm').click(function () {
  return confirm('هل أنت متأكد؟');
});

function MyDelete() {
  $('.confirm').click(function () {
    return confirm('هل أنت متأكد؟');
  });
}

// create country
$(document).on("submit", "#create_country", function (event) {
  event.preventDefault();
  var drEvent = $('.dropify').dropify();
  $.ajax({
    url: $(this).attr("action"),
    type: $(this).attr("method"),
    dataType: "JSON",
    data: new FormData(this),
    processData: false,
    contentType: false,
    success: function (result) {
      $('#loop').html(result.html)
      document.getElementById("create_country").reset();
      drEvent = drEvent.data('dropify');
      drEvent.resetPreview();
      drEvent.clearElement();
      MyDelete();
    }
  });
});

// create city
$(document).on("submit", "#create_city", function (event) {
  event.preventDefault();
  $.ajax({
    url: $(this).attr("action"),
    type: $(this).attr("method"),
    dataType: "JSON",
    data: new FormData(this),
    processData: false,
    contentType: false,
    success: function (result) {
      $('#loop').html(result.html)
      document.getElementById("create_city").reset();
      MyDelete();
    }
  });
});

function deleteAjax(formName) {
  $(document).on("submit", formName, function (event) {
    event.preventDefault();
    var tr = $(this).closest('tr');
    $.ajax({
      url: $(this).attr("action"),
      type: $(this).attr("method"),
      dataType: "JSON",
      data: new FormData(this),
      processData: false,
      contentType: false,
      success: function (result) {
        tr.fadeOut(500, function () {
          $(this).remove();
        });
      }
    });
  });
}

deleteAjax('#delete_country');
deleteAjax('#delete_city');
deleteAjax('#delete_user');
deleteAjax('#delete_seller');
deleteAjax('#delete_comment');
deleteAjax('#delete_page');
deleteAjax('#delete_contact');
deleteAjax('#delete_comment_seller');

var base_url = $('#base_url').val();

$('#country_id').on('change',function(e){
  var country_id = e.target.value;
  $.get( base_url + '/get/cities?country_id='+ country_id,function(data){
    $('#city_id').empty();
    $.each(data,function(index, subcatObj){
      $('#city_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
    });
  });
});

$('#category_id').on('change',function(e){
  var category_id = e.target.value;
  $.get( base_url + '/get/subcategories?category_id='+ category_id,function(data){
    $('#subcategory_id').empty();
    $('#subcategory_id').append('<option value="">اختر التصنيف الفرعي</option>');
    $.each(data,function(index, subcatObj){
      $('#subcategory_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
    });
  });
});

$('#subcategory_id').on('change',function(e){
  var subcategory_id = e.target.value;
  $.get( base_url + '/get/segments?subcategory_id='+ subcategory_id,function(data){
    $('#segment_id').empty();
    $.each(data,function(index, subcatObj){
      $('#segment_id').append('<option value="'+subcatObj.id+'">'+subcatObj.name_ar+'</option>');
    });
  });
});

$(document).ready(function() {
  $('.summernote').summernote({
    height: 200
  });
});
