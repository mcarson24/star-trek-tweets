<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Holly Amos tweets all the Star Trek</title>
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/star-trek.css') }}">
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
	</head>
	<body class="text-md bg-gray-100 bg-stripes">
		<div id="top" class="mx-auto w-4/5 max-w-6xl">
			<div class="my-6 text-center flex justify-around font-bold text-3xl">
				<div class="w-3/5 flex items-center">
					<h1>
						<a href="https://twitter.com/hollyamos22">@hollyamos22</a>
						tweets all the Star Trek
					</h1>
					<img src="images/starfleet-logo.png" alt="Delta by Chris from the Noun Project" class="w-1/6">
				</div>
			</div>
			<div class="bg-gray-100 rounded-lg shadow-2xl p-3 my-4">
				<div class="flex py-2">
					<h2 class="w-1/4 text-2xl font-bold text-left p-l-1">Time <span class="hidden lg:inline">(U.S. Pacific)</span></h2>
					<h2 class="w-3/4 text-2xl px-2 font-bold text-left">Tweet</h2>
				</div>
				@yield('content')
			</div>
		</div>
		@include('footer')
	</body>
</html>
