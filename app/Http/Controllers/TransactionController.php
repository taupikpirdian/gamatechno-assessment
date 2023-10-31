<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public $title;
    public $base_url;
    public $transactionRepository;
    public $productRepository;

    public function __construct(
        TransactionRepositoryInterface $transactionRepository,
        ProductRepositoryInterface $productRepository
    )
    {
        $this->title = "Transaction";
        $this->base_url = "/transaction";
        $this->transactionRepository = $transactionRepository;
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $data = [
            'title' => $this->title,
            'title_sub2' => "List",
            'route_create' => "transaction.create"
        ];
        return view('dashboard.transaction.index', $data);
    }

    public function create()
    {
        $data = [
            'title' => $this->title,
            'title_sub2' => "Create",
            'route_store' => "transaction.store",
            'products' => $this->productRepository->listData()
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
}
