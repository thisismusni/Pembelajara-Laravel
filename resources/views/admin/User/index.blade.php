@extends('admin.index')

@push('head-table')
@component('_card.head')
  User
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
                <a href ="{{ route('user.create') }}" class="btn btn-danger btn-xs">
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
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Level</th>
                  <th>Action</th>
    </tr>
    </thead>
<tbody>


@foreach($data as $no =>$v)
<tr>
    <td>{{ ++$no }}</td>
    <td>{{ $v->name }}</td>
    <td>{{ $v->email }}</td>
    <td>
      @if ($v->level == 1)
        Super Admin
      @elseif ($v->level == 2)
        Admin
      @else
        User
      @endif
    </td>
    <td>
    <form class="" method="POST" action="{{ route('user.destroy', $v->id) }}">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <a href ="{{ route('user.edit', $v->id) }}" class="btn btn-primary btn-xs" title="Edit">
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