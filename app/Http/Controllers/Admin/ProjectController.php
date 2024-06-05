<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller    
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        //validazione campi 
        $request->validate([
            'project_name' => 'required|string|min:2',
            'description' => 'nullable|max:2000',
            'working_hours' => 'required|integer',
            'co_workers' => 'required|max:200',
        ]);
        
        $form_data = $request->all();

        $new_project =  Project::create($form_data);

        return to_route('admin.projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => 'required|string|min:2',
            'description' => 'nullable|max:2000',
            'working_hours' => 'required|integer',
            'co_workers' => 'required|max:200',
        ]);
        $form_data = $request->all();
        //  $portfolio->fill($form_data);
        // $portfolio->save();
        //oppure - fa subito il fill()e il salvataggio- save()
        $project->update($form_data);
        return to_route('admin.projects.show',$project);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('admin.projects.index');
    }
}
