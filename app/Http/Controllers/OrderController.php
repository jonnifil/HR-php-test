<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

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
            ->orderBy('delivery_dt', 'desc')
            ->get();
        $newOrders = Order::where([
            ['delivery_dt','>=', date('Y-m-d H:i:s')],
            ['status', '=', 0]
        ])
            ->orderBy('delivery_dt', 'desc')
            ->limit(50)
            ->get();
        $completeOrders = Order::where([
            ['delivery_dt','like', date('Y-m-d').'%'],
            ['status', '=', 20]
        ])
            ->orderBy('delivery_dt', 'desc')
            ->limit(50)
            ->get();
        return view('orders', [
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
