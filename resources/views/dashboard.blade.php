@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-navy">
                        <div class="inner">
                            <h3>
                            </h3>

                            <p>Pengeluaran</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <p>Pemasukan</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-money-bill"></i>
                        </div>
                        <a href="{{ route('sales.index') }}" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- Left col -->
                <section class="col-lg-6 connectedSortable ui-sortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chart Transactions</h3>
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- /.Left col -->

                {{-- <!-- right col (We are only adding the ID to make the widgets sortable)-->
                <section class="col-lg-6 connectedSortable ui-sortable">
                     <!-- Custom tabs (Charts with tabs)-->
                     <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Bar</h3>
                        </div>
                        <div class="card-body">
                            {!! $bar->render() !!}
                        </div>
                    </div>
                    <!-- /.card -->

                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Chart</h3>
                        </div>
                        <div class="card-body">
                            {!! $pie->render() !!}
                        </div>
                    </div>
                    <!-- /.card -->
                </section>
                <!-- right col --> --}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
