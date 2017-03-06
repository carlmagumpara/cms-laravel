var App = new Vue({
  el: '#app',
  methods: {
   showDeleteModal(data){
   	$('#deleteModal').modal('show')
   	$('.delete-modal').attr('action',data);
   } 
  }
});