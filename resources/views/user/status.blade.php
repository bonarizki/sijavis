@extends('master.user.master')

@section('title','STATUS')

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

<div class="container">
    @forelse ($orders as $order)
        <div class="card mb-2">
            <div class="card-header">
                Booking Code - {{ $order->booking_code }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Detail Booking </h5>
                <p class="card-text">Category : {{ $order->Category->category_name }}</p>
                <p class="card-text">Date Service : {{ $order->date_service }}</p>
                <p class="card-text">Time Service : {{ $order->time_service }}</p>
                <p class="card-text">Technician Name : {{ $order->technician_name == null ? "-" : $order->technician_name }}</p>
                <p class="card-text">Service Price : {{ $order->service_price == null ? "-" : number_format($order->service_price,2,",",'.') }}</p>
                <p class="card-text">Sparepart Price : {{ $order->sparepart_price == null ? "-" : number_format($order->sparepart_price,2,",",'.') }}</p>

                <p class="card-text">Status Booking : {{ ucfirst($order->status) }}</p>
            </div>
        </div>
    @empty
        
    @endforelse
</div>

@endsection

@section('script')
<script>
    $('#home').addClass('active')
</script>
@endsection