<?php

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
    		'success' => true,
    		'message' => 'Berhasil menambah category'
    	], 200);
    }
}
