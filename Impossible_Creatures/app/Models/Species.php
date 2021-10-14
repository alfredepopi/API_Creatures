<?php

namespace App\Models;

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    public static function CreateDTOtoObject(Request $request) {

        $species = new Species();
$species -> name = $request->name;
$species ->user_creator = $request->user_creator;
$species ->species_a = $request->species_a;
$species ->species_b = $request->species_b;

return $species;

        
    }


    public static function UpdateDTOtoObject (Request $request, $species) {

if ($species->name){$species->name = $request->name;}
if ($species->user_creator){$species->user_creator = $request->user_creator;}        
if ($species->species_a){$species->species_a = $request->species_a;}
if ($species->species_b){$species->species_b ->species_b = $request->species_b;}

return $species;
    }
}
