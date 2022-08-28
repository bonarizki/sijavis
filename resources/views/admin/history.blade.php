@extends('master.admin.index')

@section('title', 'Master Category')

@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="row">
                        <div class="col-md-6 d-flex justify-content-start align-items-center">
                            <h6 class="mb-2">List History</h6>
                        </div>
                    </div>
                    <div class="row table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="align-middle">#</th>
                                    <th scope="col" class="align-middle">Booking Code</th>
                                    <th scope="col" class="align-middle">Booking By</th>
                                    <th scope="col" class="align-middle">Category</th>
                                    <th scope="col" class="align-middle">Date Service</th>
                                    <th scope="col" class="align-middle">Time Service</th>
                                    <th scope="col" class="align-middle">Description</th>
                                    <th scope="col" class="align-middle">Teknisi</th>
                                    <th scope="col" class="align-middle">Service Price</th>
                                    <th scope="col" class="align-middle">Sparepart Price</th>
                                    <th scope="col" class="align-middle">Total Price</th>
                                    <th scope="col" class="align-middle">Status</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#history').addClass('active');
            $('#table').DataTable({
                ajax : {
                    url : "{{ url('orders') }}",
                    method : "get",
                    data : {
                        status : "done"
                    }
                },
                destroy : true,
                serverSide : true,
                columns : [{
                    data: "DT_RowIndex",
                    name: "DT_RowIndex"
                },
                {
                    data: "booking_code",
                    name: "booking_code"
                },
                {
                    data: "user.name",
                    name: "user.name"
                },
                {
                    data: "category.category_name",
                    name: "Category.category_name"
                },
                {
                    data: "date_service",
                    name: "date_service"
                },
                {
                    data: "time_service",
                    name: "time_service"
                },
                {
                    data: "description",
                    name: "description"
                },
                {
                    data: "technician_name",
                    name: "technician_name",
                    render : (data) => {
                        return data == null ? "-" : data ;
                    }
                },
                {
                    data: "service_price",
                    name: "service_price",
                    render : (data) => {
                        return data == null ? "-" : data ;
                    }
                },
                {
                    data: "sparepart_price",
                    name: "sparepart_price",
                    render : (data) => {
                        return data == null ? "-" : data ;
                    }
                },
                {
                    data: "id",
                    name: "id",
                    render : (data,meta,row) => {
                        return data == null ? "-" : data ;
                    }
                },
                {
                    data: "status",
                    name: "status"
                }]
            })
        });


        const total = () => {
            let service_price = formatRupiahInteger($('#service_price').val())
            let sparepart_price = formatRupiahInteger($('#sparepart_price').val())
            $('#total_price').val(formatRupiahReturn(`'${parseInt(service_price) + parseInt(sparepart_price)}'`))
        }
    </script>
@endsection