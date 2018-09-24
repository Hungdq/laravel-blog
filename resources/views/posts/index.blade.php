@extends ('layouts.master')

@section ('content')
<h3 class="pb-3 mb-4 font-italic border-bottom">
	From the Firehose
</h3>

@foreach ($posts as $post)
	@include ('posts.post')
@endforeach

@endsection