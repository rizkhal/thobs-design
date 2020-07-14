<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Http\Requests\ProjectRequest;
use App\Repository\Category\CategoryRepo;
use App\Repository\Project\ProjectRepo;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project;

    protected $category;

    public function __construct(ProjectRepo $project, CategoryRepo $category)
    {
        $this->project  = $project;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProjectDataTable $dataTable)
    {
        return $dataTable->render('back.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        $this->project->save($request->all());
        notice('success', 'Berhasil mengupload project');
        return redirect()->route('admin.projects.index');
    }

    public function status(Request $request)
    {
        if ($request->ajax()) {
            $this->project->changeStatus($request->id);
            return response()->json([
                'success' => true,
                'message' => 'Status berhasil diupdate',
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        return view('back.project.edit', [
            'project' => $this->project->findById($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id)
    {
        $this->project->update($id, $request->all());
        notice('info', 'Project berhasil diubah');
        return redirect()->back();
    }

    public function slick(Request $request)
    {
        if ($request->ajax()) {

            $this->project->slick($request->id);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil menambah corausel..',
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (request()->ajax()) {
            $this->project->delete($id);
            return response()->json([
                'success' => true,
                'message' => 'Project berhasil dihapus',
            ], 200);
        }
    }
}
