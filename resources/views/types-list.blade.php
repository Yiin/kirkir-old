<select id="s-type" class="ui dropdown">
  <option value="">Type of a pet</option>

  @foreach (App\Type::all() as $type)
	<option value="{{ $type->id }}">{{ $type->name }}</option>
  @endforeach
</select>