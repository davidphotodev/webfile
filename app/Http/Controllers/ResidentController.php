<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Session;

class ResidentController extends Controller
{
  
    public function index()
    {
        return view('resident.resident');
    }


    public function create()
    {
        return view('resident.create');
    }

    public function getData(){
        $residents = Resident::get();

        return $residents;
    }

    public function getResidentsCompressed(){
        $residents = Resident::get();

        $residents = $residents->map( function ($item) {
            return collect($item->toArray())
                ->only(['name', 'surname', 'nationality', 'record'])
                ->all();
        });


        return $residents;
        
    }

    public function store(Request $request)
    {
    //    return json_encode($request->consumption_data_table);
       $resident = new Resident;
       $resident->name  = $request->name;   
       $resident->surname  = $request->surname;
       $resident->second_surname  = $request->second_surname;   
       $resident->nationality  = $request->nationality;
       $resident->identification  = $request->identification;   
       $resident->genre  = $request->genre;  
       $resident->record  = $request->record;   
       $resident->age  = $request->age;
       $resident->religion  = $request->religion;   
       $resident->date_birth  = $request->date_birth;   
       $resident->origin  = $request->origin;
       $resident->status  = $request->status;  
       $resident->admission_date  = $request->admission_date;   
       $resident->egress_date  = $request->egress_date;   
       $resident->entry_hour  = $request->entry_hour;  
       $resident->egress_hour  = $request->egress_hour;   
       $resident->egress_reason  = $request->egress_reason;   
       $resident->first_treatment  = $request->first_treatment;   
       $resident->another_center_entered  = $request->another_center_entered;   
       $resident->times_he_entered  = $request->times_he_entered;  
       $resident->marital_status  = $request->marital_status;   
       $resident->have_children  = $request->have_children;   
       $resident->children_number  = $request->children_number;   
       $resident->job  = $request->job;   
       $resident->occupation  = $request->occupation;   
       $resident->study  = $request->study;   
       $resident->educational_level  = $request->educational_level;   
       $resident->kind_resident  = $request->kind_resident;   
       $resident->cellphone  = $request->cellphone;   
       $resident->on_street  = $request->on_street;   
       $resident->referral_from_cai  = $request->referral_from_cai;   
       $resident->destiny  = $request->destiny;   
       $resident->destiny_reason  = $request->destiny_reason;   
       $resident->province  = $request->province;   
       $resident->canton  = $request->canton;   
       $resident->address  = $request->address;   
       $resident->psychiatric_diagnosis  = $request->psychiatric_diagnosis;   
       $resident->drug_dependence_diagnosis  = $request->drug_dependence_diagnosis;   
       $resident->consumption_data_table  =  json_encode($request->consumption_data_table);   
       $resident->pending_cases  = $request->pending_cases;   
       $resident->egress  = $request->egress;   
       $resident->egress_reason_law  = $request->egress_reason_law;   
       $resident->drugs  = $request->drugs;   
       $resident->sexual_nature  = $request->sexual_nature;   
       $resident->against_property  = $request->against_property;   
       $resident->against_life  = $request->against_life;   
       $resident->others_law  = $request->others_law;   
       $resident->bath  = $request->bath;   
       $resident->clothe  = $request->clothe;   
       $resident->listens  = $request->listens;   
       $resident->bedroom  = $request->bedroom;   
       $resident->breakfast  = $request->breakfast;   
       $resident->morning_snack  = $request->morning_snack;   
       $resident->lunch  = $request->lunch;   
       $resident->afternoon_snack  = $request->afternoon_snack;   
       $resident->dinner  = $request->dinner;   
       $resident->psychology = $request->psychology;  
       $resident->social_work  = $request->social_work;   
       $resident->medicine  = $request->medicine;   
       $resident->counseling  = $request->counseling;   
       $resident->occupational_therapy  = $request->occupational_therapy;   
       $resident->group_sessions  = $request->group_sessions;   
       $resident->others  = $request->others;   
       $resident->commentaries  = $request->commentaries;   
       $resident->photo  = $request->image;

    //    $resident->save();
      
       
        try {
            if ($resident->save()) {
                Session::flash('message', 'Registro creado con exito');
                return response()->json([
                    'response' => "Success"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    public function show($id)
    {
        $resident = Resident::findOrfail($id);
        return view('resident.detail', compact('resident'));
    }

    public function edit($id)
    {   
        $resident = Resident::findOrfail($id);
        return view('resident.edit', compact('resident'));
    }

    public function update(Request $request, $id)

    {
        $resident = Resident::findOrfail($id);
        $resident->name  = $request->name;   
        $resident->surname  = $request->surname;
        $resident->second_surname  = $request->second_surname;   
        $resident->nationality  = $request->nationality;
        $resident->identification  = $request->identification;   
        $resident->genre  = $request->genre;  
        $resident->record  = $request->record;   
        $resident->age  = $request->age;
        $resident->religion  = $request->religion;   
        $resident->date_birth  = $request->date_birth;   
        $resident->origin  = $request->origin;
        $resident->status  = $request->status;  
        $resident->admission_date  = $request->admission_date;   
        $resident->egress_date  = $request->egress_date;   
        $resident->entry_hour  = $request->entry_hour;  
        $resident->egress_hour  = $request->egress_hour;   
        $resident->egress_reason  = $request->egress_reason;   
        $resident->first_treatment  = $request->first_treatment;   
        $resident->another_center_entered  = $request->another_center_entered;   
        $resident->times_he_entered  = $request->times_he_entered;  
        $resident->marital_status  = $request->marital_status;   
        $resident->have_children  = $request->have_children;   
        $resident->children_number  = $request->children_number;   
        $resident->job  = $request->job;   
        $resident->occupation  = $request->occupation;   
        $resident->study  = $request->study;   
        $resident->educational_level  = $request->educational_level;   
        $resident->kind_resident  = $request->kind_resident;   
        $resident->cellphone  = $request->cellphone;   
        $resident->on_street  = $request->on_street;   
        $resident->referral_from_cai  = $request->referral_from_cai;   
        $resident->destiny  = $request->destiny;   
        $resident->destiny_reason  = $request->destiny_reason;   
        $resident->province  = $request->province;   
        $resident->canton  = $request->canton;   
        $resident->address  = $request->address;   
        $resident->psychiatric_diagnosis  = $request->psychiatric_diagnosis;   
        $resident->drug_dependence_diagnosis  = $request->drug_dependence_diagnosis;   
        $resident->consumption_data_table  = $request->consumption_data_table;   
        $resident->pending_cases  = $request->pending_cases;   
        $resident->egress  = $request->egress;   
        $resident->egress_reason_law  = $request->egress_reason_law;   
        $resident->drugs  = $request->drugs;   
        $resident->sexual_nature  = $request->sexual_nature;   
        $resident->against_property  = $request->against_property;   
        $resident->against_life  = $request->against_life;   
        $resident->others_law  = $request->others_law;   
        $resident->bath  = $request->bath;   
        $resident->clothe  = $request->clothe;   
        $resident->listens  = $request->listens;   
        $resident->bedroom  = $request->bedroom;   
        $resident->breakfast  = $request->breakfast;   
        $resident->morning_snack  = $request->morning_snack;   
        $resident->lunch  = $request->lunch;   
        $resident->afternoon_snack  = $request->afternoon_snack;   
        $resident->dinner  = $request->dinner;   
        $resident->psychology = $request->psychology;  
        $resident->social_work  = $request->social_work;   
        $resident->medicine  = $request->medicine;   
        $resident->counseling  = $request->counseling;   
        $resident->occupational_therapy  = $request->occupational_therapy;   
        $resident->group_sessions  = $request->group_sessions;   
        $resident->others  = $request->others;   
        $resident->commentaries  = $request->commentaries;   
        $resident->photo  = $request->image;   
 
       
         try {
             if ($resident->save()) {
                Session::flash('message', 'Registro Actualizado con exito');

                 return response()->json([
                     'response' => "Success"
                 ]);
             }
         } catch (\Throwable $th) {
             return response()->json($th);
         }
    }

    public function destroy(Request $request)
    {   
        $resident = Resident::find($request->id);
        try {
            if ($resident->delete()) {
                // Session::flash('message', 'Registro eliminado con exito');
                return response()->json([
                    'response' => "Success"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    public function destroySeveralRecords(Request $residents){
        try {
            $ids = explode(',', $residents->ids);
            if (Resident::destroy($ids)) {
                // Session::flash('message', 'Registros eliminados con exito');

                return response()->json([
                    'response' => "Success"
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }
}
