<?php

namespace App\Services;

use App\Repositories\Interfaces\UrlRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use JetBrains\PhpStorm\ArrayShape;


class UrlService {

    public static array $letters = ['a','b','c','e'];


    public UrlRepositoryInterface $urlRepository;

    public function __construct(UrlRepositoryInterface $urlRepository){
        $this->urlRepository = $urlRepository;
    }

    public function getUrl(&$url_start = '',&$j = null)
    {
        if (!empty($j)){
            $url_start = $url_start.self::$letters[$j-1];
        }
        $count = count(self::$letters) -1;

        for ($i=0; $i<=$count; $i++) {

            if (!empty($j)) {
                $url = $url_start.self::$letters[$i];
            } else {
                $url = $url_start.self::$letters[$i];
            }
            $url_count = $this->urlRepository->getByName($url)->count();

            if($url_count === 0) {
                $this->urlRepository->insert(array('name' => $url));
                return ['status' => 'success'];
            }
        }

        if ($count+1 === $j) {
            return ['status' => 'success'];
        }
        $j++;
        $this->getUrl($url_start,$j);
    }

    public function validate(Request $request): array
    {
        $input = $request->only('name');
        $rules = [
            'name' => 'required|max:255',
        ];
        $validator = Validator::make($input, $rules);

        if(!empty($validator->errors()->all())) {
            return ['status' => 'fail','message' => $validator->errors()->all()[0]];
        }
        return  ['status' => 'success'];
    }

}
