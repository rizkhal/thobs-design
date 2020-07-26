<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\CategoryDataTable;
use App\Http\Requests\CategoryRequest;
use App\Repository\Category\CategoryRepo;

class CategoryController extends Controller
{
	protected $category;

	public function __construct(CategoryRepo $category)
	{
        $this->middleware("role:super-admin");

		$this->category = $category;
	}

    public function index(CategoryDataTable $dataTable)
    {
    	return $dataTable->render('back.category.index');
    }

    public function store(CategoryRequest $request)
    {
        if ($this->category->save($request->data())) {
        	notice('success', 'Successfully save the category.');
            return redirect()->route('admin.category.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->route('admin.category.index');
        }
    }

    public function edit(string $id)
    {
        return $this->category->edit($id);
    }

    public function update(CategoryRequest $request)
    {
        if ($this->category->update($request->data())) {
            notice('success', 'Successfully update the category.');
            return redirect()->route('admin.category.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->route('admin.category.index');
        }
    }

    public function destroy(string $id)
    {
        if ($this->category->delete($id)) {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus category.'
            ], 200);
        }
    }
}
