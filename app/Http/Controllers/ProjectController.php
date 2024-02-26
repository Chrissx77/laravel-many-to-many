<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\Technologie;
use App\Models\Type;

class ProjectController extends Controller
{
    public function index(){
        $projects = Project :: all();

        return view('pages.project.index', compact('projects'));
    }

    public function create(){

        $types = Type :: all();
        $technologies = Technologie :: all();

        return view('pages.project.create', compact('types', 'technologies'));
    }

    public function store(Request $request){
        $data = $request -> all();

        $type = Type :: find($data['type_id']);

        $project = new Project();
        $project -> name = $data['name'];
        $project -> type() -> associate($type);
        $project -> save();
        $project -> technologies() -> attach($data['technologie_id']);

        return redirect() -> route('project.index');

    }
}
