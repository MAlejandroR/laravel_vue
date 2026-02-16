<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class MainController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $cards = [
            "teachers"=>[
                'title'=>"Profesores",
                'description'=>"Mostrar los Profesores del sistema",
                'img'=>"/img/teachers.jpeg",
                'action'=>"/teachers"
            ],
            "students"=>[
                'title'=>'Estudiantes',
                'description'=>'Mostrar los Estudiantes del sistema',
                'img'=>'/img/students.jpeg',
                'action'=>'/students'
            ],
            "users"=>[
                'title'=>'Usuarios',
                'description'=>'Mostrar los Usuarios del sistema',
                'img'=>'/img/users.jpeg',
                'action'=>'/users'
            ],
            "projects"=>[
                'title'=>'Proyectos',
                'description'=>'Mostrar los Proyectos del sistema',
                'img'=>'/img/projects.jpeg',
                'action'=>'/projects'
            ]
        ];
        return Inertia::render('Main', ['cards'=>$cards]);
        //
    }
}
