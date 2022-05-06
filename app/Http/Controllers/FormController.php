<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client; //use client model
use DB;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    
    public function index()
    {
        
    }
    public function store(Request $request) // store input data in db
    {   

        $input = $request->client;

        $request_data = [  //validation rules
            'name' => 'string|required',
            'email' => 'required|email|unique:clients,email',
            'phone' => 'required|unique:clients,phone',
            'gender' => 'required',
            'address' => 'required',
            'nationality' => 'required',
            'date_of_birth' => 'required',
            'education_background' => 'required',
            'preferred_mode_of_contact' => 'required',

        ];

        $validator = Validator::make($input, $request_data);

        if ($validator->fails()) {
            $errors = json_decode(json_encode($validator->errors()), 1);
            return response($validator->getMessageBag(), 400);
        } 


        $newClient=new client;
        $newClient->name= $request->client['name'];
        $newClient->gender= $request->client['gender'];
        $newClient->phone= $request->client['phone'];
        $newClient->email= $request->client['email'];
        $newClient->address= $request->client['address'];
        $newClient->nationality= $request->client['nationality'];
        $newClient->date_of_birth= $request->client['date_of_birth'];
        $newClient->education_background= $request->client['education_background'];
        $newClient->preferred_mode_of_contact= $request->client['preferred_mode_of_contact'];
        $newClient->save();
        $id = ['id'  => $newClient->id];
        return json_encode($id); //return id
    }

    public function download(){

        $allClients=client::paginate(5); //paginate the data
        return view('download',compact('allClients'));       
    }


}
