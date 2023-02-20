@extends('layouts.app')

@section('title', 'ADMIN - Mensajes')

@section('content')
	<div id="defaultModal" tabindex="-1" aria-hidden="true"
		class="grid self-center w-full p-4 my-20 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 lg:mx-auto lg:max-w-xl">
		<div class="flex items-start justify-between p-4 border-b rounded-t border-b-black">
			<h3 class="text-xl font-semibold text-gray-900">
				{{ $message->subject }}
			</h3>
		</div>
		<div class="p-6 space-y-12">
			<p class="my-4 text-base leading-relaxed text-black">
				{{ $message->text }}
			</p>
		</div>
		<a href="{{ route('messages.index') }}"
			class="px-2 py-2 mt-8 text-center text-white bg-teal-700 rounded-lg shadow-sm hover:bg-teal-900 hover:shadow-2xl">Volver</a>
	</div>
@endsection
