@extends('layouts.app')

@section('title', 'Dónde estamos')

@section('content')
	<section class="py-34 overflow-hidden pt-12 lg:relative lg:py-48">
		<div class="m-0 max-w-3xl px-6 md:px-4 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-20 lg:px-8">
			<div>
				<div class="flex items-center space-x-2 text-teal-900">
					<svg width="24" height="24" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
						xmlns="http://www.w3.org/2000/svg">
						<path
							d="M10.5213 2.62368C11.3147 1.75255 12.6853 1.75255 13.4787 2.62368L14.4989 3.74391C14.8998 4.18418 15.4761 4.42288 16.071 4.39508L17.5845 4.32435C18.7614 4.26934 19.7307 5.23857 19.6757 6.41554L19.6049 7.92905C19.5771 8.52388 19.8158 9.10016 20.2561 9.50111L21.3763 10.5213C22.2475 11.3147 22.2475 12.6853 21.3763 13.4787L20.2561 14.4989C19.8158 14.8998 19.5771 15.4761 19.6049 16.071L19.6757 17.5845C19.7307 18.7614 18.7614 19.7307 17.5845 19.6757L16.071 19.6049C15.4761 19.5771 14.8998 19.8158 14.4989 20.2561L13.4787 21.3763C12.6853 22.2475 11.3147 22.2475 10.5213 21.3763L9.50111 20.2561C9.10016 19.8158 8.52388 19.5771 7.92905 19.6049L6.41553 19.6757C5.23857 19.7307 4.26934 18.7614 4.32435 17.5845L4.39508 16.071C4.42288 15.4761 4.18418 14.8998 3.74391 14.4989L2.62368 13.4787C1.75255 12.6853 1.75255 11.3147 2.62368 10.5213L3.74391 9.50111C4.18418 9.10016 4.42288 8.52388 4.39508 7.92905L4.32435 6.41553C4.26934 5.23857 5.23857 4.26934 6.41554 4.32435L7.92905 4.39508C8.52388 4.42288 9.10016 4.18418 9.50111 3.74391L10.5213 2.62368Z"
							stroke="currentColor" stroke-width="1.5" />
						<path d="M9 12L11 14L15 10" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
					</svg>
					<h3 class="font-sans text-xl font-bold">Marina del Nuevo Mundo</h3>
				</div>
				<div class="mt-14">
					<div class="sm:maw-w-xl mt-6">
						<h1 class="text-4xl font-black tracking-tight text-gray-900 sm:text-6xl md:text-7xl"><span
								class="text-teal-400">¿</span>Dónde estamos<span class="texn text-teal-400">?</span></h1>
						<h2 class="mt-6 text-xl font-medium text-gray-600 md:text-lg">
							El Nuevo Mundo es un mundo desconocido para la mayoría de la gente, pero para los piratas y los marines es un
							lugar muy conocido.
						</h2>
					</div>
					<div class="mt-6">
						<div class="inline-flex items-center">
							{{-- describe la localización y cómo llegar --}}

							<div class="ml-4">
								<h3 class="text-lg font-medium text-gray-900">Calle de Alcalá, 28</h3>
								<p class="mt-1 text-base text-gray-600">28001 Madrid</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div
				class="flex w-full items-center space-x-2 py-16 text-teal-900 sm:relative md:py-12 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">

				<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3035.0000000000005!2d-3.703583684770202!3d40.41677597932623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd4228f7b8b8b8b8%3A0x3e7c8e2d1a7b8a7!2sCalle%20de%20Alcal%C3%A1%2C%2028%2C%2028001%20Madrid!5e0!3m2!1ses!2ses!4v1625581000000!5m2!1ses!2ses"
					width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

			</div>
		</div>
	</section>
@endsection
