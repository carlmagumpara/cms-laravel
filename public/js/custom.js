$(document).ready(function(){

  $('#summernote').summernote({
    height:500,
  });
      
  $(".alert").hide();

  $('#show-profile').on('hidden.bs.modal', function () {
    $(".show-profile-close-btn").click();
  })

  $(".btn-reply").click(function(e) {
    id = $(this).attr("data-id");
    $("#reply-id-" + id).slideToggle("slow");
    e.preventDefault();
  });

  $(".change-profile-pic").click(function(){
    $(".change-profile-pic-form").submit();
  });

  $(".profile-pic").change(function(e) {
      for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
          var file = e.originalEvent.srcElement.files[i];
          var reader = new FileReader();
          reader.onloadend = function() {
               $(".change-avatar").attr("src",reader.result)
          }
          reader.readAsDataURL(file);
      }
  });

  $(".post_image").change(function(e) {
      for (var i = 0; i < e.originalEvent.srcElement.files.length; i++) {
          var file = e.originalEvent.srcElement.files[i];
          var reader = new FileReader();
          reader.onloadend = function() {
               $(".post_image_view").attr("src",reader.result)
          }
          reader.readAsDataURL(file);
      }
  });

  $(".tagsinput").change(function(){
    var tags = $(this).tagsinput('items');
    $(".tags-hidden").val(JSON.stringify(tags));
  });

});