<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Repositories\Interfaces\AccountRepositoryInterface;

class AuthController extends Controller
{
    private $accountRepository;

    public function __construct(AccountRepositoryInterface $accountRepository) {
        $this->accountRepository = $accountRepository;
    }
    
    /**
     * register
     */
    public function register() {
        $rules = (new UserRequest())->rules();
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) return $this->error(400, parent::setMessageValidationError($validator), true);
        
        DB::beginTransaction();
        try {
            $user = $this->accountRepository->createUser(
                [
                    'name' => request()->name,
                    'email' => request()->email,
                    'password' => request()->password
                ]
            );
            $user->assignRole('customer');

            $this->accountRepository->createCustomer(
                [
                    'user_id' => $user->id,
                    'name' => request()->name
                ]
            );
            DB::commit();
            return $this->success('Akun Berhasil Dibuat');
        }catch (\Exception $e) {
            DB::rollback();
            Log::error($e->getMessage());
            return $this->errorCode('Terjadi Kesalahan error');
        }
    }
    /**
     *
     * login function
     */
    public function login()
    {
        $rules = (new UserRequest())->rulesLogin();
        $validator = Validator::make(request()->all(), $rules);
        if ($validator->fails()) return $this->error(400, parent::setMessageValidationError($validator), true);

        $credentials = request()->only('email', 'password');
        $user = User::whereEmail($credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            $token = $user->createToken('authToken')->plainTextToken;
            $data = $user->api_response;

            $data['name'] = $user->name;
            $data['email'] = $user->email;
            $data = array('token' => $token, 'user' => $data);
            return $this->success($data, "Login Berhasil");
        }

        return $this->error(400, "Bad Request");
    }
}
