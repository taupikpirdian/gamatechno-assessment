<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public $title;
    public $base_url;
    public $transactionRepository;
    public $productRepository;
    public $accountRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        ProductRepositoryInterface $productRepository,
        AccountRepositoryInterface $accountRepository
    )
    {
        $this->title = "Transaction";
        $this->base_url = "/transaction";
        $this->transactionRepository = $transactionRepository;
        $this->productRepository = $productRepository;
        $this->accountRepository = $accountRepository;
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'title_sub2' => "List",
            'route_create' => "transaction.create",
            'datas' => $this->transactionRepository->listData()
        ];

        return view('dashboard.transaction.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => $this->title,
            'title_sub2' => "Create",
            'route_store' => "transaction.store",
            'products' => $this->productRepository->listData(),
            'customers' => $this->accountRepository->listCustomer(),
        ];
        return view('dashboard.transaction.create', $data);
    }

    public function check(Request $request)
    {
        $product_id = $request->product;
        $discount = $request->discount;

        $product = $this->productRepository->findById($product_id);
        if($product){
            $sub_total = $product->price;
            $cashback = $sub_total * $discount / 100;
            $total = $sub_total - $cashback;
            return response()->json([
                'success' => true,
                'sub_total' => $sub_total,
                'percent_discount' => $discount,
                'total' => $total,
                'cashback' => $cashback
            ]);
        }

        return response()->json([
            'success' => false,
            'sub_total' => 0,
            'percent_discount' => 0,
            'total' => 0,
            'cashback' => 0
        ]);
    }

    public function store(Request $request){
        $payment_user = (int) str_replace('.', '', $request->payment_user);
        $product_id = $request->product;
        $discount = $request->discount;
        $date = $request->date;
        $userId = $request->user_id;

        $product = $this->productRepository->findById($product_id);
        $customer = $this->accountRepository->findCustomerByUserId($userId);

        if($product){
            $sub_total = $product->price;
            $cashback = $sub_total * $discount / 100;
            $total = $sub_total - $cashback;

            if ($total > $payment_user){
                return response()->json([
                    'success' => false,
                    'message' => "Nominal Tidak Sesuai"
                ]);
            }

            $dto = [
                "customer_id" => $customer->id,
                "user_id" => $userId,
                "product_id" => $product_id,
                "no_transaction" => generateNoTrx(),
                "date" => convertDate($date),
                "total_amount" => $total,
                "discount" => $discount,
                "total_payment" => $payment_user,
                "cashback" => $cashback,
            ];
            $this->transactionRepository->store($dto);

            return response()->json([
                'success' => true,
                'message' => "Berhasil Simpan"
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => "Error"
        ]);
    }

    public function show($id)
    {
        $data = [
            'title' => $this->title,
            'title_sub2' => "Detail",
            'route_store' => "transaction.index",
            'transaction' => $this->transactionRepository->detail($id),
        ];
        return view('dashboard.transaction.show', $data);
    }
}
