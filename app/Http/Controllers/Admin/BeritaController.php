<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Berita;
use DB;
use Alert;
use Str;
use Storage;

class BeritaController extends Controller
{
    public function __construct(){
        $this->tittle="berita";
    }

    public function index()
    {
        // Alert::alert('Title','Message','Type');
        // Alert::toast('Data Berhasil Dihapus','success');
        $data = Berita::all();
        return view('admin.'.$this->tittle.'.index', compact('data'));
        // dump($data);
        // $data = DB::table('beritas')->get();
    }

    public function create()
    {
        return view('admin.'.$this->tittle.'.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $request->all();
        $model['user_id'] = auth()->user()->id;

        $file= isset($model['gambar']) ? $model['gambar']:null;
        $model['gambar'] = uploadFile($file, 'public/gambar', null);

        $data = Berita::create($model);
        if($data)
            Alert::toast('Data Berhasil Disimpan','success');
        else
            Alert::toast('Data Gagal Dihapus','danger');
        return redirect('admin/'.$this->tittle.'');
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
        $data = Berita::find($id);

        return view('admin.'.$this->tittle.'.edit',\compact('data'));
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
        // dd($request->id);


        $model = $request->all();
        $data = Berita::find($model['id']);
        $model['user_id'] = auth()->user()->id;
        $file= isset($model['gambar']) ? $model['gambar']:null;
        $model['gambar'] = uploadFile($file, 'public/gambar', $model['gambar_lama']);
        $data->update($model);
        if($data->update($model))
            Alert::toast('Data Berhasil DiUpdate','success');
        else
            Alert::toast('Data Gagal DiUpdate','danger');
        return redirect('admin/'.$this->tittle);
        route:post('update-data','Admin/BeritaController@update1')->name(update.berita);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Berita::find($id);
        $data->delete();
        if ($data) {
            Storage::delete('public/gambar'.'/'.$data->gambar);
            Alert::Success('Berhasil Dihapus', 'success');
        } else {
            Alert::toast('Gagal Dihapus', 'danger');
        }
        return redirect('admin/'.$this->tittle);
    }


}
