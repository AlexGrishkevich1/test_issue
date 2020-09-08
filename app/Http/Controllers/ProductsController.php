<?php

namespace App\Http\Controllers;

use App\Repositories\Contracts\ProductsRepositoryInterface;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    //
    private $productsRepository;

    public function __construct(ProductsRepositoryInterface $productsRepository) {
        $this->productsRepository = $productsRepository;
    }

    public function indexApi(Request $request) {
        return $this->productsRepository->getAll($request->all());
    }

    public function index() {
        return view('products.index');
    }
}
