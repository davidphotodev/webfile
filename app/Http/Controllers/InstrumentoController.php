<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Instrumento;
use Illuminate\Http\Request;
use App\Models\InstrumentResident;
use App\Models\ResidentInstrumentStatus;

class InstrumentoController extends Controller
{

    public function aplicar(){

        $rol = auth()->user()->rol;
        return view('instrumento.aplicar', compact('rol'));
    }

    public function all(){
        $rol = auth()->user()->rol;
        return $instrumentos = Instrumento::where('rol', $rol)->get();
    }

    public function aplicaWithResidentData(Request $request){
        $rol = auth()->user()->rol;
        $instrumentos_resident = InstrumentResident::where('resident_id', $request->id)
                                 ->where('rol', $rol)
                                 ->get();

        return $instrumentos_resident;
    }

    public function instrumentStatusResident(Request $request){
        $instrumentos_resident = ResidentInstrumentStatus::where('resident_id', $request->id)
                                 ->first();

        return $instrumentos_resident;
    }

    public function gestionar(){
        $instrumentos = Instrumento::where('user_id', auth()->user()->id)->get();
        $rol = auth()->user()->rol;
        return view('instrumento.gestionar', compact('instrumentos', 'rol'));
    }
    public function gestionarMy(){
        $instrumentos = Instrumento::where('user_id', auth()->user()->id)->get();

        return $instrumentos;
    }

    public function edit($id){

        $instrumento = Instrumento::find($id);
        $rol = auth()->user()->rol;
        return view('instrumento.editar', compact('instrumento', 'rol'));
    }

    public function llenar($id){
        $instrumento = InstrumentResident::find($id);
        $rol = auth()->user()->rol;
        return view('instrumento.llenar', compact('instrumento', 'rol'));
    }

    public function ver($id,$type){

        $rol = auth()->user()->rol;
        if($type == 1){
            $instrumento = Instrumento::find($id);
        }
        else{
            
            $instrumento = InstrumentResident::find($id);
        }
        return view('instrumento.ver', compact('instrumento', 'rol'));
    }

    public function create(){
        $rol = auth()->user()->rol;
        return view('instrumento.create', compact('rol'));
    }

    public function getResidentJson($search){

        $resident = Resident::where('name','like', "%$search%")->get();
        return $resident;
    }

    public function store(Request $request){

        $insrumento = new Instrumento;
        $insrumento->title = $request->title;
        $insrumento->rol = $request->rol;
        $insrumento->content = $request->content;
        $insrumento->user_id = auth()->user()->id;
        

        $insrumento->save();

        return $insrumento;
    }
    public function update(Request $request , $id){

        $insrumento =  Instrumento::find($id);
        $insrumento->title = $request->title;
        $insrumento->content = $request->content;
        $insrumento->save();
        return $insrumento;
    }

    public function llenarUpdate(Request $request , $id){

        $insrumento =  InstrumentResident::find($id);
        $insrumento->title = $request->title;
        $insrumento->content = $request->content;
        $insrumento->save();
        return $insrumento;
    }

    public function aplicarResident(Request $request){

        $insrumento_resident =  new InstrumentResident;
        $insrumento_resident->title = $request->instrument['title'];
        $insrumento_resident->content = $request->instrument['content'];
        $insrumento_resident->rol = $request->instrument['rol'];
        $insrumento_resident->resident_id = $request->resident;
        $insrumento_resident->instrument_id =  $request->instrument['id'];
        $insrumento_resident->save();
        return $insrumento_resident;
    }

    public function aplicaInstrumentStatusResident(Request $request){

        $rol = $request->rol;

        $exist_resident = ResidentInstrumentStatus::where('resident_id', $request->resident)->first();

        if($exist_resident){

            if($rol == 'Psicolog??a'){
                $exist_resident->s_psicologia = $request->status;
                $exist_resident->c_psicologia = $request->count;
                $exist_resident->f_psicologia = $request->fase;
                
            }
            if($rol == 'Trabajado Social'){
                $exist_resident->s_trabajo_social = $request->status;
                $exist_resident->c_trabajo_social = $request->count;
                $exist_resident->f_trabajo_social = $request->fase;
                
            }
            if($rol == 'Enfermer??a'){
                $exist_resident->s_enfermeria = $request->status;
                $exist_resident->c_enfermeria = $request->count;
                $exist_resident->f_enfermeria = $request->fase;
                
            }
            if($rol == 'Doctor'){
                $exist_resident->s_medicina = $request->status;
                $exist_resident->c_medicina = $request->count;
                $exist_resident->f_medicina = $request->fase;
                
            }
            if($rol == 'Consejero'){
                $exist_resident->s_consejeria= $request->status;
                $exist_resident->c_consejeria= $request->count;
                $exist_resident->f_consejeria= $request->fase;
                
            }

            $exist_resident->save();
            return $exist_resident;

        }
        else {
            
            $insrumento_resident_status =  new ResidentInstrumentStatus;
            $insrumento_resident_status->resident_id =  $request->resident;

            if($rol == 'Psicolog??a'){
                $insrumento_resident_status->s_psicologia = $request->status;
                $insrumento_resident_status->c_psicologia = $request->count;
                $insrumento_resident_status->f_psicologia = $request->fase;
                
            }
            if($rol == 'Trabajado Social'){
                $insrumento_resident_status->s_trabajo_social = $request->status;
                $insrumento_resident_status->c_trabajo_social = $request->count;
                $insrumento_resident_status->f_trabajo_social = $request->fase;
                
            }
            if($rol == 'Enfermer??a'){
                $insrumento_resident_status->s_enfermeria = $request->status;
                $insrumento_resident_status->c_enfermeria = $request->count;
                $insrumento_resident_status->f_enfermeria = $request->fase;
                
            }
            if($rol == 'Doctor'){
                $insrumento_resident_status->s_medicina = $request->status;
                $insrumento_resident_status->c_medicina = $request->count;
                $insrumento_resident_status->f_medicina = $request->fase;
                
            }
            if($rol == 'Consejero'){
                $insrumento_resident_status->s_consejeria= $request->status;
                $insrumento_resident_status->c_consejeria= $request->count;
                $insrumento_resident_status->f_consejeria= $request->fase;
                
            }
            $insrumento_resident_status->save();
            return $insrumento_resident_status;
        }
            
        
    }


    public function destroy($id){
        
        $instrument = Instrumento::find($id)->delete();

    }
}
