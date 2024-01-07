<?php

namespace App\Http\Controllers;

use App\Models\Flower;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    public function index()
    {
        $data['title'] = 'Flower List';
        $data['flower'] = Flower::all();
        return view('admin.flower', $data);
    }

    public function create()
    {
        $data['title'] = 'Add Flower';
        return view('admin.add-flower', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->file('image') != "") {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('assets/img/flower/', $imageName);
            $flower = Flower::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $imageName
            ]);
            $flower->stock()->create([
                'quantity' => 0
            ]);
            if ($flower) {
                return redirect()->route('flower.index')->with('message', 'Successfully Add Flower!');
            } else {
                return redirect()->route('flower.add')->with('error', 'An Error Occurred While Adding Flowers!');
            }
        } else {
            return redirect()->route('flower.add')->with('error', 'An Error Occurred While Adding Flowers!');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Flower';
        $data['flower'] = Flower::where('id', $id)->first();
        return view('admin.edit-flower', $data);
    }

    public function update(Request $request, $id)
    {
        $flower = Flower::findOrFail($id);
        if ($request->file('image') == "") {
            $flower->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
            ]);
            if ($flower) {
                return redirect()->route('flower.index')->with('message', 'Successfully Edit Flower!');
            } else {
                return redirect()->route('flower.edit')->with('error', 'An Error Occurred While Editing Flowers!');
            }
        } else {
            $imagePath = 'assets/img/flower/' . $flower->image;
            unlink($imagePath);
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move('assets/img/flower/', $imageName);
            $flower->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
                'image' => $imageName
            ]);
            if ($flower) {
                return redirect()->route('flower.index')->with('message', 'Successfully Edit Flower!');
            } else {
                return redirect()->route('flower.edit')->with('error', 'An Error Occurred While Editing Flowers!');
            }
        }
    }

    public function delete($id)
    {
        $flower = Flower::findOrFail($id);
        $imagePath = 'assets/img/flower/' . $flower->image;
        unlink($imagePath);
        $flower->delete();
        if ($flower) {
            if ($flower) {
                return redirect()->route('flower.index')->with('message', 'Successfully Delete Flower!');
            } else {
                return redirect()->route('flower.index')->with('error', 'An Error Occurred While Deleting Flowers!');
            }
        }
    }

    public function list()
    {
        $data['flower'] = Flower::all();
        return view('customer.flower', $data);
    }
}
