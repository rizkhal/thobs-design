<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\Category\CategoryRepo;

class Select2Controller extends Controller
{
	protected $category;

	public function __construct(CategoryRepo $category)
	{
		$this->category = $category;
	}

    public function category(Request $request)
    {
        $result = $this->category->searchByName(
            $request->query()
        );

        foreach ($result as $key => $row) {
            $data[$row->id]['id'] = $row->id;
            $data[$row->id]['text'] = $row->name;
        }

        $data = array_values($data);
        $data = ['results' => $data];

        return response()->json($data, 200);
    }
}
