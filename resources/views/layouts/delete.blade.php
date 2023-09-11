<form method="post" action="{{ $action }}" class="d-inline">
	@csrf
	@method("delete")
	<input type="submit" class="btn btn-danger" value="{{ __("titles.delete") }}">
</form>