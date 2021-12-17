<?php

use Illuminate\Database\Seeder;
use App\Models\Specialization;
use Illuminate\Support\Facades\DB;

class SpecialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specializations')->delete();
        $ss = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
        ];
        foreach ($ss as $s) {
            Specialization::create(['name_special' => $s]);
        }
    }
}
