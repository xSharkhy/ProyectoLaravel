@extends('layouts.app')

@section('title', 'Marine HQ')

@section('content')
	<section class="py-34 overflow-hidden pt-12 lg:relative lg:py-48">
		@if (session('success'))
			<div class="my-2 rounded-lg border border-green-700 bg-green-50 p-4 text-xs text-green-700">
				{{ session('success') }}
			</div>
		@endif
		<div class="m-0 max-w-3xl px-6 md:max-w-3xl md:px-4 lg:grid lg:max-w-7xl lg:grid-cols-2 lg:gap-20 lg:px-8">
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
						<h1 class="text-4xl font-black tracking-tight text-gray-900 sm:text-6xl md:text-7xl">Aniram al ne etatsila<span
								class="text-teal-400">.</span></h1>
						<h2 class="mt-6 text-xl font-medium text-gray-600 md:text-lg">Únete a la cuna de la Justicia Mayor del Nuevo Mundo
							y convertirte en un verdadero guerrero valiente de los mares.</h2>
					</div>
					<div class="mt-6">
						<div class="inline-flex items-center">
							<img src="https://i.pinimg.com/736x/fc/b2/01/fcb20184f88cc57d534e7043d48825ee.jpg" alt="Captain Koby"
								class="mr-2 inline-block h-14 w-14 rounded-xl border-2 border-teal-800 object-cover md:mr-3">
							<div>
								<p class="text-lg font-black tracking-tight text-gray-800 sm:pl-2.5 md:text-base">"Desde aquel incidente en Rock
									Port, todo el mundo me trata como un héroe, y sólo soy un Marine más."</p>
								<p class="text-base font-bold text-gray-500 sm:pl-2.5 md:text-sm">Capitán Koby</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="sm:mx-auto sm:max-w-3xl sm:px-6">
			<div class="py-16 sm:relative md:py-12 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
				<div class="hidden sm:block">
					<div class="absolute inset-y-0 left-1/2 w-screen rounded-l-3xl bg-gray-50 lg:left-80 lg:right-0 lg:w-full"></div>
					<svg class="absolute top-48 right-1/2 -mr-3 lg:left-0 lg:m-0" width="404" height="392" fill="none"
						viewBox="0 0 404 392">
						<defs>
							<pattern id="anchor-pattern" x="0" y="0" width="40" height="40"
								patternUnits="userSpaceOnUse">
								<path
									d="M14 16H9v-2h5V9.87a4 4 0 1 1 2 0V14h5v2h-5v15.95A10 10 0 0 0 23.66 27l-3.46-2 8.2-2.2-2.9 5a12 12 0 0 1-21 0l-2.89-5 8.2 2.2-3.47 2A10 10 0 0 0 14 31.95V16zm40 40h-5v-2h5v-4.13a4 4 0 1 1 2 0V54h5v2h-5v15.95A10 10 0 0 0 63.66 67l-3.47-2 8.2-2.2-2.88 5a12 12 0 0 1-21.02 0l-2.88-5 8.2 2.2-3.47 2A10 10 0 0 0 54 71.95V56zm-39 6a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm40-40a2 2 0 1 1 0-4 2 2 0 0 1 0 4zM15 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm40 40a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"
									fill="#5eead4" fill-opacity="0.53"></path>
							</pattern>
						</defs>
						<rect width="404" height="392" fill="url(#anchor-pattern)"></rect>
					</svg>
				</div>
				<div
					class="-mr:20 relative pl-4 sm:mx-auto sm:-mr-32 sm:max-w-3xl sm:px-0 md:-mr-16 lg:flex lg:h-full lg:max-w-none lg:items-center xl:pl-12">
					<img class="z-20 w-auto rounded-l-3xl"
						src="https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/51158316-fd7e-48ca-b5fe-8542e9dfe357/ddhrlj0-96ba3f72-0f63-426a-856b-2bf93e6b3c8a.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzUxMTU4MzE2LWZkN2UtNDhjYS1iNWZlLTg1NDJlOWRmZTM1N1wvZGRocmxqMC05NmJhM2Y3Mi0wZjYzLTQyNmEtODU2Yi0yYmY5M2U2YjNjOGEucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Sbv20GVhgZxabK8KRMNGUzgIlHSEqaDsQp4uNRhlADU"
						alt="Marineford HQ">
				</div>
			</div>
		</div>
	</section>
@endsection
