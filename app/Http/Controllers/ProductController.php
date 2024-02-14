<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $list = Product::all();

        return view('admin.product.index', compact('list'));
    }

    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar_base64' => 'required',
            'product_name'  => 'required',
            'price'         => 'required',
            'currency'      => 'required',
            'dimension'     => 'required',
            'unit'          => 'required'
        ]);

        $data                   = New Product();
        $data->image            = $request->input('gambar_base64');
        $data->product_code     = substr($request->input('product_name') ,0,3).$request->input('unit');
        $data->product_name     = $request->input('product_name');
        $data->price            = $request->input('price');
        $data->currency         = $request->input('currency');
        $data->discount         = $request->input('discount');
        $data->dimension        = $request->input('dimension');
        $data->unit             = $request->input('unit');
        $data->save();

        return redirect(route('admin.product.index'))
                    ->with('success', 'Data saved successfully');
    }

    public function edit(Request $request)
    {
        $data = Product::find($request->id);

        return view('admin.product.edit', Compact('data'));
    }

    public function updated(Request $request)
    {
        $request->validate([
            'gambar_base64' => 'required',
            'product_name'  => 'required',
            'price'         => 'required',
            'currency'      => 'required',
            'dimension'     => 'required',
            'unit'          => 'required'
        ]);

        $data                   = Product::find($request->id);
        $data->image            = $request->input('gambar_base64');
        $data->product_code     = substr($request->input('product_name') ,0,3).$request->input('unit');
        $data->product_name     = $request->input('product_name');
        $data->price            = $request->input('price');
        $data->currency         = $request->input('currency');
        $data->discount         = $request->input('discount');
        $data->dimension        = $request->input('dimension');
        $data->unit             = $request->input('unit');

        $data->save();

        return redirect(route('admin.product.index'))
                    ->with('success', 'Data saved successfully');
    }

    public function delete($id)
    {
        $data           = Product::findOrFail($id);
        $data->delete();

        return redirect(route('admin.product.index'))
                    ->with('success', 'Data successfully deleted');
    }
}
