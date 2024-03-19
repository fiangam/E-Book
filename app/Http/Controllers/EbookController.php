<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookEbookRequests;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Ebook;
use App\Models\Kategori;

class EbookController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index(): Response
    {
        $ebooks = Ebook::select(
            "ebooks.id",
            "kategoris.name as kategori_name",
            "ebooks.judul",
            "ebooks.tanggal_terbit",
            "ebooks.file_ebook"
            
        )
        ->leftJoin("kategoris", "kategoris.id", "=", "ebooks.id_kategori")
        ->get();

        return response(view('manajemen_buku.book-management', ['ebooks' => $ebooks]));
    }

        public function create(): Response
        {
            $kategoris = Kategori::orderBy('name', 'asc')->get()->pluck('name', 'id');

            return response(view('manajemen_buku.add-book',['kategoris' => $kategoris]));
        }

        public function book(BookEbookRequests $request): RedirectResponse
        {
                $params = $request->validated();
                if ($ebooks = Ebook::create($params)) {
        
                    return redirect(route('book-management'))->with('success', 'Added!');
                
            }
        }

    public function destroy(string $id): RedirectResponse
    {
        $ebooks = Ebook::findOrFail($id);

        if ($ebooks->delete()) {
            return redirect(route('book-management'))->with('success', 'Deleted!');
        }

        return redirect(route('book-management'))->with('error', 'Sorry, unable to delete this!');
    }

}