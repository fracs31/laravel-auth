<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str; //str

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all(); //prendo i progetti dal database
        return view("projects.index", compact("projects")); //restituisco la vista "index"
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("projects.create"); //restituisco la vista "create"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated(); //valido i dati
        $data["url"] = "http://www.projects.com/" . $data["title"]; //url
        $data["slug"] = Str::slug($data["title"], "-"); //slug
        $newProject = Project::create($data); //creo un nuovo progetto
        return to_route("projects.show", $newProject); //restistuisco la vista "index"
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("projects.show", compact("project")); //restituisco la vista "show"
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view("projects.edit", compact("project")); //restituisco la vista "edit"
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated(); //valido i dati
        $data["url"] = "http://www.projects.com/" . $data["title"]; //url
        $data["slug"] = Str::slug($data["title"], "-"); //slug
        $project->update($data); //creo un nuovo progetto
        return to_route("projects.show", $project); //restistuisco la vista "index"
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
