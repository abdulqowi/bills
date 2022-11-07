<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Invoice;
use App\Http\Requests\OrderRequest;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\Party;
use Yajra\DataTables\Facades\DataTables;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use App\Models\{Supplier, OrderDetail, Order, Product, Customer};
use FontLib\Table\Type\name;

class OrderSaleController extends Controller
{
    public function sales()
    {
        if (request()->ajax()) {
            $orderDetail = OrderDetail::latest()->get();
            return DataTables::of($orderDetail)
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
                                <a class="dropdown-item" href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-primary btn-sm" id="edit$orderDetail">Edit</a>
                                <form action=" ' . route('sales.destroy', $row->id) . '" method="POST">
                                    <button type="submit" class="dropdown-item" onclick="return confirm(\'Apakah yakin ingin menghapus ini?\')">Hapus</button>
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                </form>
                            </div>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('orders.sales.index', [
            'title' => 'Tagihan',
        ]);
    }

    public function create(){

        return view('orders.sales.create', [
            'customers' => Customer::get()
        ]);
    }

    public function storeSales()
    {
        OrderDetail::updateOrCreate(
            [
                'user_id' => request('user_id'),
                'quantity' => request('quantity')
            ],
        );
        return view('orders.sales.index');
    }

    public function updateSales(OrderDetail $orderDetail)
    {
        $orderDetail->update([
            ['id' => request('customer_id')],
            [
                'user_id' => request('user_id'),
                'quantity' => request('quantity')
            ],
        ]);
    }

    public function destroySales(OrderDetail $orderDetail)
    {
            $orderDetail->delete();
            return back();    
    }
}
