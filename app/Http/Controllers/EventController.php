<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para manejar la lógica de los eventos.
 */
class EventController extends Controller
{
    /**
     * Muestra una lista de todos los eventos.
     *
     * Si el usuario es un administrador, muestra todos los eventos. Si no, muestra solo los eventos que están marcados como visibles.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check() && Auth::user()->rol == 'admin') $events = Event::all();
        else $events = Event::where('visible', 1)->get();
        return view('pages.events.index', compact('events'));
    }

    /**
     * Muestra el formulario para crear un nuevo evento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        return view('pages.events.create');
    }

    /**
     * Almacena un nuevo evento en la base de datos.
     *
     * Solo los administradores pueden crear eventos.
     *
     * @param  \Illuminate\Http\EventRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $request)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->location = $request->location;
        $event->visible = $request->visible;
        $event->tags = $request->tags;
        $event->save();

        return redirect()->route('events.create')->with('success', 'Evento creado correctamente');
    }

    /**
     * Muestra los detalles de un evento específico.
     *
     * Solo los administradores pueden ver todos los eventos. Los usuarios regulares solo pueden ver eventos marcados como visibles.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if (Auth::check()) {
            if (Auth::user()->rol == 'admin') return view('pages.events.show', compact('event'));
            else if ($event->visible) return view('pages.events.show', compact('event'));
        }

        return redirect()->back();
    }

    /**
     * Muestra el formulario para editar un evento.
     *
     * Solo los administradores pueden editar eventos.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        return view('pages.events.edit', compact('event'));
    }

    /**
     * Actualiza un evento en la base de datos.
     *
     * Solo los administradores pueden editar eventos.
     *
     * @param  \Illuminate\Http\EventRequest  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->hour = $request->hour;
        $event->location = $request->location;
        $event->visible = $request->visible;
        $event->tags = $request->tags;
        $event->save();

        return redirect()->route('events.show', $event);
    }

    /**
     * Elimina un evento de la base de datos.
     *
     * Solo los administradores pueden eliminar eventos.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $event->users()->detach();
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente');
    }

    /**
     * Permite a un usuario unirse o abandonar un evento.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function toggleJoin(Event $event)
    {
        if (!Auth::check()) return redirect()->route('login');
        if ($event->visible == 0 && Auth::user()->rol != 'admin') return redirect()->route('landing');

        $user = Auth::user();
        $event->users()->toggle($user);
        $message = $event->users->contains($user) ? 'Te has unido al evento correctamente' : 'Has abandonado el evento correctamente';
        return redirect()->route('events.index')->with('success', $message);
    }
}
