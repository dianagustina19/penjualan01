<?php

namespace App\Http\Controllers;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Models\TransactionHeader;
use PDF;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = TransactionHeader::with(['username','detail'])
            ->when($request->filled('daterange'), function ($query) use ($request) {
                list($start_date, $end_date) = explode(' - ', $request->input('daterange'));
                $query->whereBetween('date', [$start_date, $end_date]);
            }) 
            ->get();

            return Datatables::of($data)->addIndexColumn()
            ->addColumn('document_code', function($data){
                return $data->document_code."-".$data->document_number;
            })
            ->addColumn('userorg', function($data){
                return $data->username->name ?? '';
            })
            ->addColumn('item', function($data){
                $products = $data->detail->pluck('product_name')->implode('<br>');
                return $products;
            })
            ->rawColumns(['userorg','item','document_code'])
            ->make(true);                    
        }

        return view('admin.report.index');
    }

    public function export(Request $request)
    {
        $data = TransactionHeader::with(['username','detail'])
                ->when($request->filled('daterange'), function ($query) use ($request) {
                    list($start_date, $end_date) = explode(' - ', $request->input('daterange'));
                    $query->whereBetween('date', [$start_date, $end_date]);
                }) 
                ->get();

        $cetak      = "List Report.pdf";
        $pdf = PDF::loadview('pdf.report', compact('data',))
                    ->setPaper('A4', 'potrait')
                    ->setOptions(['isPhpEnabled' => true, 'enable_remote' => true]);
        return $pdf->stream($cetak);
    }
}
