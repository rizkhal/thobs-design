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
        $this->middleware("role:super-admin");

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
        if ($this->socialMedia->save($request->data())) {
            notice('success', 'Successfully save the social media.');
            return redirect()->route('admin.setting.social.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->route('admin.setting.social.index');
        }
    }

    public function edit(string $id)
    {
        return $this->socialMedia->edit($id);
    }

    public function update(SocialMediaRequest $request)
    {
        if ($this->socialMedia->update($request->data())) {
            notice('success', 'Successfully update the social media.');
            return redirect()->route('admin.setting.social.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->route('admin.setting.social.index');
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
