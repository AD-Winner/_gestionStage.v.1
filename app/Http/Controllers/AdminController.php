<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function __construct()
    {
        
        $this->middleware('auth');

        //$this->middleware(['profil:administrateur']);
    }

    public function dashboard(){
        return view ('admin.dashboard');
    }
    public function home(){
        return view ('admin.home');
    }


    public function index(){
        return view('layouts.admin');
    }
    public function login(){
        return view('pages.login');
    }
    public function profil(){
        return view('pages.profil');
    }
    public function contact(){
        return view('pages.contact');
    }
    public function stage(){
        return view('pages.Stage');
    }
    public function depot(){
        return view('pages.depot');
    }
    public function homeEtudiant(){
        return view('pages.home');
    }
    public function homeAdmin(){
        return view('pages.accueil');
    }
    public function telechargement(){
        return view('pages.telechargement');
    }
}
