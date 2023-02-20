<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\MessageRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Controlador para manejar la lógica de los mensajes.
 */
class MessageController extends Controller
{
    /**
     * Muestra una lista de todos los mensajes.
     *
     * Solo los administradores pueden ver los mensajes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $messages = Message::orderBy('created_at', 'desc')->get();
        return view('pages.messages.index', compact('messages'));
    }

    /**
     * Muestra el formulario para crear un nuevo mensaje.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.messages.create');
    }

    /**
     * Almacena un nuevo mensaje en la base de datos.
     *
     * @param  \Illuminate\Http\MessageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MessageRequest $request)
    {
        $message = new Message();
        if (Auth::check()) $message->name = Auth::user()->username;
        else $message->name = $request->get('name');
        $message->subject = $request->get('subject');
        $message->text = $request->get('message');

        $message->save();
        return redirect()->route('messages.create')->with('success', 'Hemos recibido tu mensaje! Nos pondremos en contacto contigo lo antes posible.');
    }

    /**
     * Muestra el mensaje especificado.
     *
     * Solo los administradores pueden ver los mensajes.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $message->readed = true;
        $message->save();
        return view('pages.messages.show', compact('message'));
    }

    /**
     * Muestra el formulario para eliminar el mensaje especificado.
     *
     * Solo los administradores pueden ver los mensajes.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        if (Auth::user()->rol != 'admin') return redirect()->route('landing');
        $message->delete();
        return redirect()->route('messages.index')->with('success', 'El mensaje ha sido eliminado.');
    }
}
