<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Komentar;

class KomentarController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'isi' => 'required',
        ]);

        Komentar::create($request->only('nama', 'isi'));

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $komentars = Komentar::findOrFail($id);
        $komentars->delete();
        return redirect('/')->with('success', 'Komentar berhasil dihapus!');
    }//
}
