<?php

use Illuminate\Database\Seeder;
use App\Models\Type_blood;
use Illuminate\Support\Facades\DB;

class BloodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_bloods')->delete();
        $bgs = ['O-','O+','A-','A+','AB+','AB-'];
        foreach ($bgs as $b) {
Type_blood::create(['blood_name' => $b]);
        }
    }
}
