<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        if ($request->username === 'marko' && $request->password === '12345') {
            //uspješna prijava, preusmjeri na car.index
            return redirect()->route('car.index');
        } else {
            //neuspješna prijava, preusmjerite nazad na obrazac za prijavu s greskom
            return redirect()->route('admin.index')->with('error', 'Pogrešno korisničko ime ili lozinka.');
        }
    }
}
