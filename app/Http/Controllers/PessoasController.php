<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Patinetes;
use Carbon\Carbon;


class PessoasController extends Controller
{

    public function All()
    {
        try{
            $obj = \App\Models\Pessoas::get();
            return response()->json(["status_req" => "ok", "err" => [] ,'dados' => $obj ], 200);
        } catch ( \Exception $ex ) {
            return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
        }
    }




    public function get($id)
    {
        if($id > 0 ){
            try{
                $obj = \App\Models\Pessoas::find($id);
                return response()->json(["status_req" => "ok", "err" => [] ,'dados' => $obj ], 200);
            } catch ( \Exception $ex ) {
                return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
            }  
        }else{
            return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
        }


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
        //


        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "ok", "msg" => "Preencha todos os campos obrigatorios", "errors" => $validator->errors()->all()  ], 500);
        }


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
