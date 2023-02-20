<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>@yield('title') - Ismael Morejón</title>
	<link rel="shortcut icon" href="{{ asset('/ballena.png') }}" type="image/x-icon">
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50">
	@include('layouts.partials.header')

	<main class="container mx-auto pt-16">
		@yield('content')
	</main>

	@include('layouts.partials.footer')
</body>

</html>
