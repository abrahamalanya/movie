<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener los parámetros de búsqueda
        $name = request()->query('search_name');
        $email = request()->query('search_email');

        // Consulta base de User
        $query = User::query();

        // Filtrar por nombre
        if ($name) {
            $query->where('name', 'like', "%{$name}%");
        }
        // Filtrar por usuario
        if ($email) {
            $query->where('email', 'like', "%{$email}%");
        }

        // Obtener los resultados con paginación
        $users = $query->orderByDesc('id')->paginate(20);

        return view('backoffice.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backoffice.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // Guarda la imagen en la carpeta 'users'
        if (request()->hasFile('avatar')) {
            $path = request()->file('avatar')->store('users', 'public');
        }

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'avatar' => $path ?? '',
            'phone' => request('phone'),
        ]);

        // Asignar el rol de usuario
        $user->assignRole('user');

        return redirect()->route('user.index')->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('backoffice.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        // Guarda la imagen en la carpeta 'users'
        if (request()->hasFile('avatar')) {
            // Eliminar avatar anterior
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            // Subir el nuevo avatar
            $path = request()->file('avatar')->store('users', 'public');
            $user->avatar = $path;
        }

        if (request()->filled('password')) {
            $user->password = Hash::make(request('password'));
        }

        $user->update([
            'name' => request('name'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->avatar != '') {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        return redirect()->route('user.index')->with('success', 'User delete successfully.');
    }
}
