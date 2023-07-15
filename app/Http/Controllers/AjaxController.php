<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\UrlRepositoryInterface;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    public UrlRepositoryInterface $urlRepository;
    public UrlService $urlService;

    public function __construct(UrlService $urlService, UrlRepositoryInterface $urlRepository){

        $this->urlRepository = $urlRepository;
        $this->urlService = $urlService;
    }
    public function index(Request $request)
    {
        $errors = $this->urlService->validate($request);

        if(!empty($errors['message'])) {
            return response()->json(array('message'=>  $errors['message']));
        }

        $chars = preg_split("/\//", $request->name, -1, PREG_SPLIT_NO_EMPTY);
        $url_host = $chars[0].'//'.$chars[1].'/';
        $this->urlService->getUrl($url_host);

        $id = DB::getPdo()->lastInsertId();
        $url =  $this->urlRepository->getById($id);

        if(!empty($url)) {
            return response()->json(array('url' => $url));
        } else {
            return response()->json(array('msg'=> 'Url doesnt created.'));
        }
    }
}
