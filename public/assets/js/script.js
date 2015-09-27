$('.ui.dropdown')
  .dropdown()
;
var results_table = $('#results-table').DataTable({
	"paging":   false
});
console.log(results_table);

$('.search-results').hide(0);

$('#search-panel #s-country, #search-panel #s-type, #search-panel #s-breed, #search-panel #s-gender').change(function (event) {
	
	var data = {};

    console.log('country: ' + $('#s-country').val());
    if($('#s-country').val() != '') {
	    data.country = $('#s-country').val();
	}
	console.log('type: ' + $('#s-type').val());
	if($('#s-type').val() != '') {
		data.type = $('#s-type').val();
	}
	console.log('breed: ' + $('#s-breed').val());
	if($('#s-breed').val() != '') {
		data.breed = $('#s-breed').val();
	}
	console.log('gender: ' + $('#s-gender').val());
	if($('#s-gender').val() != '') {
		data.gender = $('#s-gender').val();
	}

	$.ajax({
	    url: '/search',
	    type: 'post',
	    data: data,
	    headers: {
	        'X-CSRF-Token': $('input[name="_token"]').val()
	    },
	    dataType: 'json',
	    success: function (data) {
	        var table = $('#results-table');

	        if( ! data.length) {
	        	results_table.clear();
	        	results_table.draw();
	        	$('.search-results').hide(0);
	        }
	        else { // success
	        	results_table.clear();

	        	for (var i = 0; i < data.length; ++i) {
	        		results_table.row.add([
						data[i].country,
						data[i].name,
						data[i].type,
						data[i].breed,
						data[i].gender ? "Female" : "Male"
	        		]).draw();
	        		/*table.append(
        			'<tr>' + 
        				'<td>' + data[i].country + '</td>' +
        				'<td>' + data[i].name + '</td>' +
        				'<td>' + data[i].type + '</td>' +
        				'<td>' + data[i].breed + '</td>' +
        				'<td>' + data[i].gender + '</td>' +
        			'</tr>'
        			);*/
	        	};

	        	$('.search-results').show(300);
	        }
	    }
	});
});

$('.add-pet-form').hide();

$('.add-pet').click(function () {
	if($('.add-pet-form').is(':visible')) {
		$('.add-pet-form').hide();
	}
	else {
		$('.add-pet-form').show();
	}
});

$('#add-pet-cancel').click(function () {
	$('.add-pet-form').hide();
});

$('.remove-pet-btn').click(function (event) {
	$.ajax({
	    url: '/remove-pet',
	    type: 'post',
		data: {
			pet_id: $(this).attr('data-pet-id')
		},
	    headers: {
	        'X-CSRF-Token': $('input[name="_token"]').val()
	    },
	    dataType: 'json',
	    success: function (data) {
	    	alert('Pet has been removed successfully!');
			window.location = '/menu';
		}
	});
});

$('#add-pet-save').click(function () {
	$.ajax({
	    url: '/add-pet',
	    type: 'post',
		data: {
			name: $('#add-pet-name').val(),
			gender: $('#add-pet-gender').val(),
			country: $('#s-country').val(),
			type: $('#s-type').val(),
			breed: $('#s-breed').val()
		},
	    headers: {
	        'X-CSRF-Token': $('input[name="_token"]').val()
	    },
	    dataType: 'json',
	    success: function (data) {
	    	alert('Pet has been added successfully!');
			window.location = '/menu';
		}
	});
});