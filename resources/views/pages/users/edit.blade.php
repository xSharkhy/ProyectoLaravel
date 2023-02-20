@extends('layouts.app')

@section('title', 'Editar perfil')

@section('content')
	<div
		class="my-16 grid w-full self-center rounded-lg border border-gray-200 bg-white p-4 shadow sm:p-6 md:p-8 lg:mx-auto lg:max-w-xl">
		@if ($errors->any())
			<ul class="my-2 rounded-lg border border-red-700 bg-red-50 p-4 text-xs text-red-700">
				@foreach ($errors->all() as $error)
					<li class="">{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		<form action="{{ route('users.update', Auth::user()) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="mb-6 grid gap-6 md:grid-cols-2">
				<div>
					<label for="birthday" class="mb-2 block text-sm font-medium text-gray-900">Fecha de nacimiento <span
							class="font-semibold text-teal-600"> * Formato (DD/MM/AAAA)</span></label>
					<input type="date" id="birthday" name="birthday" class="form-input focus:border-teal-500 focus:ring-teal-500"
						value="{{ Auth::user()->birthday }}" required>
				</div>
			</div>
			<div class="mb-6 grid gap-6 md:grid-cols-3">
				<div>
					<label for="instagram" class="mb-2 block text-sm font-medium text-gray-900">Usuario de Instagram<span
							class="text-xs font-semibold text-teal-600"> (Opcional)</span></label>
					<div class="flex">
						<span
							class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900">
							@
						</span>
						<input type="text" id="instagram" name="instagram"
							class="block w-full min-w-0 flex-1 rounded-none rounded-r-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-teal-500 focus:ring-teal-500"
							placeholder="Juancito13" value="{{ Auth::user()->instagram }}">
					</div>
				</div>
				<div>
					<label for="twitch" class="mb-2 block text-sm font-medium text-gray-900">Usuario de Twitch<span
							class="text-xs font-semibold text-teal-600"> (Opcional)</span></label>
					<div class="flex">
						<span
							class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900">
							/
						</span>
						<input type="text" id="twitch" name="twitch"
							class="block w-full min-w-0 flex-1 rounded-none rounded-r-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-teal-500 focus:ring-teal-500"
							placeholder="Juancito13" value="{{ Auth::user()->twitch }}">
					</div>
				</div>
				<div>
					<label for="twitter" class="mb-2 block text-sm font-medium text-gray-900">Usuario de Twitter<span
							class="text-xs font-semibold text-teal-600"> (Opcional)</span></label>
					<div class="flex">
						<span
							class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900">
							@
						</span>
						<input type="text" id="twitter" name="twitter"
							class="block w-full min-w-0 flex-1 rounded-none rounded-r-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-teal-500 focus:ring-teal-500"
							placeholder="Juancito13" value="{{ Auth::user()->twitter }}">
					</div>
				</div>
			</div>
			<div class="mb-6">
				<label for="password" class="mb-2 block text-sm font-medium text-gray-900">Contraseña</label>
				<input type="password" id="password" name="password" class="form-input focus:border-teal-500 focus:ring-teal-500"
					placeholder="•••••••••">
			</div>
			<div class="mb-6">
				<label for="confirm_password" class="mb-2 block text-sm font-medium text-gray-900">Confirmar
					contraseña</label>
				<input type="password" id="confirm_password" name="password_confirmation"
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="•••••••••">
			</div>
			<button type="submit"
				class="focus:ring-blue-30mit w-full rounded-lg bg-teal-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4">Actualizar!</button>
		</form>
	</div>
@endsection
