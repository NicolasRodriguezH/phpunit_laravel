<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function upload(Request $request) {
        $request->validate([
            'photo' => 'required'
        ]);
        // $request->file('photo'); puede regresar null y generar el ‘null pointer exception’… lo solucioné con el nuevo feature de php 8 ‘null safe operator’
        $file = $request->file('photo');
        $file?->store('profiles');
        //$request->file('photo')->store('profiles');

        return redirect('profile');
    }
}
