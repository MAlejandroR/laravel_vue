<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory;

    protected $fillable = ["name", "description", "hours", "starting_date"];

    public static function getFieldsLabel()
    {
        return [
            "name" => "Nombre",
            "description" => "Description",
            "hours"=>"Hora",
            "starting_date"=>"Fecha de comienzo"
        ];
    }
}
