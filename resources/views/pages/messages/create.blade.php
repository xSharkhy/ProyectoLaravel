@extends('layouts.app')

@section('title', 'Contacto')

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
		@if (session('success'))
			<div class="my-2 rounded-lg border border-green-700 bg-green-50 p-4 text-xs text-green-700">
				{{ session('success') }}
			</div>
		@endif
		<form action="{{ route('messages.store') }}" method="POST">
			@csrf
			<div class="mb-6">
				<label for="email" class="mb-2 block text-sm font-medium text-gray-900">Correo electrónico</label>
				<input type="email" id="email" name="email"
					@auth value="{{ old('email', Auth::user()->email) }}" @else required @endauth
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="john.doe@company.com">
			</div>
			<div class="mb-6">
				<label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nombre de Usuario</label>
				<input type="text" id="name" name="name"
					@auth value="{{ old('name', Auth::user()->name) }}" @else required @endauth
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="PaquitoXx360">
			</div>
			<div class="mb-6">
				<label for="subject" class="mb-2 block text-sm font-medium text-gray-900">Asunto</label>
				<input type="text" id="subject" name="subject" value="{{ old('subject') }}" required
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="Incidente en...">
			</div>
			<div class="mb-6">
				<label for="message" class="mb-2 block text-sm font-medium text-gray-900">Mensaje</label>
				<textarea id="message" name="message" rows="4" class="form-input focus:border-teal-500 focus:ring-teal-500"
				 placeholder="Hola, me gustaría saber más sobre..." required>{{ old('message') }}</textarea>
			</div>
			<button type="submit"
				class="focus:ring-blue-30mit w-full rounded-lg bg-teal-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4">Enviar!</button>
		</form>
	</div>
@endsection
