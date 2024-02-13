<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use App\Models\Product;
use Carbon\Carbon;

class MasterController extends Controller
{
    public function index(Request $request){
        $list = Product::all();

        return view('list', compact('list'));
    }

    public function detail(Request $request)
    {
        $data = Product::find($request->id);

        return view('detail', compact('data'));
    }

    public function chart(Request $request)
    {
        $product = Product::find($request->id);
        $data =  TransactionDetail::where('product_code',$request->code)
                ->where('user_id',$request->name)
                ->where('status',0)
                ->first();
        if($data){
            $hitulang = $data->quantity+1;
            $data->quantity = $hitulang;
            $data->subtotal = $hitulang * $product->price;
            $data->save();
        }else{
            $save = New TransactionDetail;
            $save->document_code    = 'hjh';
            $save->document_number  = 'jhj';
            $save->image            = $product->image;
            $save->user_id          = $request->name;
            $save->product_code     = $product->product_code;
            $save->product_name     = $product->product_name;
            $save->price            = $product->price;
            $save->quantity         = 1;
            if($product->discount != null)
            {
                $save->subtotal = $product->price - ($product->price * $product->discount / 100);
            }else{
                $save->subtotal         = $product->price;
            }
            $save->currency         = $product->currency;
            $save->unit             = $product->unit;
            $save->discount         = $product->discount;
            $save->save();
        }

        $chart = TransactionDetail::where('user_id',$request->name)
            ->where('status',0)
            ->get();
        

        return view('step2', compact('chart'));
    }

    public function step2()
    {
        $chart = TransactionDetail::where('user_id',1)
                ->where('status',0)
                ->get();   

        return view('step2', compact('chart'));
    }

    public function confirm(Request $request)
    {
        $chart = TransactionDetail::where('user_id', $request->name)
                ->where('status', 0)
                ->get();

        $total = 0; 

        foreach ($chart as $item) {
            $total += $item->subtotal;
        }
     
        $updated = TransactionDetail::whereIn('id', $chart)->update(['status' => 1]);
        $save = New TransactionHeader;
        $save->document_code    = 'hjh';
        $save->document_number  = 'jhj';
        $save->user             = $request->name;
        $save->total            = $total;
        $save->date             = Carbon::now();
        $save->save();

        return view('confirm');
    }

    public function delete($id)
    {
        $data           = TransactionDetail::findOrFail($id);
        $data->delete();

        return redirect(route('step2'));
    }
}
