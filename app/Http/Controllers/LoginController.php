<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Controlador para manejar las acciones relacionadas con la autenticación de usuarios en la aplicación.
 */
class LoginController extends Controller
{
    /**
     * Muestra el formulario de registro de usuario.
     *
     * Si el usuario ya está autenticado, redirige a la página de inicio.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function registerForm()
    {
        if (!Auth::check()) return view('pages.auth.register');
        return redirect()->route('landing');
    }

    /**
     * Procesa el formulario de registro de usuario y crea un nuevo usuario en la base de datos.
     *
     * @param \App\Http\Requests\RegisterRequest $request La solicitud HTTP que contiene los datos de registro del usuario.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->birthday = $request->get('birthday');
        $user->instagram = $request->get('instagram');
        $user->twitch = $request->get('twitch');
        $user->twitter = $request->get('twitter');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('landing');
    }

    /**
     * Muestra el formulario de inicio de sesión de usuario.
     *
     * Si el usuario ya está autenticado, redirige a la página de inicio.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function loginForm()
    {
        if (!Auth::check()) return view('pages.auth.login');
        elseif (Auth::viaRemember()) return redirect()->route('landing', ['remember' => true]);
        return redirect()->route('landing');
    }

    /**
     * Procesa el formulario de inicio de sesión de usuario y autentica al usuario en la aplicación.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP que contiene las credenciales de inicio de sesión del usuario.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Contracts\View\View
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('landing');
        } else {
            $error = 'Usuario o contraseña incorrectos';
            return view('pages.auth.login', compact('error'));
        }
    }

    /**
     * Cierra la sesión de usuario en la aplicación.
     *
     * @param \Illuminate\Http\Request $request La solicitud HTTP que contiene la sesión actual del usuario.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('landing');
    }
}
