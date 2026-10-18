<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class CheckoutController extends Controller
{
    public function create(Request $request, Furniture $furniture)
    {
        $qty      = max(1, min(20, (int) $request->get('qty', 1)));
        $subtotal = $furniture->price * $qty;
        $shipping = Order::shippingFor($subtotal);

        return view('checkout.create', compact('furniture', 'qty', 'subtotal', 'shipping'));
    }

    public function store(Request $request, Furniture $furniture)
    {
        $data = $request->validate([
            'quantity'       => ['required', 'integer', 'min:1', 'max:20'],
            'customer_name'  => ['required', 'string', 'max:100'],
            'phone'          => ['required', 'regex:/^[0-9+\-\s]{9,16}$/'],
            'email'          => ['nullable', 'email', 'max:100'],
            'address'        => ['required', 'string', 'max:300'],
            'city'           => ['required', 'string', 'max:80'],
            'postal_code'    => ['required', 'digits:5'],
            'payment_method' => ['required', Rule::in(array_keys(Order::PAYMENTS))],
            'notes'          => ['nullable', 'string', 'max:300'],
        ], [
            'required'     => 'Kolom ini wajib diisi.',
            'phone.regex'  => 'Nomor telepon tidak valid.',
            'email'        => 'Format email tidak valid.',
            'digits'       => 'Kode pos harus 5 angka.',
            'payment_method.in' => 'Pilih salah satu metode pembayaran.',
        ]);

        $subtotal = $furniture->price * $data['quantity'];
        $shipping = Order::shippingFor($subtotal);

        $order = Order::create($data + [
            'order_code'     => 'RF-' . strtoupper(Str::random(8)),
            'furniture_id'   => $furniture->id,
            'furniture_name' => $furniture->name,
            'unit_price'     => $furniture->price,
            'subtotal'       => $subtotal,
            'shipping'       => $shipping,
            'total'          => $subtotal + $shipping,
        ]);

        return redirect()->route('checkout.success', $order);
    }

    public function success(Order $order)
    {
        return view('checkout.success', compact('order'));
    }
}
