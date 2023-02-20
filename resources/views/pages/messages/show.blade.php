@extends('layouts.app')

@section('title', 'ADMIN - Mensajes')

@section('content')
	<div id="defaultModal" tabindex="-1" aria-hidden="true"
		class="my-20 grid w-full self-center rounded-lg border border-gray-200 bg-white p-4 shadow sm:p-6 md:p-8 lg:mx-auto lg:max-w-xl">
		<div class="flex items-start justify-between rounded-t border-b border-b-black p-4">
			<h3 class="text-xl font-semibold text-gray-900">
				{{ $message->subject }}
			</h3>
		</div>
		<div class="space-y-12 p-6">
			<p class="my-4 text-base leading-relaxed text-black">
				{{ $message->text }}
			</p>
		</div>
		<a href="{{ route('messages.index') }}"
			class="mt-8 rounded-lg bg-teal-700 px-2 py-2 text-center text-white shadow-sm hover:bg-teal-900 hover:shadow-2xl">Volver</a>
	</div>
@endsection
