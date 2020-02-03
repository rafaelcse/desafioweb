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
            return response()->json(["status_req" => "ok", "err" => ['Erro interno']  ], 401);
        }
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'codigo_xyz' => 'required',
            'nome' => 'required',
            'email' => 'required',
            'cpf' => 'required',
            'rg' => 'required',
            'nascimento' => 'required',
            'salario' => 'required',
            'peso' => 'required',
            'altura' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(["status" => "ok", "msg" => "Preencha todos os campos obrigatorios", "errors" => $validator->errors()->all()  ], 401);
        }

        try{
            $obj = new \App\Models\Pessoas;

            $obj->codigo_xyz = $request->codigo_xyz;
            $obj->nome = $request->nome;
            $obj->email = $request->email;
            $obj->cpf = $request->cpf;
            $obj->rg = $request->rg;
            $obj->nascimento = $request->nascimento;
            $obj->salario = $request->salario;
            $obj->peso = $request->peso;
            $obj->altura = $request->altura;


            $obj->save();

        } catch ( \Exception $ex ) {
            return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
        }


    }

    public function update(Request $request, $id)
    {
      $validator = Validator::make($request->all(), [

        'codigo_xyz' => 'required',
        'nome' => 'required',
        'email' => 'required',
        'cpf' => 'required',
        'rg' => 'required',
        'nascimento' => 'required',
        'salario' => 'required',
        'peso' => 'required',
        'altura' => 'required',
    ]);

      if ($validator->fails()) {
        return response()->json(["status" => "ok", "msg" => "Preencha todos os campos obrigatorios", "errors" => $validator->errors()->all()  ], 401);
    }

    try{
        $obj = \App\Models\Pessoas::find($id);

        $obj->codigo_xyz = $request->codigo_xyz;
        $obj->nome = $request->nome;
        $obj->email = $request->email;
        $obj->cpf = $request->cpf;
        $obj->rg = $request->rg;
        $obj->nascimento = $request->nascimento;
        $obj->salario = $request->salario;
        $obj->peso = $request->peso;
        $obj->altura = $request->altura;


        $obj->update();

    } catch ( \Exception $ex ) {
        return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
    }

}

public function destroy($id)
{
   if($id > 0 ){
    try{
        $obj = \App\Models\Pessoas::find($id);
        $obj->delete();
        return response()->json(["status_req" => "ok", "err" => [] ,'dados' => $obj ], 200);
    } catch ( \Exception $ex ) {
        return response()->json(["status_req" => "ok", "err" => [$ex->getMessage()]  ], 401);
    }  
}else{
    return response()->json(["status_req" => "ok", "err" => ['Erro interno']  ], 401);
}
}
}
