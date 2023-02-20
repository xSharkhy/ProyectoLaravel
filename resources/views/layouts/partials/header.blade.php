@php
	$navItems = [
	    [
	        'name' => 'Inicio',
	        'route' => 'landing',
	    ],
	    [
	        'name' => 'Eventos',
	        'route' => 'events.index',
	    ],
	    [
	        'name' => 'Miembros',
	        'route' => 'users.index',
	    ],
	    [
	        'name' => 'Contacto',
	        'route' => 'messages.create',
	    ],
	    [
	        'name' => 'Dónde estamos',
	        'route' => 'location',
	    ],
	];
	
	$anonUser = [
	    [
	        'name' => 'Iniciar sesión',
	        'route' => 'login',
	    ],
	    [
	        'name' => 'Registrarse',
	        'route' => 'register',
	    ],
	];
	
	$authUser = [
	    [
	        'name' => 'Perfil',
	        'route' => 'users.show',
	    ],
	    [
	        'name' => 'Cerrar sesión',
	        'route' => 'logout',
	    ],
	];
	
	$adminUser = array_merge($authUser, [
	    [
	        'name' => 'Crear evento',
	        'route' => 'events.create',
	    ],
	    [
	        'name' => 'Mensajes',
	        'route' => 'messages.index',
	    ],
	]);
	
	$userItems = Auth::check() ? (Auth::user()->rol == 'admin' ? $adminUser : $authUser) : $anonUser;
	$userButton = '<a href="#userModal" class="px-4 focus:outline-none">
			<svg class="h-8 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256">
				<rect width="256" height="256" fill="none" />
				<circle cx="128" cy="128" r="96" fill="none" stroke="#FFF" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="12" />
				<circle cx="128" cy="120" r="40" fill="none" stroke="#FFF" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="12" />
				<path d="M63.8,199.4a72,72,0,0,1,128.4,0" fill="none" stroke="#FFF" stroke-linecap="round"
					stroke-linejoin="round" stroke-width="12" />
			</svg>
		</a>';
@endphp

<header class="fixed z-10 flex h-20 w-full items-center justify-between bg-teal-900 px-4 text-white">
	<a href="{{ route('landing') }}" class="flex items-center">
		<span class="ml-2 text-3xl font-bold lg:text-4xl">Marine HQ</span>
	</a>

	<div class="hidden md:flex">
		@foreach ($navItems as $item)
			<a href="{{ route($item['route']) }}"
				class="cursor-pointer px-4 font-light capitalize duration-200 hover:scale-110">{{ $item['name'] }}</a>
		@endforeach
		{!! $userButton !!}
	</div>

	<div class="md:hidden">
		<div class="flex flex-row-reverse">
			<a class="px-4 focus:outline-none" href="#navModal">
				<svg class="h-8 w-8" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
					stroke="currentColor" viewBox="0 0 24 24">
					<path d="M4 6h16M4 12h16M4 18h16"></path>
				</svg>
			</a>
			{!! $userButton !!}
		</div>
		<div id="navModal"
			class="absolute right-0 top-20 z-20 hidden rounded-md border-2 border-teal-900 bg-teal-50 p-4 text-black shadow-xl target:block">
			<div class="flex flex-col text-right">
				<a href="#">
					<svg class="h-4 w-4 text-left text-teal-900" fill="none" stroke-linecap="round" stroke-linejoin="round"
						stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
						<path d="M6 18L18 6M6 6l12 12"></path>
					</svg>
				</a>
				@foreach ($navItems as $item)
					<a href="{{ route($item['route']) }}"
						class="cursor-pointer px-4 py-2 font-normal capitalize duration-200 hover:scale-105 hover:bg-teal-500 hover:text-white">{{ $item['name'] }}</a>
				@endforeach
			</div>
		</div>
	</div>
	<div id="userModal"
		class="absolute right-10 top-20 z-20 hidden rounded-md border-2 border-teal-900 bg-teal-50 p-4 text-black shadow-xl target:block md:right-0">
		<div class="flex flex-col text-right">
			<a href="#">
				<svg class="h-4 w-4 text-left text-teal-900" fill="none" stroke-linecap="round" stroke-linejoin="round"
					stroke-width="2" stroke="currentColor" viewBox="0 0 24 24">
					<path d="M6 18L18 6M6 6l12 12"></path>
				</svg>
			</a>
			@forelse ($userItems as $item)
				@if ($loop->index == 2)
					<hr class="my-2 -mx-4 border-teal-900" />
				@endif
				<a
					@auth href="{{ route($item['route'], Auth::user()) }}"
                    @else href="{{ route($item['route']) }}" @endauth
					class="cursor-pointer px-4 py-2 font-normal capitalize duration-200 hover:scale-105 hover:bg-teal-500 hover:text-white">{{ $item['name'] }}</a>
			@empty
			@endforelse
		</div>
	</div>
</header>
