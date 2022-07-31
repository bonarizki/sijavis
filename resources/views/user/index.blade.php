@extends('master.user.master')

@section('title','HOME')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">MEGA ELECTRONIC</h1>
            <h1 class="fw-light">Repair Your Electric Tools</h1>
            <p class="lead text-muted">@auth Hi,Welcome {{ Auth::user()->name }} @endauth you can book for service now</p>
        </div>
    </div>
</section>


@endsection

@section('script')
<script>
    $('#home').addClass('active')
</script>
@endsection