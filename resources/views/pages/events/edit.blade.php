@extends('layouts.app')

@section('title', 'Editar evento - ADMIN')

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
		<form action="{{ route('events.update', $event) }}" method="POST" id="form">
			@csrf
			@method('PUT')
			<div class="mb-6">
				<label for="name" class="mb-2 block text-sm font-medium text-gray-900">Nombre del Evento</label>
				<input type="text" id="name" name="name" value="{{ $event->name }}" required
					class="form-input focus:border-teal-500 focus:ring-teal-500" placeholder="Invasión a Wano">
			</div>
			<div class="mb-6">
				<label for="description" class="mb-2 block text-sm font-medium text-gray-900">Descripción</label>
				<textarea id="description" name="description" rows="4"
				 class="form-input focus:border-teal-500 focus:ring-teal-500"
				 placeholder="La flota tiene previsto atracar en el puerto de..." required>{{ $event->description }}</textarea>
			</div>
			<div class="mb-6 grid gap-6 md:grid-cols-2">
				<div>
					<label for="date" class="mb-2 block text-sm font-medium text-gray-900">Fecha del Evento</label>
					<input type="date" id="date" name="date" value="{{ $event->date }}"
						class="form-input focus:border-teal-500 focus:ring-teal-500">
				</div>
				<div>
					<label for="hour" class="mb-2 block text-sm font-medium text-gray-900">Hora</label>
					<input type="time" id="hour" name="hour" value="{{ $event->hour }}"
						class="form-input focus:border-teal-500 focus:ring-teal-500">
				</div>
			</div>
			<div class="mb-6 grid gap-6 md:grid-cols-2">
				<div>
					<label for="location" class="mb-2 block text-sm font-medium text-gray-900">Localización</label>
					<input type="text" id="location" name="location" value="{{ $event->location }}" placeholder="Wano"
						class="form-input focus:border-teal-500 focus:ring-teal-500">
				</div>
				<div>
					<label for="visible" class="mb-2 block text-sm font-medium text-gray-900">Visible</label>
					<select name="visible" id="visible" required form="form"
						class="form-input focus:rounded-b-none focus:border-teal-500 focus:ring-teal-500">
						<option value="1" {{ $event->visible ? 'selected' : '' }}>Visible</option>
						<option value="0" {{ !$event->visible ? 'selected' : '' }}>No visible</option>
					</select>
				</div>
			</div>
			<div class="mb-6">
				<label for="tags" class="mb-2 block text-sm font-medium text-gray-900">Etiquetas</label>
				<input type="text" id="tags" name="tags" value="{{ $event->tags }}" required
					class="form-input focus:border-teal-500 focus:ring-teal-500"
					placeholder="intervencion,humanitaria,justicia,servicio">
			</div>
			<button type="submit"
				class="focus:ring-blue-30mit w-full rounded-lg bg-teal-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-teal-800 focus:outline-none focus:ring-4">Editar!</button>
		</form>
	</div>
@endsection
