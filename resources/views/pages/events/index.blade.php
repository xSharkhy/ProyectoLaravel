@extends('layouts.app')

@section('title', 'Eventos')

@section('content')
	<div class='w-full py-8'>
		<div class='mx-auto flex h-full w-full max-w-screen-lg flex-col justify-center p-4'>
			<div class='pb-8'>
				<p class='inline text-4xl font-bold text-teal-800'>Eventos</p>
				<p class='py-6'>Todos los eventos que la Marina organiza.</p>
			</div>

			<div class='grid gap-8 px-12 sm:grid-cols-2 sm:px-0 md:grid-cols-3'>
				@foreach ($events as $event)
					<div class='rounded-lg text-sm shadow-md shadow-gray-600'>
						<img src={{ asset('samples/sample.png') }} alt="Sample Portfolio"
							class='rounded-md rounded-b-none duration-200 hover:scale-105' />
						<div @class([
							'grid grid-cols-2 items-center justify-center gap-4',
							'hidden' => !Auth::check(),
						])>
							<a href="{{ route('events.show', $event) }}"
								class='w-full px-8 py-4 text-center duration-200 hover:scale-105'>Ver</a>
							<form method="POST" action="{{ route('events.toggleJoin', $event) }}"
								class="w-full px-8 py-4 text-center duration-200 hover:scale-105">
								@csrf
								@method('PUT')
								<button type="submit" @class([
									'text-red-600' => $event->users->contains(Auth::user()),
									'text-teal-600' => !$event->users->contains(Auth::user()),
								])>
									{{ $event->users->contains(Auth::user()) ? 'Dejar evento' : 'Unirse al evento' }}
								</button>
							</form>
						</div>
						<div @class([
							'grid grid-cols-2 items-center justify-center gap-4',
							'hidden' => !(Auth::check() && Auth::user()->rol == 'admin'),
						])>
							<a href="{{ route('events.edit', $event) }}"
								class='w-full px-8 py-4 text-center duration-200 hover:scale-105'>Editar</a>
							<form action="{{ route('events.destroy', $event) }}" method="POST">
								@csrf
								@method ('DELETE')
								<input type="submit" class='w-full px-8 py-4 text-center text-red-800 duration-200 hover:scale-105'
									value="Eliminar">
							</form>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection
