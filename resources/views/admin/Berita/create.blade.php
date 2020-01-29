@extends('admin.index')

@push('head-tabel')
    @component('_card.head')
        Form Input Berita
    @endcomponent
@endpush

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Form</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('berita.store')}}" method="POST" enctype="multipart/form-data">
                    @include('admin.berita.form')
                    <div class="card-footer">
                        <button class="btn btn-danger">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

@endsection