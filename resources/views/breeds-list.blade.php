<select id="s-breed" class="ui dropdown">
  <option value="">Breed</option>
</select>

<script type="text/javascript">
	var breeds = [
		@foreach (App\Breed::all() as $breed)
			{
				'id': {{ $breed->id }},
				'type': {{ $breed->type_id + 1 }}, 
				'name': '{{ $breed->name }}'
			},
		@endforeach
	];

	$('#s-type').change(function (event) {
		console.log('change');
		var selected_type = $('#s-type').find(':selected').attr('value');
		var parent = $('#s-breed');

		parent.empty();
		parent.append('<option value="">Breed</option>');

		parent.val('');
		parent.parent()
			.find('.text')
				.text('Breed')
				.addClass('default');

		for (var i = breeds.length - 1; i >= 0; i--) {
			if(selected_type == breeds[i].type) {
				parent.append(
					'<option value="' 
					+ breeds[i].id 
					+ '">'
					+ breeds[i].name 
					+ '</option>'
				);
			}
		};
	});
</script>