<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookEbookRequests;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Validator;

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

        public function uploadAndCreateBook(Request $request)
        {
        $validator = Validator::make($request->all(), [
            'file' => 'required|file|mimes:pdf,epub',
            // Sesuaikan validasi buku di sini sesuai kebutuhan
            'judul' => 'required|string|max:255',
            'tanggal_terbit' => 'required|date',
            'id_kategori' => 'required|exists:kategoris,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $file = $request->file('file');
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $file->getClientOriginalName());

        $ebookData = [
            'judul' => $request->input('judul'),
            'tanggal_terbit' => $request->input('tanggal_terbit'),
            'id_kategori' => $request->input('id_kategori'),
            'file_ebook' => $file->getClientOriginalName(),
        ];

        if (Ebook::create($ebookData)) {
            return redirect(route('ebooks.index'))->with('success', 'Ebook uploaded and created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to upload and create ebook.');
        }
    }


    public function destroy(string $id): RedirectResponse
    {
        $ebooks = Ebook::findOrFail($id);

        if ($ebooks->delete()) {
            return redirect(route('ebooks.index'))->with('success', 'Your Record Has Been Deleted!');
        }

        return redirect(route('ebooks.index'))->with('error', 'Sorry, unable to delete this!');
    }

}