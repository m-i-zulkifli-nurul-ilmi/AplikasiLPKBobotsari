<?php

namespace App\Http\Controllers;

use App\Kharian;
use Illuminate\Http\Request;
use DataTables;



class KharianAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $data = Kharian::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editKharian ex2">Ubah</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deleteKharian ex2">Hapus</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $kharians = Kharian::all();

        return view('kharianAjax', compact('kharians'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Kharian::updateOrCreate(
            ['id' => $request->kharian_id],
            ['tanggal' => $request->tanggal, 'koderekening' => $request->koderekening, 'namapegawai' => $request->namapegawai, 'uraian' => $request->uraian, 'jumlahanggaran' => $request->jumlahanggaran]
        );

        return response()->json(['success' => 'Pemasukan saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kharian  $kharian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kharian  = Kharian::find($id);
        return response()->json($kharian);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kharian  $kharian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kharian::find($id)->delete();

        return response()->json(['success' => 'Pemasukan deleted successfully.']);
    }
}
