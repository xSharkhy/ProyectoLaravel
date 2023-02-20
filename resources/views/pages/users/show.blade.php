@extends('layouts.app')

@section('title', $user->username)

@section('content')
	<div class="my-12 overflow-hidden bg-white shadow sm:rounded-lg">
		<div class="block px-4 py-5 sm:px-6 md:grid md:grid-cols-3 md:gap-4">

			<div class="self-center">
				<h3 class="text-lg font-medium leading-6 text-teal-900">Información de perfil</h3>
				<p class="mt-1 max-w-2xl text-sm text-teal-500">Personal details and application.</p>
			</div>
			<div @class([
				'grid h-full w-full self-center text-center',
				'hidden' => Auth::user()->id != $user->id,
			])>
				<a href="{{ route('users.edit', $user) }}"
					class="w-1/2 self-center justify-self-center rounded-md border border-transparent bg-teal-600 px-4 py-2 text-center text-sm font-medium text-white hover:bg-teal-700 focus:outline-none focus-visible:ring-2 focus-visible:ring-teal-500 focus-visible:ring-offset-2">
					Editar
				</a>
			</div>
			<img src="{{ asset('samples/koby.jpg') }}" alt="Sample profile image"
				class="h-32 w-32 place-self-end rounded-full object-cover text-right">

		</div>
		<div class="border-t border-gray-200">
			<dl>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Nombre</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->name }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Nombre de Usuario</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->username }}</dd>
				</div>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Dirección de correo electrónico</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->email }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Twitch</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->twitch }}</dd>
				</div>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Twitter</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->twitter }}</dd>
				</div>
				<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Instagram</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">{{ $user->instagram }}</dd>
				</div>
				<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
					<dt class="text-sm font-medium text-teal-500">Sobre mi</dt>
					<dd class="mt-1 text-sm text-teal-900 sm:col-span-2 sm:mt-0">Lorem ipsum dolor sit amet consectetur adipisicing
						elit. Accusantium consectetur sit velit minus! Ipsa nulla nihil, libero similique totam placeat ab vel assumenda,
						iure quae consequatur vero ad ullam commodi.<br><br>

						Quas ipsa fugit atque earum sequi iusto nesciunt dolore ducimus. Necessitatibus nemo id perferendis. Porro tempore
						iste voluptatibus accusamus? Delectus ducimus distinctio ipsa quidem vitae in? Distinctio dignissimos voluptate
						illo!<br><br>

						Accusamus, quia dolorum odit fuga autem reiciendis obcaecati consectetur quae expedita cum iste quam eaque dolore
						cupiditate neque! Cupiditate quasi eaque illo architecto laborum deleniti delectus hic cum ipsa minus?</dd>
				</div>

			</dl>
		</div>
	</div>
@endsection
