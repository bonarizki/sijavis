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
                            <h6 class="mb-2">List Booking Service</h6>
                        </div>
                    </div>
                    <div class="row table-responsive">
                        <table class="table table-bordered table-hover table-sm" id="table" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col" rowspan="2" class="align-middle">#</th>
                                    <th scope="col" rowspan="2" class="align-middle">Booking Code</th>
                                    <th scope="col" rowspan="2" class="align-middle">Booking By</th>
                                    <th scope="col" rowspan="2" class="align-middle">Category</th>
                                    <th scope="col" rowspan="2" class="align-middle">Date Service</th>
                                    <th scope="col" rowspan="2" class="align-middle">Time Service</th>
                                    <th scope="col" rowspan="2" class="align-middle">Description</th>
                                    <th scope="col" rowspan="2" class="align-middle">Teknisi</th>
                                    <th scope="col" rowspan="2" class="align-middle">Service Price</th>
                                    <th scope="col" rowspan="2" class="align-middle">Sparepart Price</th>
                                    <th scope="col" rowspan="2" class="align-middle">Total Price</th>
                                    <th scope="col" rowspan="2" class="align-middle">Status</th>
                                    <th scope="col" colspan="2"><center>Action<center></th>
                                </tr>
                                <tr>
                                    <th scope="col"><center>Edit<center></th>
                                    <th scope="col"><center>Delete<center></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form Start -->
                    <form id="form">
                        <div class="container-fluid pt-4 px-4">
                            <div class="row g-4">
                                <div class="col-sm-12 col-xl-12">
                                    <div class="bg-light rounded h-100 p-4">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="booking_code" name="booking_code"
                                                placeholder="Category Name" readonly>
                                            <label for="booking_code">Booking Code</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="booking_by" name="booking_by"
                                                placeholder="Category Name" readonly>
                                            <label for="booking_by">Booking by</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="category" name="category"
                                                placeholder="Category Name" readonly>
                                            <label for="category">category</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="category_id" name="category_id"
                                                placeholder="Category Name" readonly>
                                            <label for="category">category</label>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="date_service" name="date_service"
                                                        placeholder="Date Service" readonly>
                                                    <label for="date_service">Date Service</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="time_service" name="time_service"
                                                        placeholder="Time Service" readonly>
                                                    <label for="date_service">Time Service</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea type="text" class="form-control" id="description" name="description"
                                                placeholder="description" readonly>
                                            </textarea>
                                            <label for="description">Description</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="technician_name" name="technician_name"
                                                placeholder="Technician Name">
                                            <label for="category">Technician Name</label>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="service_price" name="service_price"
                                                        placeholder="Service Price" onkeyup="formatRupiah(this),total()">
                                                    <label for="service_price">Service Price</label>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" id="sparepart_price" name="sparepart_price"
                                                        placeholder="Sparepart Price" onkeyup="formatRupiah(this),total()">
                                                    <label for="sparepart_price">Sparepart Price</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="total_price" name="total_price"
                                                placeholder="Total Price" readonly>
                                            <label for="total_price">Total Price</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <select name="status" id="status" class="form-control">
                                                <option value="booking">Booking</option>
                                                <option value="done">done</option>
                                            </select>
                                            <label for="status">Status</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Form End -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="submit">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#order').addClass('active');
            $('#table').DataTable({
                ajax : {
                    url : "{{ url('orders') }}",
                    method : "get",
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
                },
                {
                    data:"id",
                    name:"id",
                    render : (data,meta,row) => {
                        if (row.status != "done") {
                            return `<center>
                                        <span class='bi bi-pencil-square' onclick="showModal('edit','${data}')"></span>
                                    </center>`;
                        }

                        return `<center>
                                        <span class='bi bi-lock'></span>
                                    </center>`;
                    }
                },
                {
                    data:"id",
                    name:"id",
                    render : (data,meta,row) => {
                        if (row.status != "done") {
                            return `<center>
                                    <span class='bi bi-trash' onclick="alertDelete('${data}')"></span>
                                </center>`;
                        }

                        return `<center>
                                        <span class='bi bi-lock'></span>
                                    </center>`;
                       
                    }
                }]
            })
        });

        const showModal = (type,id = null) => {
            $('.is-invalid').removeClass('is-invalid')
            $('#form')[0].reset()
            if (type == 'add') {
                $('.modal-title').text('Form Add Booking');
                $('#modal').modal('show');
                $('#submit').attr('onclick','add()')
            }else{
                $('.modal-title').text('Form Edit Booking');
                edit(id)
            }
        }

        const add = () => {
            let data = $('#form').serialize();
            $.ajax({
                type : "POST",
                url : "{{ url('orders') }}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : data,
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                    $(`#table`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                },
                error : (res) => {
                    errorHandle(res)
                },
            })
        }

        const edit = (id) => {
            $.ajax({
                type : "get",
                url : `{{ url('orders') }}/${id}/edit`,
                success : (res) => {
                    let data = res.data
                    $('#booking_code').val(data.booking_code);
                    $('#booking_by').val(data.user.name);
                    $('#category').val(data.category.category_name);
                    $('#date_service').val(data.date_service);
                    $('#time_service').val(data.time_service);
                    $('#category_id').val(data.category_id);
                    $('#status').val(data.status);
                    $('#description').text(data.description);
                    data.technician_name != null ? $('#technician_name').val(data.technician_name) : ""
                    data.sparepart_price != null ? $('#sparepart_price').val(formatRupiahReturn(data.sparepart_price)) : ""
                    data.service_price != null ? $('#service_price').val(formatRupiahReturn(data.service_price)) : ""
                    data.service_price != null ? total() : ""
                    // $('#category_code').val(res.data.category_code);
                },
                complete : () => {
                    $('#modal').modal('show');
                    $('#submit').attr('onclick',`update('${id}')`);
                }
            })
        }

        const update = (id) => {
            let data = $('#form').serialize();
            $.ajax({
                type : "PATCH",
                url : "{{ url('orders') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data : data,
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                    $(`#table`).DataTable().ajax.reload();
                    $('#modal').modal('hide');
                    $('#form')[0].reset();
                },
                error : (res) => {
                    errorHandle(res)
                },
            })
        }

        const alertDelete = (id) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                if (result.isConfirmed) {
                    deleteProcess(id)
                }
            })
        }

        const deleteProcess = (id) => {
            $.ajax({
                type : "delete",
                url : "{{ url('orders') }}/" + id,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success : (res) => {
                    sweetSuccess(res.status,res.message)
                },
                error : (res) => {
                    errorHandle(res)
                },
                complete : () => {
                    $(`#table`).DataTable().ajax.reload();
                    $('#form')[0].reset()
                }
            })
        }

        const total = () => {
            let service_price = formatRupiahInteger($('#service_price').val())
            let sparepart_price = formatRupiahInteger($('#sparepart_price').val())
            $('#total_price').val(formatRupiahReturn(`'${parseInt(service_price) + parseInt(sparepart_price)}'`))
        }
    </script>
@endsection