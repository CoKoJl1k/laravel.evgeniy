<?php


namespace App\Repositories\Interfaces;


interface UrlRepositoryInterface
{
    public function all();
    public function getById($id);
}
