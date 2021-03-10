<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Holly Amos tweets all the Star Trek</title>
		<link rel="stylesheet" href="css/app.css">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body>
		<div id="top" class="container m-0-auto">
			<h1 class="text-center">
				<a href="https://twitter.com/hollyamos22">@hollyamos22</a>
				tweets all the Star Trek
				<img src="images/starfleet-logo.png" alt="Delta by Chris from the Noun Project" class="logo">
			</h1>
			<div class="tweet-sheet">
				<div class="flex">
					<h2 class="time-header text-left p-l-1">Time (U.S. Pacific)</h2>
					<h2 class="tweet-header text-left">Tweet</h2>
				</div>
				@yield('content')
			</div>
			<div class="pagination">
				{{-- @if($page > 1)
					<div class="prev">
						<a href="/?page={{ page - 1 }}">&lt;&lt;Prev</a>
					</div>
				@endif
				@if($page < 46) 
					<div class="next">
						<a href="/?page={{ page + 1 }}">Next&gt;&gt;</a>
					</div>
				@endif --}}
			</div>
		</div>
		@include('footer')
	</body>
</html>
