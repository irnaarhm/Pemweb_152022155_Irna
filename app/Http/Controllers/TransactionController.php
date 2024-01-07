<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use App\Models\Stock;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $data['title'] = 'Transaction Incoming';
        $data['transaction'] = Transaction::where('status', 0)
            ->join('flower', 'flower.id', '=', 'transactions.flower_id')
            ->join('users', 'users.id', '=', 'transactions.customer_id')
            ->select(
                'transactions.*',
                'flower.name',
                'users.first_name',
                'users.last_name',
                'users.phone',
            )
            ->get();
        return view('admin.transaction-in', $data);
    }

    public function order_detail($id)
    {
        $flower = Flower::where('id', $id)->get()->first();
        return view('customer.order-detail', ['flower' => $flower]);
    }

    public function order_flower(Request $request, $id)
    {
        $flower = Flower::where('id', $id)->get()->first();
        $stock = Stock::where('flower_id', $id)->get()->first();
        if ($request->input('quantity') < $stock->quantity) {
            $transaction = Transaction::create([
                'customer_id' => auth()->id(),
                'flower_id' => $flower->id,
                'transaction_date' => now(),
                'quantity' => $request->input('quantity'),
                'total_amount' => $flower->price * $request->input('quantity'),
                'status' => 0
            ]);

            if ($transaction) {
                return redirect('/')->with('message', 'Order Successfully Created!');
            }
        } else {
            return redirect(url()->previous())->with('error', 'Only ' . $stock->quantity . ' In Stock!');
        }
    }

    public function send_flower($id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update([
            'status' => 1,
            'admin_id' => auth()->id()
        ]);

        if ($transaction) {
            return redirect()->route('transaction.incoming')->with('message', 'Submit Order Successfully!');
        }
    }

    public function history_transaction()
    {
        $data['title'] = 'History Transaction';
        $data['transaction'] = Transaction::join('flower', 'flower.id', '=', 'transactions.flower_id')
            ->join('users', 'users.id', '=', 'transactions.customer_id')
            ->select(
                'transactions.*',
                'flower.name',
                'flower.image',
                'users.first_name',
                'users.last_name',
                'users.phone',
            )
            ->get();

        return view('admin.history-transaction', $data);
    }
}
