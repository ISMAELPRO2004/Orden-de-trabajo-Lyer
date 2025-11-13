<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Inertia\Response;

class AuthenticatedSessionController extends Controller
{
    /**
     * Mostrar la vista de login (Inertia/Vue)
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Login', [
            'canResetPassword' => Route::has('password.request'),
            'status' => session('status'),
        ]);
    }

    /**
     * Procesar el inicio de sesión
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar datos del formulario
        $request->validate([
            'usuario' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        // Intentar autenticación usando la tabla "usuario"
        if (!Auth::attempt(
            ['usuario' => $request->usuario, 'password' => $request->password],
            $request->boolean('remember')
        )) {
            return back()->withErrors([
                'usuario' => 'Las credenciales no coinciden con nuestros registros.',
            ])->onlyInput('usuario');
        }

        // Regenerar sesión si el login es correcto
        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Cerrar sesión
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
