<?php

namespace App\Http\Controllers;

use App\Http\Traits\ResponseFormatter;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ResponseFormatter;

    public function setMessageValidationError($validator) {
        $errorMessage = [];
        foreach ($validator->errors()->all() as $error) {
            array_push($errorMessage, $error);
        }
        return $errorMessage;
    }
}
