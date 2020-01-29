<script src="{{ asset('public/vendor/sweetalert/sweetalert.all.js')  }}"></script>
@if (Session::has('alert.config'))
@if(config('sweetalert.animation.enable'))
    <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
@endif
    <script>
        Swal.fire({!! Session::pull('alert.config') !!});
    </script>
@endif