<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'serviceType' => 'required|string|max:255',
            'serviceOptions' => 'required|array',
            'extraDetails' => 'nullable|string',
            'selectedDateTime.date' => 'required|string',
            'selectedDateTime.time' => 'required|integer|min:0|max:23',
            'contactNumber.number' => 'required|string|max:20',
            'address' => 'required',
        ]);

        // dd($validated);

       

        try {
            $fullAddress = $validated['address']['state'] . '-' . $validated['address']['city'] . '-' . $validated['address']['full_address'];
            $order = Order::create([
                'user_id' => auth()->id(),
                'service_type' => $validated['serviceType'],
                'service_options' => $validated['serviceOptions'],
                'extra_details' => $validated['extraDetails'] ?? null,
                'selected_date' => $validated['selectedDateTime']['date'],
                'selected_time' => sprintf('%02d:00:00', $validated['selectedDateTime']['time']),
                'contact_number' => $validated['contactNumber']['number'],
                'address' => $fullAddress,
            ]);
            return Response::success(null, $order);
        } catch (Exception $e) {
            return Response::error($e->getMessage());
        } 
    }

    public function getUserOrders(Request $request)
    {
        // $user = auth()->user();
        $orderCode = $request->query('order_code');

        $orders = Order::where('user_id', auth()->id())
            ->when($orderCode, function ($query, $orderCode) {
                return $query->where('order_code', 'like', "%{$orderCode}%");
            })
            ->paginate(10);

        return Response::success(null, $orders);

        // return response()->json($orders);
    }
    
}
