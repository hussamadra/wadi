<?php

namespace Database\Seeders;

use App\Models\RentCategory;
use App\Models\RentPlan;
use App\Models\RentType;
use App\TermConstants;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        RentType::create([
//            'name' => 'مساحات عمل'
//        ]);
//        RentType::create([
//            'name' => 'المكاتب المشتركة'
//        ]);
//        RentType::create([
//            'name' => 'مكاتب العمل'
//        ]);

//        $role = Role::create([
//            'name' => 'تشاركي'
//        ]);
//        $permissions = [];
////
//        $permissions[] = Permission::where([
//            'name' => 'pending_services_serves.create'
//        ])->first();
//        $permissions[] = Permission::where([
//            'name' => 'pending_services_serves.edit'
//        ])->first();;
//        $permissions[] = Permission::where([
//            'name' => 'pending_services_serves.delete'
//        ])->first();;
//        $permissions[] = Permission::where([
//            'name' => 'pending_services_serves.show'
//        ])->first();;
//
//
////        $role->givePermissionTo($permissions);
//        $adminRole = Role::where('name', 'مدير عام')->first();
//        $adminRole = Role::where('name', 'مدير تقني')->first();
//        $adminRole->givePermissionTo($permissions);


//        RentCategory::create([
//            'name'=>'hot desk'
//        ]);
//
//        RentCategory::create([
//            'name'=>'Did bus'
//        ]);
//
//        RentCategory::create([
//            'name'=>'personal'
//        ]);
//
//        RentCategory::create([
//            'name'=>'S'
//        ]);
//
//        RentCategory::create([
//            'name'=>'M'
//        ]);
//        RentCategory::create([
//            'name'=>'L'
//        ]);
//        RentCategory::create([
//            'name'=>'VIP'
//        ]);
        RentPlan::create([
            'name' => 'ساعة',
            'unit' => TermConstants::HOUR,
            'count' => 1
        ]);

        RentPlan::create([
            'name' => 'يوم',
            'unit' => TermConstants::DAY,
            'count' => 1
        ]);


        RentPlan::create([
            'name' => 'اسبوع',
            'unit' => TermConstants::WEEK,
            'count' => 1
        ]);


        RentPlan::create([
            'name' => 'شهر',
            'unit' => TermConstants::MONTH,
            'count' => 1
        ]);

        RentPlan::create([
            'name' => '3 اشهر',
            'unit' => TermConstants::MONTH,
            'count' => 3
        ]);

        RentPlan::create([
            'name' => '6 اشهر',
            'unit' => TermConstants::MONTH,
            'count' => 6
        ]);

        RentPlan::create([
            'name' => 'سنة',
            'unit' => TermConstants::YEAR,
            'count' => 1
        ]);
    }
}
