<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function profil()
    {
        return view('profil');
    }

    public function pemerintahan()
    {
        return view('pemerintahan');
    }

    public function berita()
    {
        return view('berita');
    }

    public function layanan()
    {
        return view('layanan');
    }

    public function data()
    {
        return view('data');
    }

    public function darurat()
    {
        return view('darurat');
    }

    public function kesehatan()
    {
        return view('kesehatan');
    }

    public function galeri()
    {
        return view('galeri');
    }

    public function kontak()
    {
        return view('kontak');
    }
}
