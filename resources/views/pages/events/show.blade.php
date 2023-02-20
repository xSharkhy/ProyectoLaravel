@extends('layouts.app')

@section('title', $event->name)

@section('content')
	<div class="my-20 overflow-hidden bg-white shadow sm:rounded-lg">
		<div class="block px-4 py-5 sm:px-6 md:grid md:grid-cols-3 md:gap-4">
			<div class="self-center">
				<h3 class="text-lg font-medium leading-6 text-teal-900">Información del evento</h3>
			</div>
			<div>
				<div>
					<div @class([
						'hidden' => Auth::user()->rol != 'admin',
						'grid md:grid-cols-2 md:gap-3',
					])>
						<a href="{{ route('events.edit', $event) }}"
							class="w-full rounded-md border border-transparent bg-teal-600 px-4 py-2 text-center text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2">
							Editar
						</a>
						<form action="{{ route('events.destroy', $event) }}" method="POST">
							@csrf
							@method('DELETE')
							<button type="submit"
								class="w-full items-center rounded-md border border-transparent bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-red-500 focus-visible:ring-offset-2">
								Eliminar
							</button>
						</form>
					</div>
					<div class="grid md:grid-cols-4 md:gap-3">
						<form method="POST" action="{{ route('events.toggleJoin', $event) }}"
							class="col-start-2 col-end-4 my-2 w-full self-center">
							@csrf
							@method('PUT')
							<button type="submit" @class([
								'border-red-600 text-red-600 focus-visible:ring-red-500' => $event->users->contains(
									Auth::user()),
								'border-teal-600 text-teal-600 focus-visible:ring-teal-500' => !$event->users->contains(
									Auth::user()),
								'w-full duration-200 hover:scale-105 px-4 py-2 rounded-md border bg-white text-sm font-medium focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2',
							])>
								{{ $event->users->contains(Auth::user()) ? 'Dejar evento' : 'Unirse al evento' }}
							</button>
						</form>

					</div>

				</div>
			</div>
			<img src="{{ asset('samples/sample.png') }}" alt="Sample event image"
				class="h-32 w-32 place-self-end rounded-sm object-cover">

		</div>
		<div class="border-t border-gray-200">
			<dl>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Nombre del evento</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->name }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Dirección</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->location }}</dd>
				</div>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Fecha</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->date }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Hora</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->hour }}</dd>
				</div>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Etiquetas</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->tags }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Descripción del Evento</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $event->description }}</dd>
				</div>
				{{-- asistentes --}}
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Asistentes</dt>
					<dd class="text-md mt-1 text-teal-900 sm:col-span-2 sm:mt-0">
						@foreach ($event->users as $user)
							<a href="{{ route('users.show', $user) }}" class="text-teal-600 hover:text-teal-900 hover:underline">
								{{ $user->name }}
							</a>
							@if (!$loop->last)
								,
							@endif
						@endforeach
					</dd>
				</div>
			</dl>
		</div>
	</div>
@endsection
