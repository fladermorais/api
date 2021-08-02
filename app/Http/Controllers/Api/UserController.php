<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $data = $request->all();

        $user = new User;
        $validator = Validator::make($data, $user->rules());
        if($validator->fails()){
            return response()->json([
                "status"    =>  "error",
                "message"   =>  $validator->errors(),
            ], 400);
        }
        $response = $user->newInfo($data);
        if($response){
            return response()->json([
                "status"    =>  "success",
                "item"      =>  $response,
            ], 201);
        } else {
            return response()->json([
                "status"    =>  "error"
            ], 400);
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
        $user = User::find($id);
        if(isset($user)){
            return response()->json([
                "status"    =>  "success",
                "response"  =>  $user,
            ], 200);
        } else {
            return response()->json([
                "status"    =>  "error",
                "message"   =>  "not found",
            ], 400);
        }
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
