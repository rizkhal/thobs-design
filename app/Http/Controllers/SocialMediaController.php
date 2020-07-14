<?php

namespace App\Http\Controllers;

use App\Constants\Platform;
use App\DataTables\SocialMediaDataTable;
use App\Http\Requests\SocialMediaRequest;
use App\Repository\SocialMedia\SocialMediaRepo;

class SocialMediaController extends Controller
{
    protected $socialMedia;

    public function __construct(SocialMediaRepo $repo)
    {
        $this->socialMedia = $repo;
    }

    public function index(SocialMediaDataTable $dataTable)
    {
        return $dataTable->render('backend::social.index', [
            'platforms' => Platform::labels(),
        ]);
    }

    public function store(SocialMediaRequest $request)
    {
        if ($request->ajax()) {
            $this->socialMedia->save($request->all());
            return response()->json([
                'status'  => 'success',
                'message' => 'Berhasil menambah social media.',
            ], 200);
        }
    }

    public function destroy(string $id)
    {
        if (request()->ajax()) {
            $this->socialMedia->delete($id);
            return response()->json([
                'status'  => 'success',
                'message' => 'Berhasil menghapus social media.',
            ], 200);
        }
    }
}
