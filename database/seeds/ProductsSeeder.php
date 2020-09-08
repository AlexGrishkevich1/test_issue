<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function generateString(array $arr) {

        $quantity = rand(1 , count($arr));

        $rand = array_rand($arr, $quantity);

        if (is_array($rand)) {
            shuffle($rand);
        } else {
            $rand = [$rand];
        }

        $str = "";
        foreach ($rand as $key) {
            $str .= $arr[(int)$key] . " ";
        }

        return $str;
    }

    public function run()
    {
        //
        $pre = ['product', 'awesome', 'new', 'perfect', 'solution', 'something'];

        for($i = 1; $i <=1000; $i++) {

            $prodData = [
                'name' => $this->generateString($pre),
                'description' => $this->generateString($pre)
            ];
            \App\Models\Products::create($prodData);
        }
    }
}
