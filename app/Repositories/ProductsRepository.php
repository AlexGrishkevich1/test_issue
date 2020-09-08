<?php

namespace App\Repositories;

use App\Models\Products;
use App\Repositories\Contracts\ProductsRepositoryInterface;

class ProductsRepository implements ProductsRepositoryInterface {

    public function get(array $data = []) {

        return Products::paginate(config('app.per_page'));
    }

    public function getAll(array $data = []) {
        if (!empty($data['filter'])) return Products::orderBy($data['filter'])->get();
        return Products::all();
    }

    public function getById(int $id) {
        return Products::find($id);
    }
}
