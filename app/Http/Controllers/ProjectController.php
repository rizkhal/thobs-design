<?php

namespace App\Http\Controllers;

use App\DataTables\ProjectDataTable;
use App\Http\Requests\ProjectRequest;
use App\Repository\Category\CategoryRepo;
use App\Repository\Project\ProjectRepo;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected $project, $category;

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
        return $dataTable->render('backend::project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend::project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request)
    {
        if ($this->project->save($request->data())) {
            notice('success', 'Successfully upload the project.');
            return redirect()->route('admin.projects.index');
        } else {
            notice('danger', 'Something went wrong, please the contact administrator.');
            return redirect()->back();
        }
    }

    /**
     * Change project status
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        if ($request->ajax()) {
            if ($this->project->changeStatus($request->id)) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'The project status is updated.',
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'danger',
                    'message' => 'Something went wrong, please the contact administrator.',
                ], 500);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(string $id)
    {
        return view('backend::project.edit', [
            'project'    => $this->project->findById($id),
            'categories' => $this->category->all(),
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
        if ($this->project->update($id, $request->data())) {
            notice('success', 'Successfully update the project.');
            return redirect()->route('admin.projects.index');
        } else {
            notice('danger', 'Something went wrong, please the contact administrator.');
            return redirect()->back();
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
            if ($this->project->delete($id)) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'The project has been deleted.',
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'danger',
                    'message' => 'Something went wrong, pelase the contact administrator.',
                ], 200);
            }
        }
    }

    public function frontIndex()
    {
        $projects   = $this->project->project();
        $categories = $this->category->hasProject($projects);

        return view('front.project.index', compact('projects', 'categories'));
    }
}
