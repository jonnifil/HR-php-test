<?php

namespace App\Http\Controllers;

use App\Order;
use App\Partner;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $overdueOrders = Order::where([
            ['delivery_dt','<=', date('Y-m-d H:i:s')],
            ['status', '=', 10]
        ])
            ->orderBy('delivery_dt', 'desc')
            ->limit(50)
            ->get();
        $currentOrders = Order::where([
            ['delivery_dt','>=', date('Y-m-d H:i:s')],
            ['delivery_dt','<=', date('Y-m-d H:i:s', time() + (24*60*60))],
            ['status', '=', 10]
        ])
            ->orderBy('delivery_dt', 'asc')
            ->get();
        $newOrders = Order::where([
            ['delivery_dt','>=', date('Y-m-d H:i:s')],
            ['status', '=', 0]
        ])
            ->orderBy('delivery_dt', 'asc')
            ->limit(50)
            ->get();
        $completeOrders = Order::where([
            ['delivery_dt','like', date('Y-m-d').'%'],
            ['status', '=', 20]
        ])
            ->orderBy('delivery_dt', 'desc')
            ->limit(50)
            ->get();
        return view('order.index', [
            'overdueOrders' => $overdueOrders,
            'currentOrders' => $currentOrders,
            'newOrders' => $newOrders,
            'completeOrders' => $completeOrders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|integer',
            'client_email' => 'required|email',
            'partner_id' => 'required|integer',
            'status' => 'required|integer',
        ]);
        $id = $request->input('id');
        $status = $request->input('status');
        if (!empty($id)) {
           $order = Order::find($id);
           if (is_object($order)) {
               $old_status = $order->status;
               $order->client_email = $request->input('client_email');
               $order->partner_id = $request->input('partner_id');
               $order->status = $status;
               $order->save();
               if ($old_status != $status && $status == 20)
                   $order->sendCompleteMails();
               return redirect('show/'.$id);
           } else return redirect('/');
        } else return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);
        return view('order.show', [
            'order' =>$order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('order.edit', [
            'order' =>$order,
            'partners' => Partner::all(),
            'statuses' => Order::getStatuses()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
