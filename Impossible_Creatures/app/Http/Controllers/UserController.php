<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    function getAll() {
        return User::all();
    }

    function getByID($id) {
        return User::findOrFail($id);
    }

    function register(Request $request) { //Inscription
        $validator = Validator::make($request->all(), [ 

            'username' => 'required', 
            'password' =>  'required', 
            'money' => 'nullable',
            'points' => 'nullable',
            'animals' => 'nullable', 
            'species' => 'nullable'
        ]);
            if ($validator->fails()) { 
return response()->json(['Message' => 'Your account has not been created, retry'], 400);

     } else {

        $user = User::CreateDTOtoObject($request);
        $user->save();

        return response($user, 201); 
     }
    }

    function login(Request $request) { //Connexion

        $username = $request->username;
        $password = $request->password;
        
        if (User::getPasswordByUsername($username) == $username){

            return response()->json([

                'success' => 'Welcome back with us'
            ], 200);


        } else {

            return response()->json([
                'error' => 'sorry, an error just occured with your password, retry'

            ], 500);
        }

    }

    public static function getPasswordByUsername($username) { 

        $user = DB::table('users')->where('username', $username)->first();
        return $user->password;
    }





    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->update($request->all())) {

            return response()->json([
                'success' => 'Successful modification'

            ], 200);
        } else {

            return response()->json([
                'error' => 'modification error'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete(User $user)
    {
        function delete($id) {

            $user = User::findOrFail($id);
    
            if ($user) {
             $user->delete();
    
                return response()->json([
    
                    'Message' => 'User Account have been deleted'
                ], 200);
    
        } else {
    
            return response()->json([
    
                'Message' => 'User Account have been deleted'
            ], 400);
        }
    
    }
    }
}
