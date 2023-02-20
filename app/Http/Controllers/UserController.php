<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Hash;

/**
 * Controlador para manejar las acciones relacionadas con los usuarios en la aplicación.
 */
class UserController extends Controller
{
    /**
     * Muestra una lista de todos los usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact('users'));
    }

    /**
     * Muestra el usuario especificado.
     *
     * @param \App\Models\User $user El usuario que se va a mostrar.
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('pages.users.show', compact('user'));
    }

    /**
     * Muestra el formulario de edición de usuario.
     *
     * Si el usuario no está autenticado o no es el usuario que se va a editar, redirige a la página de inicio.
     *
     * @param \App\Models\User $user El usuario que se va a editar.
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->route('users.index');
        return view('pages.users.edit', compact('user'));
    }

    /**
     * Procesa el formulario de edición de usuario y actualiza los datos del usuario en la base de datos.
     *
     * @param \App\Http\Requests\RegisterRequest $request La solicitud HTTP que contiene los datos de registro del usuario.
     * @param \App\Models\User $user El usuario que se va a editar.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RegisterRequest $request, User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->route('users.index');

        if ($request->get('password') != null) $user->password = Hash::make($request->password);
        if ($request->get('birthday') != null) $user->birthday = $request->get('birthday');

        $user->twitch = $request->get('twitch');
        $user->twitch = $request->get('twitter');
        $user->twitch = $request->get('instagram');

        $user->save();

        return redirect()->route('users.show', $user->id)->with('success', '¡Has actualizado tu perfil!');
    }

    /**
     * Elimina el usuario especificado de la base de datos.
     *
     * @param \App\Models\User $user El usuario que se va a eliminar.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        if (Auth::user()->id != $user->id) return redirect()->route('users.index');
        $user->delete();
        Auth::logout();
        return redirect()->route('landing')->with('success', '¡Sentimos que te vayas!');
    }
}
