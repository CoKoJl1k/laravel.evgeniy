<?php

namespace App\Http\Controllers;


use App\Repositories\Interfaces\UrlRepositoryInterface;
use App\Services\UrlService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UrlController extends Controller
{

    public UrlRepositoryInterface $urlRepository;
    public UrlService $urlService;

    public function __construct(UrlService $urlService, UrlRepositoryInterface $urlRepository)
    {
        $this->urlRepository = $urlRepository;
        $this->urlService = $urlService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $urls = $this->urlRepository->all();
        return view('url.index', ['urls' => $urls ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $urls = $this->urlRepository->all();

        $errors = $this->urlService->validate($request);

        if(!empty($errors['message'])) {
            return view('url.index', ['urls' => $urls , 'message' => $errors['message']]);
          //  return response()->json(['status' => 'fail', 'message' => $errors['message']]);
        }

        var_dump($request->name);

        $chars = preg_split("/\//", $request->name, -1, PREG_SPLIT_NO_EMPTY);
        print_r($chars);

        $url_start = $chars[0].'//'.$chars[1].'/';
        $this->urlService->getUrl($url_start);

        $id = DB::getPdo()->lastInsertId();
        $url =  $this->urlRepository->getById($id);


        if (!empty($url)) {
            return view('url.index', ['url' => $url,'urls' => $urls ]);
        } else {
            return view('url.index', ['urls' => $urls , 'message' => 'Url doesnt created']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
