@extends('admin.index')

@push('head-table')
@component('_card.head')
  BERITA TERKINI
@endcomponent
@endpush
@section('content')
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dipanegara Computer Club</h3>
              <a>
                <div class="float-right">
                <a href ="{{ route('berita.create') }}" class="btn btn-danger btn-xs">
                <i class="fa fa-plus">Create</i>
              </a>
              </div>

            </div>
            <!-- /.card-header -->
            <tbody>
            <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Gambar</th>
                  <th>Judul</th>
                  <th>Kategori</th>
                  <th>Isi</th>
                  <th>User</th>
                  <th>Action</th>
    </tr>
    </thead>
<tbody>


@foreach($data as $no =>$v)
<tr>
    <td>{{ ++$no }}</td>
    <td>
      <img src="{{ asset('public/storage/gambar/' . $v->gambar)}}" width="50px" height="50px">
    </td>
    <td>{{ $v->judul }}</td>
    <td>{{ $v->kategori }}</td>
    <td>{{ $v->isi }}</td>
    <td>{{ $v->user->name }}</td>
    <td>
    <form class="" method="POST" action="{{ route('berita.destroy', $v->id) }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <a href ="{{ route('berita.edit', $v->id) }}" class="btn btn-primary btn-xs" title="Edit">
    <i class="fa fa-edit"> </i>
    </a>

    <button type ="submit" class="btn btn-danger btn-xs js-hapus" title="Hapus">
      <i class="fa fa-trash"></i>

    </button>
    </form>
    </td>
</tr>
@endforeach
</tbody>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection