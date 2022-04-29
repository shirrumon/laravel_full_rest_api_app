<?php

namespace App\Http\Controllers;

use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function show($id)
    {
        return Order::find($id);
    }

    public function store(Request $request)
    {
        $article = Order::create($request->all());
        return response()->json($article, 201);
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());
        return response()->json($order, 200);
    }

    public function delete(Order $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }

    public function downloadAll()
    {
        $headers = [
            'Content-Type' => 'application/text',
        ];
        $filename = 'orders.txt';
        Storage::disk('local')->put($filename, Order::all());
        return response()->download(storage_path() . '\app\\' . $filename, $filename, $headers);
    }

    public function download($id)
    {
        $headers = [
            'Content-Type' => 'application/text',
        ];
        $filename = 'order_single.txt';
        Storage::disk('local')->put($filename, Order::find($id));
        return response()->download(storage_path() . '\app\\' . $filename, $filename, $headers);
    }
}
