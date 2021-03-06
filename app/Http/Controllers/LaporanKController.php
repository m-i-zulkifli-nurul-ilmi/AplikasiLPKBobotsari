<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kharian;
use DataTables;
use DB;


class LaporanKController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * 
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    }

    public function index(Request $request)
    {


        if (request()->ajax()) {

            if (!empty($request->from_date)) {
                $data = DB::table('kharians')

                    ->whereBetween('tanggal', array($request->from_date, $request->to_date))
                    ->get();
            } else {
                $data = DB::table('kharians')
                    ->get();
            }
            return datatables()->of($data)->make(true);
        }
        return view('laporanK');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kharian::create($request->all());
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}