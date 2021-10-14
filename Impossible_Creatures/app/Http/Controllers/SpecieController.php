<?php

namespace App\Http\Controllers;

use App\Models\Species;
//use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecieController extends Controller
{

    function getAll(){
    return Species::all();
    }

    function getById($id) {
         return Species::findOrFail($id);
    }

    public function update(Request $request, Species $species, $id) {
        $species = Species::findOrFail($id);

            if ($species) {

                $species = Species::UpdateDTOtoObject($request, $species);
                    $species->save();

                    return response()->json([

                        'Message' => 'Species have been updated'
                    ], 200);

            } else {

                return response()->json([

                    'Message' => 'Species have been updated'
                ], 400);
            }


        }


   public function create(Request $request) {

        $validator = Validator::make($request->all(), [

            'name' => 'required',
            'user_creator' => 'required',
            'species_a' => 'nullable',
            'species_b' => 'nullable'
        ]);
            if ($validator->fails()) {

                return response()->json([

                    'Message' => 'Species could not be created'
                ], 400);
            } else {
                $species = Species::CreateDTOtoObject($request);
                $species->save();
            return response($request, 200);
            
            
            }
        }

            


        public function delete($id) {

                $species = Species::findOrFail($id);

                if ($species) {
                 $species->delete();

                    return response()->json([

                        'Message' => 'Species have been deleted'
                    ], 200);

            } else {

                return response()->json([

                    'Message' => 'Species have been deleted'
                ], 400);
            }

        }
        

                
            

    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
     function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
    function show(Species $species)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */


    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Species  $species
     * @return \Illuminate\Http\Response
     */
     function destroy(Species $species)
    {
        $species = Species::findOrFail();

        if ($species) {
         $species->delete();

            return response()->json([

                'Message' => 'Species have been deleted'
            ], 200);

    } else {

        return response()->json([

            'Message' => 'Species have been deleted'
        ], 400);
    }

    }
}