@extends ('layouts.master')

@section ('content')

<div class="blog-post">
	<h2 class="blog-post-title">
		<a href="/posts/{{ $post->id }}">
			{{ $post->title }}
		</a>
	</h2>

	@if (count($post->tags))
		<ul>
			@foreach ($post->tags as $tag)
				<li>
					<a href="/posts/tags/{{ $tag->name }}">
						{{ $tag->name }}
					</a>
				</li>
			@endforeach
		</ul>
	@endif

	<p class="blog-post-meta">
		{{ $post->created_at->toFormattedDateString() }}
	</p>
	<p>{{ $post->content }}</p>

	<hr>

	<div class="comment">
		<ul class="list-group">
			@foreach ($post->comments as $comment)
				<li class="list-group-item">
					<strong>
						{{ $comment->created_at->diffForHumans() }}
					</strong>
					{{ $comment->body }}
				</li>
			@endforeach
		</ul>
	</div>

	<hr>

	<div class="card">
		<div class="card-block">
			@include ('layouts.errors')
			<form method="POST" action="/posts/{{ $post->id }}/comments">
				{{ csrf_field() }}
				<div class="form-group">
					<textarea name="body" placeholder="Your comment here." class="form-control"></textarea>
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Add Comment</button>
				</div>
			</form>
		</div>
	</div>
</div><!-- /.blog-post -->

@endsection