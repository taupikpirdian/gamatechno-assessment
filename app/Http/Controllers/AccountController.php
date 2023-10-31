<?php

namespace App\Http\Controllers;

use App\Http\Requests\AccountRequest;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\AccountRepositoryInterface;

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
