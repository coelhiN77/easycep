<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    // REGISTRAR
    public function register()
    {
        return view('auth/register');
    }

    public function registerSave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
        ], [
            'name.unique' => 'Name address already exists.',
            'email.unique' => 'Email address already exists.',
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                ->withErrors($validator)
                ->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            ]);

        return redirect()->route('login');
    }

    // LOGIN
    public function login()
    {
        Session::regenerateToken();
        return view('auth/login');
    }

    public function loginAuth(Request $request)
    {
        Validator::make($request->all(), [
            'login' => 'required',
            'password' => 'required'
        ])->validate();

        $isEmail = filter_var($request->login, FILTER_VALIDATE_EMAIL);

        $credentials = [
            $isEmail ? 'email' : 'name' => $request->login,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        throw ValidationException::withMessages([
            'login' => trans('auth.failed')
        ]);
    }

    // DESLOGAR
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        return redirect('/');
    }

    // SALVAR CEP
    public function saveCep(Request $request)
    {
        $user = auth()->user();

        $user->cep = $request->input('cep');
        $user->rua = $request->input('rua');
        $user->bairro = $request->input('bairro');
        $user->cidade = $request->input('cidade');
        $user->estado = $request->input('estado');
        $user->ddd = $request->input('ddd');
        $user->ibge = $request->input('ibge');

        $user->save();
        return response()->json(['message' => 'CEP salvo com sucesso'], 200);
    }

    // FOTO DE PERFIL
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $imageName = $user->id . '_' . time() . '.' . $profileImage->getClientOriginalExtension();

            Storage::putFileAs('public/profiles', $profileImage, $imageName);

            $user->profile_image = 'profiles/' . $imageName;
            $user->save();

            session()->put('new_profile_image', $user->profile_image);
        }

    return redirect()->route('dashboard');
    }
}
