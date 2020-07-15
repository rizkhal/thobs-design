<?php

namespace App\Http\Controllers;

use App\DataTables\BlogDataTable;
use App\Http\Requests\BlogRequest;
use App\Repository\Blog\BlogRepo;
use App\Repository\Category\CategoryRepo;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $blog, $category;

    public function __construct(BlogRepo $blog, CategoryRepo $category)
    {
        $this->blog     = $blog;
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BlogDataTable $dataTable)
    {
        return $dataTable->render('backend::blog.index');
    }

    /**
     * Change the blog post status
     * 
     * @param  Request $request
     * @return \Illuminate\Http\Response   
     */
    public function status(Request $request)
    {
        if ($request->ajax()) {
            if ($this->blog->changeStatus($request->id)) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'The blog post status is updated.',
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend::blog.create', [
            'categories' => $this->category->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogRequest $request)
    {
        if ($this->blog->save($request->data())) {
            notice('success', 'Successfully add new blog post.');
            return redirect()->route('admin.blog.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit(string $slug)
    {
        return view('backend::blog.edit', [
            'post' => $this->blog->findBySlug($slug),
            'categories' => $this->category->all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function update(BlogRequest $request, string $slug)
    {
        if ($this->blog->edit($slug, $request->data())) {
            notice('success', 'Successfully update the blog post.');
            return redirect()->route('admin.blog.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $slug)
    {
        if (request()->ajax()) {
            if ($this->blog->delete($slug)) {
                return response()->json([
                    'status'  => 'success',
                    'message' => 'Successfully delete the blog post.',
                ], 200);
            } else {
                return response()->json([
                    'status'  => 'danger',
                    'message' => 'Something went wrong, please contact the administrator.',
                ], 500);
            }
        }
    }
}
