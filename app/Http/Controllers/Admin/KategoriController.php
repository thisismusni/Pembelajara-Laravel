<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Model\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function __construct(){
        $this->tittle="kategori";
    }

    public function index(){
        $data = Kategori::all();
        return view('admin.kategori.index', compact('data'));
    }

    public function create()
    {
        return view('admin.'.$this->tittle.'.create');
    }

    public function store(Request $request)
    {
        $model = $request->all();
        $data = Kategori::create($model);
        if ($data) {
            Alert::toast('Berhasil Menyimpan', 'success');
        } else {
            Alert::toast('Gagal Menyimpan', 'danger');
        }
        return redirect('admin/'.$this->tittle);
    }

    public function edit($id)
    {
        $data = Kategori::find($id);
        return view('admin.'.$this->tittle.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model = $request->all();

        $data = Kategori::find($model['id']);

        if ($data->update($model)) {
            Alert::toast('Berhasil Diupdate', 'success');
        } else {
            Alert::toast('Gagal Diupdate', 'danger');
        }

        return redirect('admin/'.$this->tittle);
    }

    public function destroy($id)
    {
        $data = Kategori::find($id);
        $data->delete();
        if ($data) {
            Alert::toast('Berhasil Dihapus', 'success');
        } else {
            Alert::toast('Gagal Dihapus', 'danger');
        }
        return redirect('admin/'.$this->tittle);
    }
}