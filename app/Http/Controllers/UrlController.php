<?php

namespace App\Http\Controllers;


use App\Models\Board;
use App\Models\Url;
use Illuminate\Http\Request;

class UrlController extends Controller
{

    public static array $arrLetters = ['a','b','c','d'];

    public static string $host = 'https://site/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //$urls = Url::all();
        //
     //   $boards = Url::with('columns','name')->get();
      //  return view('board.index')->with('boards', $boards);
        $urls = Url::all();
        return view('url.index')->with('urls', $urls);
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
        //
//        $errors = $this->newsService->validate($request);
//        if(!empty($errors['message'])) {
//            return response()->json(['status' => 'fail', 'message' => $errors['message']]);
//        }
      //  $user = auth('api')->user();
       // Url::create(['name' => 'fdsfsd']);





        $url = new Url;
        $url->name = 'fdsfsd';

        if ($url->save()) {
            return view('url.index', ['urls' => Url::all() ]);
        } else {
            return view('url.index', ['urls' => Url::all() , 'errors' => 'Url doesnt created']);
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
