<?php

use Illuminate\Database\Seeder;
use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                        $grades = [
            ['en'=> 'Primary stage', 'ar'=> 'المرحلة الإبتدائية'],
            ['en'=> 'Middle Stage', 'ar'=> 'المرحلة الإعدادية '],
            ['en'=> 'High Stage', 'ar'=> 'المرحلة الثانوية'],
        ];
        foreach ($bgs as $b) {
Grade::create(['blood_name' => $b]);
        }
    }
    }
}
