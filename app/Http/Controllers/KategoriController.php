<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Kategori;
use Illuminate\Support\Facades\Redirect;

class KategoriController extends Controller
{
    public function index(): Response
    {
        $kategoris = Kategori::all();

        return response(view('manajemen_kategori.kategori-management', ['kategoris' => $kategoris]));
    }

    public function create(): Response
    {
        return response(view('manajemen_kategori.input-kategori'));
    }

    public function kategori(Request $request): RedirectResponse    
    {
        $validatedData = $request->validate([
            'name' => 'required',
        ]);

        Kategori::create($validatedData);

        return redirect(route('kategori-management'))->with('success', 'Kategori Berhasil Ditambahkan!');
    }

    public function edit(string $id): Response
    {
        $kategori = Kategori::findOrFail($id);

        return response(view('manajemen_kategori.edit-kategori', ['kategori' => $kategori]));
    }

    public function destroy(string $id): RedirectResponse
    {
        $kategoris = Kategori::findOrFail($id);

        if ($kategoris->delete()) {
            return redirect(route('kategori-management'))->with('success', 'Deleted!');
        }

        return redirect(route('kategori-management'))->with('error', 'Sorry, unable to delete this!');
    }

}
