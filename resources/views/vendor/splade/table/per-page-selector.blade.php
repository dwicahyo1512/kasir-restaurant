<select
    name="per_page"
    class="select select-bordered w-full max-w-xs"
    @change="table.updateQuery('perPage', $event.target.value)"
  >
    @foreach($table->allPerPageOptions() as $perPage)
        <option value="{{ $perPage }}" @selected($perPage === $table->perPage())>
            {{ $perPage }} {{ __('per page') }}
        </option>
    @endforeach
</select>
