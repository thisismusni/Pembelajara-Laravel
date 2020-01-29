@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Kategori</label>
                <input type="text" class="form-control" name="kategori" value="{{ isset($data->kategori) ? $data->kategori : null }}" required>

            </div>
        </div>
    </div>
    <!-- /.row -->
</div>
