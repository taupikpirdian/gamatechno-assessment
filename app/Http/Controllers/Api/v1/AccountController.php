<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AccountRequest;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    private $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository) {
        $this->accountRepository = $accountRepository;
    }

    public function update(){
        $validator = Validator::make(request()->all(), (new AccountRequest())->rules());
        if ($validator->fails()) return $this->error(400, parent::setMessageValidationError($validator), true);
        return $this->success($this->accountRepository->updateDataCustomer(request()->all()), "Success");
    }
}
