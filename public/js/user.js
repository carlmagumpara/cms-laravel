var auth = window.Laravel['user']
var csrfToken = window.Laravel['csrfToken']

var App = new Vue({
  el: '#app',
  data: {
    post: [],
    likes: [],
    comments: [],
    replies: [],
    post_id: $(".post-data").attr('post-data-id'),
    user: auth,
    token: csrfToken,
    show_user_info: [],
    show_profile: false,
    activities: []
  },
  created: function(){
    this.postComments();
    this.postLikes();
    this.postReplies();
  },
  methods: {
    changePassword(){
      form = $('.change_password_form');
      formData = form.serializeArray();
      url = form.attr('action');
      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data){
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          form.find($("input")).val("");
          form.find($(".alert")).show().text("Password successfuly changed!");
          setTimeout(function(){
            $(".alert").fadeOut();
          },3000);
        },
        error: function(data){
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          errors = data.responseJSON;
          $.each(errors, function(i, val){
            $.each(val, function(i, val){
              input = $("#" + i);
              input.parent().addClass("has-error");
              $("<span class='error has-error'>"+ val +"</span>").insertAfter(input);
            });
          });
        }
      });
    },
    updateProfile(){
      form = $('.update_profile_form');
      formData = form.serializeArray();
      url = form.attr('action');
      redirect = url.replace('/update','');
      $.ajax({
        url: url,
        data: formData,
        type: 'POST',
        success: function(data){
          window.location.href = redirect;
        },
        error: function(data){
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          errors = data.responseJSON;
          $.each(errors, function(i, val){
            input = $("[name="+i+"]");
            input.parent().addClass("has-error");
            $("<span class='error has-error'>"+ val +"</span>").insertAfter(input);
          });
        }
      });
    },
    postComment(){
      form = $('.comment-form');
      formData = form.serializeArray();
      $(".comment-list").prepend('<article class="row place-holder-comment"><div class="col-md-2 col-sm-2 hidden-xs"> <figure class="thumbnail"> <img class="img-responsive" src="/uploads/avatars/'+this.user.avatar+'"> </figure> </div><div class="col-md-10 col-sm-10"> <div class="panel panel-default arrow left"> <div class="panel-body"> <header class="text-left"> <div class="comment-user"><span class="fui-user"></span><p class="loading-comment fa fa-spin"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></p>&nbsp;&nbsp; '+this.user.firstname+'&nbsp;'+this.user.lastname+'</div><small><time class="comment-date like-this no-padding" datetime="16-12-2014 01:05" v-else><i class="fa fa-clock-o"></i>&nbsp;&nbsp; Loading...</time></small></header> <div class="comment-post"> <p>'+form.find($("[name=comment]")).val()+'</p></div><p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p></div></div></div></article>')
      url = form.attr('action'); 
      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data){
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          $('.place-holder-comment').remove();
          form.find($('[name=comment]')).val('');
          this.comments.unshift(data);         
        }.bind(this),
        error: function(data){
          $('.place-holder-comment').remove();
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          errors = data.responseJSON;
          $.each(errors, function(i, val){
            input = $("[name="+i+"]");
            input.parent().addClass("has-error");
            $("<span class='error has-error'>"+ val +"</span>").insertAfter(input);
          });
        }
      });
    },
    postComments(){
      $.ajax({
        type: 'GET',
        url: '/comments/' + this.post_id,
        success: function(data){
          this.comments = data;
        }.bind(this)
      });
    },
    deleteComment(id, comment){
      $.ajax({
        type: 'POST',
        url: '/comment/'+id+'/delete',
        data: {_method: 'delete', _token: this.token},
        success: function(){
          var index = this.comments.indexOf(comment)
          this.comments.splice(index, 1)
        }.bind(this)
      });
    },
    getAvatar(image){
      return '/uploads/avatars/' + image;
    },
    postLikes(){
      $.ajax({
        type: 'GET',
        url: '/likes/'+this.post_id,
        success: function(data){
          this.likes = data
        }.bind(this)
      });
    },
    Like(){
      form = $(".like-form");
      formData = form.serializeArray();
      url = form.attr('action');
      $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data){
          this.likes.push(data)
        }.bind(this)
      });
    },
    UnLike(likes){
      form = $(".unlike-form");
      formData = form.serializeArray();
      url = form.attr('action');
      $.ajax({
        type: 'POST',
        url: url,
        data: formData,
        success: function(data){
          for(var like in likes){
            if (likes[like].user_id == this.user.id && likes[like].post_id == this.post_id) {
              var index = this.likes.indexOf(likes[like])
              this.likes.splice(index, 1)
            }
          }
        }.bind(this)
      });
    },
    checkIfItIsInArray(likes){
      for(var like in likes){
        if (likes[like].user_id == this.user.id && likes[like].post_id == this.post_id) {
          return true;
        }
      }
    },
    getLikeIdUrl(likes, post_id){
      for(var like in likes){
        if (likes[like].user_id == this.user.id && likes[like].post_id == this.post_id) {
          return '/post/unlike/'+likes[like].id;
        }
      }
    },
    getTime(time){
      return moment(time, "YYYYMMDD").fromNow();
    },
    replyForm(id){
      return 'reply-form-'+id;
    },
    showPost(post_id,id){
      return '/post/'+post_id+'/#'+id;
    },
    showReply(id){
      $('.reply-form-'+id).slideToggle();
    },
    postReply(id){
      form = $('.reply-form-'+id).find($('form'));
      formData = form.serializeArray();
      url = form.attr('action');
      $.ajax({
        url: url,
        type: 'POST',
        data: formData,
        success: function(data){
          $('.error').remove();
          $('.form-group').removeClass("has-error");
          form.find($('[name=reply]')).val('');
          this.postReplies()
        }.bind(this),
        error: function(data){
          $('.form-group').removeClass("has-error");
          errors = data.responseJSON;
          $.each(errors, function(i, val){
            input = form.find($("[name="+i+"]"));
            input.parent().addClass("has-error");
            $("<span class='error has-error'>"+ val +"</span>").insertAfter(input);
          });
        }
      })
    },
    postReplies(){
      $.ajax({
        type: 'GET',
        url: '/replies/'+this.post_id,
        success: function(data){
          this.replies = data;
        }.bind(this)
      });
    },
    deleteReply(id, reply){
      $.ajax({
        type: 'POST',
        url: '/reply/'+id+'/delete',
        data: {_method: 'delete', _token: this.token},
        success: function(){
          var index = this.replies.indexOf(reply)
          this.replies.splice(index, 1)
        }.bind(this)
      });
    },
    showUsersInfo(id){
      $('#show-profile').modal('show')
      $.ajax({
        type: 'GET',
        url: '/user/data/' + id,
        success: function(data){
          this.show_user_info = data;
          setTimeout(function(){
            this.show_profile = true
          }.bind(this),500)
        }.bind(this)
      });
      $.ajax({
        type: 'GET',
        url: '/user/data/activity/' + id,
        success: function(data){
          this.activities = data;
        }.bind(this)
      });
    },
    closeProfile(){
      $('#show-profile').modal('hide')
      this.show_profile = false
    }
  }
});