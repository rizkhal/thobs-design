<?php

namespace App\Http\Controllers\Url;

use App\DataTables\ShortenerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\UrlRequest;
use App\Models\Url;
use App\Repository\Shortener\UrlRepo;

class UrlController extends Controller
{
    protected $urlRepo;

    public function __construct(UrlRepo $url)
    {
        $this->urlRepo = $url;
    }

    /**
     * List all of the url
     * @param  ShortenerDataTable $dataTable [description]
     * @return \Illumintae\Http\Response
     */
    public function index(ShortenerDataTable $dataTable)
    {
        return $dataTable->render('backend::shortener.index');
    }

    /**
     * View create page
     *
     * @return \Illumintae\Http\Response
     */
    public function create()
    {
        return view('backend::shortener.create');
    }

    /**
     * Short the url
     *
     * @param  UrlRequest $request
     * @return \Illumintae\Http\Response
     */
    public function store(UrlRequest $request)
    {
        if ($this->urlRepo->shortenUrl(logged_in_user()->id, $request->data())) {
            notice('success', 'Successfully shortened the url');
            return redirect()->route('admin.shortener.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }

    /**
     * View edit the url
     * @param  string $id
     * @return \Illumintae\Http\Response
     */
    public function edit(string $id)
    {
        return view('backend::shortener.edit', [
            'url' => $this->urlRepo->findUrl($id),
        ]);
    }

    /**
     * Update the url
     *
     * @param  string $id
     * @param  array  $data
     * @return \Illumintae\Http\Response
     */
    public function update(UrlRequest $request, string $id)
    {
        if ($this->urlRepo->edit($id, $request->data())) {
            notice('success', 'Successfully update the url');
            return redirect()->route('admin.shortener.index');
        } else {
            notice('danger', 'Something went wrong, please contact the administrator.');
            return redirect()->back();
        }
    }

    /**
     * Delete the shortened url
     * @param  string $id
     * @return \Illumintae\Http\Response
     */
    public function destroy(string $id)
    {
        if ($this->urlRepo->delete($id)) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Successfully delete the url',
            ], 200);
        } else {
            return response()->json([
                'status'  => 'danger',
                'message' => 'Something went wrong, please contact the administrator.',
            ], 500);
        }
    }
}
