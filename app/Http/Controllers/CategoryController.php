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
		$this->category = $category;
	}

    public function index(CategoryDataTable $dataTable)
    {
    	return $dataTable->render('back.category.index');
    }

    public function store(CategoryRequest $request)
    {
    	$category = $this->category->save($request->all());
    	return response()->json([
    		'status' => 'success',
    		'message' => 'Berhasil menambah category'
    	], 200);
    }

    public function edit(string $id)
    {
        return $this->category->edit($id);
    }

    public function update(string $id, array $request)
    {
        # code...
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
