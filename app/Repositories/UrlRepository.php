<?php

namespace App\Repositories;
use App\Models\Url;
use App\Repositories\Interfaces\UrlRepositoryInterface;
use Illuminate\Support\Facades\DB;

class UrlRepository implements UrlRepositoryInterface
{
    public function all()
    {
        return Url::all();
    }

    public function getById($id)
    {
        return Url::find($id);
    }

    public function getByName(string $name)
    {
        return Url::where('name', $name)->get();
    }

    public function insert(array $url)
    {
        return  Url::create($url);
    }
}
