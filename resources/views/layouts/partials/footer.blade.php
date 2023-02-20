@php
	$footerItems = [
	    [
	        'id' => 1,
	        'name' => 'Política de privacidad',
	        'route' => 'policy',
	    ],
	    [
	        'id' => 2,
	        'name' => 'Configuración de cookies',
	        'route' => 'cookiemanage',
	    ],
	    [
	        'id' => 3,
	        'name' => 'Política de cookies',
	        'route' => 'cookies',
	    ],
	];
@endphp

<footer class="fixed bottom-0 w-full bg-gray-100 p-3 text-center text-xs">
	<div class="container mx-auto">
		<ul class="flex justify-center">
			@foreach ($footerItems as $item)
				<li class="mr-6">
					<a class="text-teal-500 hover:text-teal-800" href="{{ route($item['route']) }}">{{ $item['name'] }}</a>
				</li>
			@endforeach
		</ul>
		<p class="mt-3">Desarrollado por Ismael Morejón © 2023</p>
	</div>
</footer>
