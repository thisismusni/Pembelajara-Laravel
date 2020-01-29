<?php

namespace App\Http\Controllers\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){
        $this->tittle="user";
    }

    public function index(){
        $data = User::all();
        return view('admin.user.index', compact('data'));
    }

    public function create()
    {
        return view('admin.'.$this->tittle.'.create');
    }

    public function store(Request $request)
    {
        $model = $request->all();
        $model['user_id'] =1;
        $model['password'] = bcrypt($model['password']);

        $data = User::create($model);
        if ($data) {
            Alert::toast('Berhasil Menyimpan', 'success');
        } else {
            Alert::toast('Gagal Menyimpan', 'danger');
        }
        return redirect('admin/'.$this->tittle);
    }

    public function edit($id)
    {
        $data = User::find($id);
        return view('admin.'.$this->tittle.'.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $model = $request->all();

        $data = User::find($model['id']);

        if($model['password'] == null)
        {
            $model['password'] = $model['password_skr'];
        }
        else
        {
            $model['password'] = bcrypt($model['password']);
        }

        if ($data->update($model)) {
            Alert::toast('Berhasil Diupdate', 'success');
        } else {
            Alert::toast('Gagal Diupdate', 'danger');
        }

        return redirect('admin/'.$this->tittle);
    }

    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();
        if ($data) {
            Alert::toast('Berhasil Dihapus', 'success');
        } else {
            Alert::toast('Gagal Dihapus', 'danger');
        }

        // Alert::Success('User','Berhasil Dihapus', 'danger');
        return redirect('admin/'.$this->tittle);
    }
}