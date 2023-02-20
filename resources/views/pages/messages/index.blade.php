@extends('layouts.app')

@section('title', 'ADMIN - Mensajes')

@section('content')
	<div class="container mx-auto my-20">
		<div class="flex items-center justify-between">
			@if (session('success'))
				<div class="my-2 rounded-lg border border-green-700 bg-green-50 p-4 text-xs text-green-700">
					{{ session('success') }}
				</div>
			@endif
			<h1 class="text-2xl font-bold">Mensajes</h1>
			<a href="{{ route('messages.create') }}"
				class="rounded-lg bg-teal-700 px-4 py-2 text-white shadow-sm hover:bg-teal-900 hover:shadow-2xl">Nuevo</a>
		</div>
		<div class="my-8">
			<table class="w-full">
				<thead>
					<tr class="text-left">
						<th class="px-4 py-2">ID</th>
						<th class="px-4 py-2">Nombre</th>
						<th class="px-4 py-2">Asunto</th>
						<th class="px-4 py-2">Fecha</th>
						<th class="px-4 py-2">Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($messages as $message)
						<tr @class([
							'bg-slate-200' => $message->readed,
							'border border-teal-700 hover:bg-teal-100',
						])>
							<td class="px-4 py-2">{{ $message->id }}</td>
							<td class="px-4 py-2">{{ $message->name }}</td>
							<td class="px-4 py-2">{{ $message->subject }}</td>
							<td class="px-4 py-2">{{ $message->created_at->format('d/m/Y') }}</td>
							<td class="px-4 py-2">
								<a href="{{ route('messages.show', $message) }}" class="text-teal-700 hover:underline">Ver</a>
								<form action="{{ route('messages.destroy', $message) }}" method="POST" class="inline-block">
									@csrf
									@method('DELETE')
									<button type="submit" class="text-red-700 hover:underline">Eliminar</button>
								</form>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection
