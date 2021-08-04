<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ExtraDocumentController extends Controller
{
    public function monthly($sexo = null , $fecha_ingreso = null ,  $fecha_egreso = null , $origen = null , $nacion = null)
    {

            $data = request();
            $sexo= $data['sexo'];
            $fecha_ingreso = $data['fecha_ingreso'];
            $fecha_egreso = $data['fecha_egreso'];
            $origen = $data['origen'];
            $nacion = $data['nacionalidad'];
            //"2021-07-23"
            if(count(request()->all()) > 0){
                // dd($fecha_ingreso);
                $result =  Resident::Sexo($sexo)
                            ->DateIngreso($fecha_ingreso)
                            ->DateEgreso($fecha_egreso)
                            ->Origin($origen)
                            ->Nacion($nacion)
                            ->get();

            }else{
                $result =   Resident::all();
            }

       return view('reports.monthly', ['dates' =>  $result]);
    }

    public function monthlyGenerate(Request $request){

        $values = json_decode($request->array);

        $new_array = [];

        foreach($values as $value){
            array_push($new_array, $value->id);
        }
        Resident::generate_report_monthly_excel($new_array);
    }


    public function internal($sexo = null , $fecha_ingreso = null ,  $fecha_egreso = null , $origen = null , $nacion = null)
    {

            $data = request();
            $sexo= $data['sexo'];
            $fecha_ingreso = $data['fecha_ingreso'];
            $fecha_egreso = $data['fecha_egreso'];
            $origen = $data['origen'];
            $nacion = $data['nacionalidad'];
            
            if(count(request()->all()) > 0){

                $result =  Resident::Sexo($sexo)
                            ->DateIngreso($fecha_ingreso)
                            ->DateEgreso($fecha_egreso)
                            ->Origin($origen)
                            ->Nacion($nacion)
                            ->get();

            }else{
                $result =   Resident::all();
            }

       return view('reports.internal', ['dates' =>  $result]);
    }


    public function InternalGenerate(Request $request){

        $values = json_decode($request->array);

        $new_array = [];

        foreach($values as $value){
            array_push($new_array, $value->id);
        }
        Resident::generate_report_internal_excel($new_array);
    }

}
