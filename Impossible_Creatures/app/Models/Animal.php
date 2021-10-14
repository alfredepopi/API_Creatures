<?php

namespace App\Models;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    public static function CreateDTOtoObject(Request $request) {

        $animals = new Animal();
        
$animals -> name = $request-> name;
$animals -> species = $request-> species;
$animals -> user_creator = $request->user_creator;
$animals -> user_owner = $request->user_owner;   


        return $animals;
    }


    public static function UpdateDTOtoObject (Request $request, $animals) {
        
if ($animals ->name) {$animals -> name = $request->name;}
if ($animals ->user_creator) {$animals -> user_creator = $request->user_creator;}
if ($animals ->user_owner) {$animals -> user_owner = $request->user_owner;}
if ($animals ->species) {$animals -> species = $request-> species;;}

return $animals;
      
    }
    
    
    
    //protected $fillable = ['species'];
}
