<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AnimalController extends Controller
{
    function getAll(){
        return Animal::all();
        }
    
    function getById($id) {
             return Animal::findOrFail($id);
        }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Animal::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function create(Request $request) {

            
        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'species' => 'required',
            'user_creator' => 'required',
            'user_owner' => 'required',
            
        ]);
            if ($validator->fails()) {

                return response()->json([

                    'Message' => 'Animals could not be created'
                ], 400);
            } else {
                $animals = Animal::CreateDTOtoObject($request);
                $animals->save();
            return response($request, 200);



            }}
    // {
    //     if (User::create($request->all())) {

    //         return response()->json([
    //             'Message' => 'successfully created'

    //         ], 200);

    //     } else { 

    //         return response()->json([
    //             'error' => 'error'

    //         ], 400);
    //     }
    //    // Animals::create($request->all());
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Animal  $animals
     * @return \Illuminate\Http\Response
     */
    public function show(Animal $animals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Animal  $animals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Animal $animals, $id)
    {
        $animals = Animal::findOrFail($id);
        
        if ($animals) {

            $animals = Animal::UpdateDTOtoObject($request, $animals);
                $animals->save();

                return response()->json([

                    'Message' => 'Animals have been updated'
                ], 200);

        } else {

            return response()->json([

                'Message' => 'Animals have been updated'
            ], 400);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Animal  $animals
     * @return \Illuminate\Http\Response
     */

    function delete($id) {

        $animals = Animal::findOrFail($id);

        if ($animals) {
         $animals->delete();

            return response()->json([

                'Message' => 'Animals have been deleted'
            ], 200);

    } else {

        return response()->json([

            'Message' => 'Animals have been deleted'
        ], 400);
    }

}
}
