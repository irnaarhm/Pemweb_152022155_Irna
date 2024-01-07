<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function my_order()
    {
        $data['transaction'] = Transaction::join('flower', 'flower.id', '=', 'transactions.flower_id')
            ->select(
                'transactions.*',
                'flower.name',
                'flower.image',
            )
            ->get();
        return view('customer.my-order', $data);
    }

    public function completed($id)
    {
        $transaction = Transaction::findOrFail($id);
        $stock = Stock::where('flower_id', $transaction->flower_id)->get()->first();
        $transaction->update([
            'status' => 2,
        ]);
        $stock->update([
            'quantity' => $stock->quantity - $transaction->quantity
        ]);

        if ($transaction) {
            return redirect(route('myorder'))->with('message', 'Order has been received!');
        }
    }
}
