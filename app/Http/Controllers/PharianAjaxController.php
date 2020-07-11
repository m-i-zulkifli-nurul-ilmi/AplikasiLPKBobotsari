<?php

namespace App\Http\Controllers;

use App\Pharian;
use Illuminate\Http\Request;
use DataTables;

class PharianAjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        if ($request->ajax()) {
            $data = Pharian::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm editPharian ex2">Ubah</a>';

                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm deletePharian ex2">Hapus</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $pharians = Pharian::all();

        return view('pharianAjax', compact('pharians'));

     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        Pharian::updateOrCreate(
            ['id' => $request->pharian_id],
            ['tanggal' => $request->tanggal, 'namapegawai' => $request->namapegawai, 'keterangan' => $request->keterangan, 'jumlahpemasukan' => $request->jumlahpemasukan]
        );

        return response()->json(['success' => 'Pemasukan saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pharian  $pharian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pharian  = Pharian::find($id);
        return response()->json($pharian);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pharian  $pharian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pharian::find($id)->delete();

        return response()->json(['success' => 'Pemasukan deleted successfully.']);
    }
}
