<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function index()
    {
        $data['title'] = 'Stock Flower';
        $data['stock'] = Stock::all();
        return view('admin.stock', $data);
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Flower';
        $data['stock'] = DB::table('stock')->join('flower', 'flower.id', '=', 'stock.flower_id')
            ->select(
                'stock.*',
                'flower.name',
                'flower.description',
                'flower.price',
                'flower.image',
            )
            ->where('stock.id', $id)->get()->first();
        return view('admin.edit-stock', $data);
    }

    public function update(Request $request, $id)
    {
        $stock = Stock::findOrFail($id);
        $stock->update([
            'quantity' => $request->input('stock')
        ]);
        if ($stock) {
            return redirect()->route('stock.index')->with('message', 'Successfully Edit Stock!');
        } else {
            return redirect()->route('stock.edit')->with('error', 'An Error Occurred While Editing Stock!');
        }
    }
}
