@extends('master.user.master')

@section('title','SERVICE')

@section('content')
<section class="py-5 text-center container">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light">MEGA ELECTRONIC</h1>
            <h1 class="fw-light">Repair Your Electric Tools</h1>
            <p class="lead text-muted">@auth Hi, Welcome {{ Auth::user()->name }} @endauth you can book for service now</p>
        </div>
    </div>

    
</section>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Book Service</h3>
        </div>
        <div class="card-body">
            <div class="container">
                <form action="{{ url('service') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="category_barang" class="form-label">Category Barang</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Select Category . . .</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="date_service" class="form-label">Date Service</label>
                            <input type="date" class="form-control datepicker @error('date_service') is-invalid @enderror" id="date_service" name="date_service" value="{{ old('date_service') }}">
                            @error('date_service')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3 col">
                            <label for="time_service" class="form-label">Time Service</label>
                            <input type="time" class="form-control @error('time_service') is-invalid @enderror" id="time_service" name="time_service" value="{{ old('time_service') }}">
                            @error('time_service')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" value="{{ old('description') }}"></textarea>
                        @error('description')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('#service').addClass('active')

    $('.datepicker').datepicker({
        format: "yyyy-mm-d"
    });
</script>

@if (session('order_created'))
<script>
    Swal.fire(
        'Good job!',
        "{{ session('order_created') }}",
        'success'
    );
</script>
@endif
@endsection