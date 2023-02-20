@extends('layouts.app')

@section('title', 'Registro')

@section('content')
	<div
		class="my-16 grid w-full self-center rounded-lg border border-gray-200 bg-white p-4 shadow sm:p-6 md:p-8 lg:mx-auto lg:max-w-xl">
		@isset($error)
			<div class="mb-6">
				<p class="text-red-500">{{ $error }}</p>
			</div>
		@endisset
		<form action="{{ route('register') }}" method="POST">
			@csrf
			<div class="mb-6 grid gap-6 md:grid-cols-2">
				<div>
					<label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nombre completo</label>
					<input type="text" id="name" name="name" class="form-input focus:border-teal-500 focus:ring-teal-500"
						placeholder="Juan Ramírez de la Fuente" required>
				</div>
				<div>
					<label for="username" class="mb-2 block text-sm font-medium text-gray-900">Nombre de usuario</label>
					<div class="flex">
						<span
							class="inline-flex items-center rounded-l-md border border-r-0 border-gray-300 bg-gray-200 px-3 text-sm text-gray-900">
							@
						</span>
						<input type="text" id="username" name="username"
							class="block w-full min-w-0 flex-1 rounded-none rounded-r-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-teal-500 focus:ring-teal-500"
							placeholder="Juancito13" required>
					</div>
				</div>
			</div>
			<div class="mb-6 grid gap-6 md:grid-cols-2">
				<div>
					<label for="birthday" class="mb-2 block text-sm font-medium text-gray-900">Fecha de nacimiento <span
							class="font-semibold text-teal-600"> * Formato (DD/MM/AAAA)</span></label>
					<input type="date" id="birthday" name="birthday" class="form-input focus:border-teal-500 focus:ring-teal-500"
						placeholder="DD/MM/AAAA" required>
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
							placeholder="Juancito13">
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
							placeholder="Juancito13">
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
							placeholder="Juancito13">
					</div>
				</div>
			</div>
			<div class="mb-6">
				<label for="email" class="mb-2 block text-sm font-medium text-gray-900">Correo electrónico</label>
				<input type="email" id="email" name="email" class="form-input focus:border-teal-500 focus:ring-teal-500"
					placeholder="john.doe@company.com" required>
			</div>
			<div class="mb-6">
				<label for="password" class="mb-2 block text-sm font-medium text-gray-900">Contraseña</label>
				<input type="password" id="password" name="password" class="form-input focus:border-teal-500 focus:ring-teal-500"
					placeholder="•••••••••" required>
			</div>
			<div class="mb-6">
				<label for="confirm_password" class="mb-2 block text-sm font-medium text-gray-900">Confirmar
					contraseña</label>
				<input type="password" id="confirm_password" name="password_confirmation"
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="•••••••••" required>
			</div>
			<div class="mb-6 flex items-start">
				<div class="flex h-5 items-center">
					<input id="remember" type="checkbox" value=""
						class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-teal-300"required>
				</div>
				<label for="remember" class="ml-2 text-sm font-medium text-gray-900">Estoy de acuerdo con la <a
						href="{{ route('policy') }}" class="text-teal-600 hover:underline">política de privacidad</a>.</label>
			</div>
			<button type="submit"
				class="focus:ring-blue-30mit w-full rounded-lg bg-teal-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4">Registrarse!</button>
			<span class="mt-4 block text-right text-xs font-medium">Ya estás registrado? <a href="{{ route('login') }}"
					class="font-bold text-teal-600 hover:text-teal-800 hover:underline">Accede</a></span>
		</form>
	</div>

	@if ($errors->any())
		<ul>
			@foreach ($errors->all() as $error)
				<li class="my-12 font-bold text-black">{{ $error }}</li>
			@endforeach
		</ul>
	@endif
@endsection
