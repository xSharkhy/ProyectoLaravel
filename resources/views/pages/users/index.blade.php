@extends('layouts.app')

@section('title', 'Miembros')

@section('content')
	<div class="grid grid-cols-1 gap-4 py-24 md:grid-cols-2 lg:grid-cols-3">
		@foreach ($users as $user)
			<div class="rounded-lg bg-white p-4 shadow-lg">
				<div class="flex items-center">
					<img class="h-16 w-16 rounded-full object-cover" src="{{ asset('/samples/koby.jpg') }}" alt="{{ $user->username }}">
					<div class="ml-4">
						<h2 class="text-lg font-semibold text-gray-700">{{ $user->username }}</h2>
						<p class="text-sm text-gray-500">{{ $user->name }}</p>
						<p class="text-sm text-gray-500">{{ $user->email }}</p>
					</div>
				</div>
				@if (Auth::check())
					<div class="mt-4 text-right">
						<a href="{{ route('users.show', $user) }}"
							class="rounded-md px-2 py-1 font-semibold text-teal-600 hover:bg-teal-800 hover:text-white">Ver
							perfil</a>
					</div>
				@endif
			</div>
		@endforeach
	</div>
@endsection
