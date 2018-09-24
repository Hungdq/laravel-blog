@extends ('layouts.master');

@section ('content')
	<h1>CREATE A POST</h1>

	@include ('layouts.errors')

	<form method="POST" action="/posts">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="txtTitle">Title</label>
			<input type="text" class="form-control" id="txtTitle" placeholder="Enter Title" name="title">
		</div>
		<div class="form-group">
			<label for="txtContent">Content</label>
			<textarea name="content" class="form-control"></textarea>
		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
@endsection