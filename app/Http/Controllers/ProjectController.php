<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $category_name = '';
        $data = [
            'category_name' => 'project',
            'page_name' => 'project',
            'has_scrollspy' => 1,
            'scrollspy_offset' => 100,
            'alt_menu' => 0,
        ];              

        $datas = Project::all();
        
        return view('projek.index', [
            'datas' => Project::all()
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required'  
        ]);

        if(Project::create($data)){
            return redirect('projek');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $projek
     * @return \Illuminate\Http\Response
     */
    public function show(Project $projek)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $projek
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $projek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $projek
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $projek)
    {
        $data = $request->validate([
            'nama' => 'required'   
        ]);

        if(Project::where('id', $projek->id)->update($data)){
            return redirect('projek');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $projek
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $projek)
    {
        if(Project::destroy($projek->id)){
            return redirect('projek');
        }
    }
}
