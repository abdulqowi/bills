@extends('layouts.app', ['title' => 'Data Transaksi'])

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title ?? 'Tambah Penjualan' }}</h1>
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

    <div class="container-fluid mb-3 d-flex justify-content-end">
        <div class="row">
            <div class="col-12">
                <a href="{{ route('sales.index') }}" class="btn btn-sm bg-navy">Kembali <i class="fa fa-arrow-left"></i></a>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-navy">
                <h3 class="card-title">Tambah Penjualan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                <form action="{{ route('sales.store') }}" id="formMultipleAdd" method="post">
                    <?= csrf_field() ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="customer_id">Pelanggan <span class="text-danger">*</span></label>
                                <select name="user_id" class="form-control form-control-sm select2">
                                    <option selected disabled>Pilih Pelanggan</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->user_id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="customer_id">Jumlah Bulan <span class="text-danger">*</span></label>
                                <input type="number" name="quantity" class="form-control form-control-sm select2"> 
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row no-print">
                        <div class="col-12">
                            {{-- <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a> --}}
                            <button type="submit" class="btn btn-sm bg-navy float-right btnSaveAll"><i class="far fa-credit-card"></i>
                                Submit
                            </button>
                            <button type="reset" class="btn btn-sm btn-warning float-right" style="margin-right: 5px;">
                                <i class="fas fa-sync-alt"></i> Cancel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/select2/css/select2.min.css">
@endpush
@push('scripts')
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/sweetalert2/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function(e) {
            $('.select2').select2();

            $('#formMultipleAdd').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnSaveAll').attr('disabled', 'disabled');
                        $('.btnSaveAll').html('<i class="fa fa-spin fa-spinner"></i>');
                    },
                    complete: function() {
                        $('.btnSaveAll').removeAttr('disabled');
                        $('.btnSaveAll').html('Submit');
                    },
                    success: function(response) {
                        if (response.success) {
                            swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                html: `${response.success}`,
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = (
                                        "{{ route('sales.index') }}")
                                }
                            })
                        } else {
                            if (response.error) {
                                swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    html: `${response.error}`,
                                });
                            }
                        }
                    },
                    error: function(data) {
                        $('.btnSaveAll').removeAttr('disabled');
                        $('.btnSaveAll').html('Simpan');
                        swal.fire({
                            icon: 'error',
                            title: 'Gagal disimpan',
                            html: `${error.statusText}`,
                        });
                    }
                });
                return false;
            });

            $('input[name="quantity"]').on("input", function() {
                let price = $('input[name="price"]').val();
                $('#total_banget').val(this.value * price);
                console.log(this.value);
            });

            $(document).on('click', '.btnDeleteForm', function(e) {
                e.preventDefault();
                $(this).parents('tr').remove();
            });
        });

    </script>
@endpush
