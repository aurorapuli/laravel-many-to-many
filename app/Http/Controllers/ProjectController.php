<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;


class ProjectController extends Controller
{
    public function index() {

        $projects = Project :: all();


        return view('pages.projects.index', compact('projects'));
    }

    public function create() {

        $types = Type :: all();
        $technologies = Technology :: all();

        return view('pages.projects.create', compact('types', 'technologies'));
    }

    public function store(Request $request) {

         $data = $request -> all();

         $type = Type :: find($data['type_id']);

         $img = $data['image'];
         $img_path = Storage :: disk('public')
             -> put('images', $img);

        $project -> image = $img_path;

         $project = new Project();

         $project -> title = $data['title'];
         $project -> description = $data['description'];



         $project -> type() -> associate($type);

         $project -> save();

         $project -> technologies() -> attach($data['technology_id']);

         return redirect() -> route('project.index');
    }

    public function edit($id) {

        $project = Project :: find($id);

        $types = Type :: all();
        $technologies= Technology :: all();

        return view('pages.projects.edit', compact('types', 'technologies', 'project'));
    }

    public function update(Request $request, $id) {

        $data = $request -> all();

        $type = Type :: find($data['type_id']);

        $project = Project :: find($id);

        $project -> title = $data['title'];
        $project -> description = $data['description'];
        $img = $data['image'];
        $img_path = Storage :: disk('public')
            -> put('images', $img);

       $project -> image = $img_path;

        $project -> type() -> associate($type);

        $project -> save();

        $project -> technologies() -> sync($data['technology_id']);

        return redirect() -> route('project.index');
   }
}
