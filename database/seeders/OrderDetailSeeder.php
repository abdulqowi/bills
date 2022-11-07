<?php

namespace Database\Seeders;

use App\Models\OrderDetail;
use Illuminate\Database\Seeder;
use PhpOffice\PhpSpreadsheet\Calculation\Financial\Securities\Price;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for     ($i = 0; $i <51; $i++){
            OrderDetail::create([
                'user_id'       =>rand(1,51),
                'price'   =>('600000'),
                'quantity'      =>rand(0,36),
            ]);
        };
    }
}
