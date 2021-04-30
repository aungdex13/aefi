<?php

namespace App\Http\Controllers\Aefi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListAEFI1;
use DataTables;

class ListAEFI1Controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = ListAEFI1::select('id_case','hn','an')->whereNull('status')->get();
            // dd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('AEFI.new-list.listaefi1');
    }
}
