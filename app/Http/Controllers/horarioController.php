<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class horarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHorarioServicio()
    {
        
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
        $transaction = DB::transaction(function() use($request){
            DB::table('horarios')->where('id_usuario_servicio',$request->idServicio)->delete();
            foreach ($request->horas as $value) {
                switch ($value['d']) {
                    case '0' :
                     $dia = 'Lunes';
                     break;
                    case '1' :
                     $dia = 'Martes';
                     break;
                    case '2' :
                     $dia = 'Miercoles';
                     break;
                    case '3' :
                     $dia = 'Jueves';
                     break;
                    case '4' :
                     $dia = 'Viernes';
                     break;
                    case '5' :
                     $dia = 'Sabado';
                     break;
                    case '6' :
                     $dia = 'Domingo';
                     break;
                }
                $exist = DB::table('horarios')
                ->where('dia',$dia)
                ->where('id_usuario_servicio',$request->idServicio)
                ->get();
                if (count($exist) > 0) {
                    DB::table('horarios')->where('dia',$dia)
                    ->where('id_usuario_servicio',$request->idServicio)
                    ->update([
                        'id_usuario_servicio' => $request->idServicio,
                        'dia' => $dia,
                        'hasta' => $value['hasta'],
                        'desde' => $value['desde']
                    ]);
                }else{
                    DB::table('horarios')->insert([
                        'id_usuario_servicio' => $request->idServicio,
                        'dia' => $dia,
                        'hasta' => $value['hasta'],
                        'desde' => $value['desde']
                    ]);
                }
            }
            return ['resul' => true];
        });
        
        // $save = 
        return response()->json($transaction);
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
