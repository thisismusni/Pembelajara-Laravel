@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="{{ isset($data->judul) ? $data->judul : null }}" required>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control select2" name="kategori" style="width: 100%;">
                @foreach(\App\Model\Kategori::all() as $v)
                    <option {{ (isset($data->kategori) ? $data->kategori : null) == $v->kategori ? 'selected="selected"' : null }}
                        >{{$v->kategori}}
                    </option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea type="text" class="form-control" name="deskripsi" >{{isset($data->judul) ? $data->judul : null}}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Isi</label>
                <textarea type="text" class="form-control" name="isi" >{{isset($data->judul)  ? $data->judul : null}}</textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Upload Gambar</label>
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="customFile" name="gambar">
                    <label class="custom-file-label" for="customFile">Upload gambar</label>
                </div>
            </div>
        </div>
    </div>
</div>
