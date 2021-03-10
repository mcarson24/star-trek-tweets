@extends('layout')

@section('content')
	@foreach($tweets as $tweet)
		<div class="flex">
			<p class="time p-t-s p-b-s p-l-1">{{ $tweet->fullTime }}</p>
			<p class="short-time p-t-s p-b-s p-l-1">{{ $tweet->shortTime }}</p>
			<div class="tweet-text">
				<p class="p-t-s p-b-s p-l-1">{{ $tweet->formattedText }}</p>
			</div>
		</div>
	@endforeach
@endsection
