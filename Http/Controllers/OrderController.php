public function buy(Service $service)
{
    $token = env('FIVESIM_TOKEN');
    $resp = Http::withToken($token)
        ->post("https://5sim.net/v1/user/buy/activation/{$service->country}/{$service->operator}/{$service->product}");
    $r = $resp->json();
    $order = Order::create([
        'user_id'=>auth()->id(),
        'service_id'=>$service->id,
        'order_api_id'=>$r['id'],
        'phone'=>$r['phone'] ?? null,
        'status'=>$r['status']
    ]);
    return redirect()->route('order.show', $order);
}

public function show(Order $order)
{
    return view('order', compact('order'));
}

public function checkOtp(Order $order)
{
    $token=env('FIVESIM_TOKEN');
    $resp=Http::withToken($token)->get("https://5sim.net/v1/user/check/{$order->order_api_id}");
    $data=$resp->json();
    if (!empty($data['sms'])) {
        $order->sms = json_encode($data['sms']);
        $order->status = $data['status'];
        $order->save();
    }
    return response()->json($data);
}
