<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Model;


class User extends Model
{
    public static function CreateDTOtoObject (Request $request) {

        $user = new User();
        
        $user -> username = $request->username;
        $user -> password = $request->password; 
        $user -> money = $request->money;
        $user -> points = $request->points;
        $user -> animals = $request->animals;
        $user -> species = $request->species;
        
        return $user; 
            }

}
