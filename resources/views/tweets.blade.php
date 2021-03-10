@extends('layout')

@section('content')
	@foreach($tweets as $tweet)
		<div class="flex py-6 my-2">
			<p class="w-1/4 hidden lg:block">{{ $tweet->fullTime }}</p>
			<p class="w-1/4 lg:hidden">{{ $tweet->shortTime }}</p>
			<div class="w-3/4 px-2">
				<p class="overflow-scroll">{!! $tweet->formattedText !!}</p>
			</div>
		</div>
	@endforeach
	{{ $tweets->onEachSide(1)->links() }}
@endsection
