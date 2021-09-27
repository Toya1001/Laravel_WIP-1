<?php

namespace Database\Seeders;

use App\Models\StudentSelection;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class studentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = [0,2011,3012,3018,3048,5015,6013,6128];
            for ($i = 1;$i<6;$i++){

                StudentSelection::create([
                    'id'=>$i,
                    'user_id'=> $i,
                    'course_id'=> $course[$i],
                    'enroll_dt'=> now(),
                    'is_approved'=> 0,
                ]);
            }
        }  
}
