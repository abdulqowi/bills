@extends('layouts.app', compact('title'))

@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">{{ $title ?? '' }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active"></li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container mb-3 d-flex justify-content-end">
    <div class="row">
        <div class="col-12">
            {{-- <a class="btn btn-sm btn-success" data-toggle="modal" data-target="#importExcel">Impor <i
                class="fa fa-file-import"></i></a>
            <a href="{{ route('members.export') }}" class="btn btn-sm btn-success">Ekspor <i class="fa fa-file-export"></i></a>
            <a href="{{ route('members.printpdf') }}" class="btn btn-sm btn-danger">Print PDF <i class="fa fa-file-pdf"></i></a> --}}
        </div>
    </div>
</div>

<div class="container">
    {{-- @include('components.alerts') --}}
    <div class="card">
        <div class="card-header bg-navy">
            <h3 class="card-title">List Tagihan SPP</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table id="data-table" class="table table-sm table-bordered table-striped">
                <thead class="bg-navy">
                    <tr>
                        <th style="width: 1%">No.</th>
                        <th>Nama Murid</th>
                        <th>Bulan</th>
                        <th>Tagihan</th>
                        <th class="text-center" style="width: 5%"><i class="fas fa-cogs"></i> </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>

<!-- MODAL -->
<div class="modal fade" id="modal-md">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="itemForm" name="itemForm">
                @csrf
                <input type="hidden" name="customer_id" id="customer_id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control form-control-sm mr-2" name="name" id="name" required>
                        <label for="name">Bulan</label>
                        <input type="text" class="form-control form-control-sm mr-2" name="quantity" id="quantity" required>
                        <label for="name">Tagihan</label>
                        <input type="text" class="form-control form-control-sm mr-2" name="price" id="price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-primary" id="saveBtn" value="create">Save</button>
                </div>
            </form>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- MODAL SHOW BOOK -->
{{-- <div class="modal fade show" id="modalProduct" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail Buku</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><img src="" id="imageMember" alt="default.jpg" class="img-fluid" width="50%"></li>
                    <li class="list-group-item">Nama : <i id="nameMember"></i></li>
                    <li class="list-group-item">Jenis Kelamin : <i id="genderMember"></i></li>
                    <li class="list-group-item">Email : <i id="emailMember"></i></li>
                    <li class="list-group-item">No HP : <i id="customer"></i></li>
                    <li class="list-group-item">Alamat : <i id="addressMember"></i></li>
                    <li class="list-group-item">Status : <i id="statusMember"></i></li>
                    <li class="list-group-item">Jumlah Pinjaman : <i id="totalLoan"></i></li>
                    <li class="list-group-item">Jumlah Denda : <i id=""></i></li>
                </ul>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}

@endsection

@push('styles')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets')}}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/toastr/toastr.min.css">
    <script src="{{ asset('assets') }}/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
@endpush
@push('scripts')

    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets')}}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets')}}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets')}}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets')}}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/toastr/toastr.min.js"></script>
    <script>
       $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function () {
            bsCustomFileInput.init();
            let table = $('#data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,

                ajax: "{{ route('customers.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', className: 'dt-body-center'},
                    {data: 'user_id', name: 'customer.name'},
                    {data: 'quantity', name: 'quantity'},
                    {data: 'total_price', name: 'total_price', class: 'dt-body-right'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, className: 'dt-body-center'},
                ],
            });

            $('#createNewItem').click(function () {
                setTimeout(function () {
                    $('#name').focus();
                }, 500);
                $('#saveBtn').removeAttr('disabled');
                $('#saveBtn').html("Simpan");
                $('#item_id').val('');
                $('#itemForm').trigger("reset");
                $('#modal-title').html("Tambah Kategori");
                $('#modal-md').modal('show');
            });

            // $('body').on('click', '#showProduct', function() {
            //     var product_id = $(this).data('id');
            //     $.get("{{ route('sales.index') }}" + '/' + product_id, function(data) {
            //         $('#modalProduct').modal('show');
            //         $('#product_id').val(data.id);
            //         // $('#imageProduct').attr('src', '/`age/' + data.image);
            //         $('#name').html(data.name);
            //         $('#price').html(data.gender);
            //         $('#quantity').html(data.quantity);
            //         $('#customer').html(data.phone_number);
            //     })
            // });

            $('body').on('click', '#editCustomer', function () {
                var customer_id = $(this).data('id');
                $.get("{{ route('sales.index') }}" +'/' + customer_id +'/edit', function (data) {
                    $('#modal-md').modal('show');
                    setTimeout(function () {
                        $('#name').focus();
                    }, 500);
                    $('#modal-title').html("Edit customer");
                    $('#saveBtn').removeAttr('disabled');
                    $('#saveBtn').html("Simpan");
                    $('#customer_id').val(data.id);
                    $('#name').val(data.name);
                })
            });

            $('#saveBtn').click(function (e) {
                e.preventDefault();
                var formData = new FormData($('#itemForm')[0]);
                $.ajax({
                    data: formData,
                    url: "{{ route('sales.update') }}",
                    contentType : false,
                    processData : false,
                    type: "POST",
                    success: function (data) {
                        $('#saveBtn').attr('disabled', 'disabled');
                        $('#saveBtn').html('Simpan ...');
                        $('#itemForm').trigger("reset");
                        $('#modal-md').modal('hide');
                        toastr.success('Data berhasil disimpan  ');
                        table.draw();
                    },
                    error: function (data) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Coba kembali isi data dengan benar!',
                        });
                    }
                });
            });
        });
    </script>

@endpush

