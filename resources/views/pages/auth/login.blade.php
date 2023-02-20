@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')
	<div
		class="my-20 grid w-full self-center rounded-lg border border-gray-200 bg-white p-4 shadow sm:p-6 md:p-8 lg:mx-auto lg:max-w-xl">
		@if ($errors->any())
			<ul class="my-2 rounded-lg border border-red-700 bg-red-50 p-4 text-xs text-red-700">
				@foreach ($errors->all() as $error)
					<li class="">{{ $error }}</li>
				@endforeach
			</ul>
		@endif
		@isset($error)
			<div class="my-2 rounded-lg border border-red-700 bg-red-50 p-4 text-xs text-red-700">
				{{ $error }}
			</div>
		@endisset
		<form action="{{ route('login') }}" method="POST">
			@csrf
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
			<div class="mb-6 flex items-start">
				<div class="flex h-5 items-center">
					<input id="remember" type="checkbox" name="remember"
						class="focus:ring-3 h-4 w-4 rounded border border-gray-300 bg-gray-50 focus:ring-teal-300">
				</div>
				<label for="remember" class="ml-2 text-sm font-medium text-gray-900">Mantener la sesión iniciada.</label>
			</div>
			<button type="submit"
				class="focus:ring-blue-30mit w-full rounded-lg bg-teal-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4">Iniciar
				Sesión!</button>
			<span class="mt-4 block text-right text-xs font-medium">Aún no eres usuario? <a href="{{ route('register') }}"
					class="font-bold text-teal-600 hover:text-teal-800 hover:underline">Regístrate</a></span>
		</form>
	</div>
@endsection
