<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class MiembrosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('members.members');
    }

    public function create()
    {   
        $roles = Role::all();
        return view('members.create', compact('roles'));  
    }

    public function getData(){
        $members = User::get();
        return $members;
    }

    public function store(Request $request)
    {
        $user = new User;
        $user->name  = $request->name;   
        $user->email  = $request->email;   
        $user->phone_number  = $request->phone_number;   
        $user->rol  = $request->rol;   
        $user->password  = Hash::make($request->password);
        $user->photo  = $request->image;

        try {
            if ($user->save()) {
                 Session::flash('message', 'Registro creado con exito');
                 return response()->json([
                     'response' => "Success"
                 ]);
             }
         } catch (\Throwable $th) {
             return response()->json($th);
         }
    }

    public function edit($id)
    {   
        $user = User::findOrfail($id);
        $roles = Role::all();
        return view('members.edit', compact('user','roles'));
    }

    public function update(Request $request, $id)
    {   
        // return $request->all();

        $user = User::findOrfail($id);
        $user->name  = $request->name;
        
        $user->email  = $request->email;   
        $user->phone_number  = $request->phone_number;   
        if($request->password) {
            $user->password  = Hash::make($request->password);
        }  
        $user->rol  = $request->rol;   
        
        try {
            if ($user->save()) {
                Session::flash('message', 'Registro Actualizado con exito');
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
            if (User::destroy($ids)) {
                // Session::flash('message', 'Registros eliminados con exito');

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
        $resident = User::find($request->id);
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
}