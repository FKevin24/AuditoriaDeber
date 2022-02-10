<?php

namespace App\Http\Controllers;

use App\Rules\Caracteres;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CambioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('changepass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validar
        $data = $request->validate([
            'password' => 'required',new Caracteres,
            'newpassword' => 'required|min:8',new Caracteres,
            'repassword' => 'required|same:newpassword',
        ],[
            'password.required'=>'La contraseña antigua es obligatoria',
            'newpassword.required'=>'La nueva contraseña es obligatoria',
            'repassword.same'=>'La confirmación de contraseña no coincide',
            'newpassword.min'=>'La contraseña debe tener minimo 8 caracteres',
        ]
        );

        if (Hash::check($request->password, Auth::user()->password)) {
            $user = new User;
            $user->where('email','=',Auth::user()->email)
                ->update(['password'=>Hash::make($data['newpassword'])]);
                Auth::logout();

                return redirect('/')->with('message', 'Su contraseña ha sido cambiada con éxito');
        }
        
        else {
            return redirect('change')->with('message', 'La nueva contraseña no coincide con la actual');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
