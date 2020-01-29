@csrf
<div class="card-body">
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="name" value="{{ isset($data->name) ? $data->name : null }}" required>

            </div>
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="{{ isset($data->email) ? $data->email : null }}" required>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group">
                <label>Password</label>
                <input type="hidden" name="password_skr" value="{{ isset($data->password) ? $data->password : null }}" id="" >
                <input type="password" class="form-control" name="password" value="">
            </div>
        </div>

        </div>
        <div class="col-md-8">
            <div class="form-group">
                <label>Level</label>
                <select class="form-control select2" style="width:100%" name="level" id="">
                <option value="1" {{ (isset($data->level) ? $data->level : null) == 1 ? 'selected="selected"' : null }}>
                Super Admin</option>
                <option value="2" {{ (isset($data->level) ? $data->level : null) == 2 ? 'selected="selected"' : null }}>
                Admin</option>
                <option value="3" {{ (isset($data->level) ? $data->level : null) == 3 ? 'selected="selected"' : null }}>
                User</option>
                </select>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>
