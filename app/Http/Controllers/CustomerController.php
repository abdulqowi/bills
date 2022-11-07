<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderDetail;
use Yajra\DataTables\Facades\DataTables;

class CustomerController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $Customer = OrderDetail::where('user_id','=',auth()->user()->id)->get();
            return DataTables::of($Customer)
                ->addIndexColumn()
                ->addColumn(
                    'total_price',
                    function ($row) {
                        return $row->quantity * $row->price;
                    }
                )
                ->editColumn('user_id', function (OrderDetail $orderDetail) {
                    return $orderDetail->customer->name;
                }
                )
                ->addColumn('action', function ($row) {
                    $btn =
                        '<div class="btn-group">
                            <a class="badge bg-navy dropdown-toggle dropdown-icon" data-toggle="dropdown">
                            </a>
                            <div class="dropdown-menu">
                                <form action=" ' . route('sales.destroy', $row->id) . '" method="POST">
                                    <button type="submit" class="dropdown-item" onclick="return confirm(\'Apakah yakin ingin membayar ini?\')">Bayar</button>
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                </form>
                            </div>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['checkbox', 'action'])
                ->make(true);
        }
        return view('customers.index', [
            'title' => 'Pelanggan',
        ]);
    }
}
