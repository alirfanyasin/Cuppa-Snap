<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {

        $data = Transaction::whereIn('status', ['Done', 'Canceled', 'Rejected'])->orderBy('id', 'DESC')->get()->groupBy('code');

        $filterData = $data->map(function ($group) {
            return $group->first();
        });

        $filterData->transform(function ($item) {
            $item->created_at = Carbon::parse($item->created_at);
            return $item;
        });
        return view('pages.app.transactions', [
            'data' => $filterData
        ]);
    }



    public function show($code)
    {
        $data = Transaction::whereIn('status', ['Rejected', 'Done', 'Canceled'])
            ->orderBy('id', 'DESC')
            ->get()
            ->groupBy('code');

        $filteredData = $data->map(function ($group) {
            return $group->first();
        });

        $order = Transaction::where(['code' => $code])->get();
        $dataBuyer = Transaction::where('code', $code)->first();

        if (!$order) {
            return abort(404);
        }

        return view('pages.app.transactions_show', [
            'data' => $filteredData,
            'order' => $order,
            'dataBuyer' => $dataBuyer,
            'snapToken' => $dataBuyer->snapToken
        ]);
    }
}
