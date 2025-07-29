<?php

namespace Martin3r\Platform\Core\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Martin3r\Platform\Core\PlatformCore;

class Register extends Component
{
    public string $name = '';
    public string $lastname = '';
    public string $email = '';
    public string $username = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $validated = $this->validate([
            'name'                  => 'required|string|max:255',
            'lastname'              => 'nullable|string|max:255',
            'email'                 => 'required|email|unique:users,email',
            'username'              => 'nullable|string|unique:users,username',
            'password'              => ['required', 'confirmed', Password::defaults()],
        ]);

        $user = Martin3r\\Platform\Core\Models\User::create([
            'name'      => $validated['name'],
            'lastname'  => $validated['lastname'],
            'email'     => $validated['email'],
            'username'  => $validated['username'],
            'password'  => Hash::make($validated['password']),
        ]);

        Auth::login($user);

        PlatformCore::createPersonalTeamFor($user);

        return redirect()->intended('/dashboard');
    }

    public function render()
    {
        return view('platform::livewire.register')->layout('platform::layouts.guest');
    }
}