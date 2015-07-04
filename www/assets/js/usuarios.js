$(document).ready(function() {
	$.ajax({
  url: '/get-usuarios',
  success: function(data){
  	// var records = JSON.parse(data);
    $('#my-ajax-table').dynatable({
      dataset: {
        records: data
      }
    });
  }
});

});