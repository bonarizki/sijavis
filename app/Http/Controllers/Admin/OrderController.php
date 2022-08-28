<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\User\ServiceRequest;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of(Order::with(['User','Category'])->get())
                ->addIndexColumn()
                ->make(true);
        }
        return view('admin.order');
    }

    public function edit(Order $order)
    {
        $order->load(['User','Category']);
        return response()->json(["status" => "success", "data" => $order]);
    }

    public function update(ServiceRequest $request, Order $order)
    {
        $order->update([
            "status" => $request->status,
            "technician_name" => $request->technician_name,
            "service_price" => $request->service_price == null ? null : str_replace('Rp ','',str_replace('.','',$request->service_price)),
            "sparepart_price" => $request->sparepart_price == null ? null : str_replace('Rp ','',str_replace('.','',$request->sparepart_price)),
        ]);
        return response()->json(["status" => "success", "message" => "Order Updated"]);
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return response()->json(["status" => "success", "message" => "Order Deleted"]);
    }
}
