<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ServiceRequest;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('user.service', compact('categories'));
    }

    public function store(ServiceRequest $request)
    {
        $request->merge([
            "user_id" => Auth::user()->id,
            "booking_code" => "ME-".Str::random(10)
        ]);
        Order::create($request->except('_token'));
        return back()->with('order_created','Order Create! ');
    }
}
