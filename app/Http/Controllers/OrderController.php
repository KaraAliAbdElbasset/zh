<?php

namespace App\Http\Controllers;

use App\Contracts\OrderContract;
use App\Contracts\SewingClientContract;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * @var OrderContract
     */
    protected $order;

    /**
     * OrderController constructor.
     * @param OrderContract $order
     */
    public function __construct(OrderContract $order)
    {
        $this->order = $order;
    }

    public function index()
    {
        $orders = $this->order->findByFilter(10,['client']);
        return view('orders.index',compact('orders'));
    }

    public function create(SewingClientContract $client)
    {
        $clients = $client->findByFilter(-1);
        return view('orders.create',compact('clients'));
    }

    /**
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function store(OrderRequest $request)
    {
        $order = $this->order->add($request->validated());
        return response()->json([
           'success' => true,
           'data' => $order,
           'message' => __('messages.create'),
        ]);
    }

    public function show($id)
    {
        $o = $this->order->findOneById($id,['client']);
        return view('orders.show',compact('o'));
    }

    public function edit($id,SewingClientContract $client)
    {
        $clients = $client->findByFilter(-1);
        $o = $this->order->findOneById($id);
        return view('orders.edit',compact('clients','o'));
    }

    /**
     * @param OrderRequest $request
     * @return JsonResponse
     */
    public function update($id,OrderRequest $request): JsonResponse
    {
        $order = $this->order->update($id,$request->validated());
        return response()->json([
            'success' => true,
            'data' => $order,
            'message' => __('messages.update'),
        ]);
    }

    public function destroy($id)
    {
        $this->order->delete($id);
        session()->flash('success',__('messages.delete'));
        return redirect()->route('orders.index');
    }
}
