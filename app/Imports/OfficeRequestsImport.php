<?php

namespace App\Imports;

use App\Models\Building;
use App\Models\Customer;
use App\Models\Floor;
use App\Models\Governorate;
use App\Models\Office;
use App\Models\OfficeRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class OfficeRequestsImport implements ToModel,WithStartRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
//        dd($row);
//        if ($row[2]==null||$row[2]=='')
//            return;
//        $customer=Customer::where('name',$row[1])->first();
//        if(!$customer){
//            $customer=Customer::create([
//                'name'=>$row[1],
//                'mobile'=>$row[11],
//                'email'=>'none',
//                'company_name'=>$row[2]
//            ]);
//        }
//        $gov=Governorate::where('name',$row[4])->first();
//        if (!$gov){
//            $gov=Governorate::create([
//                'name'=>$row[4],
//                'code'=>'DD'
//            ]);
//        }
//        $building=Building::where('code','B'.$row[5])->where('gov_id',$gov->id)->first();
//        if (!$building){
//            $building=Building::create([
//                'name'=>' المبنى '.$row[5],
//                'gov_id'=>$gov->id,
//                'code'=>'B'.$row[5]
//            ]);
//        }
//        $floor=Floor::where('code',$row[6])->where('building_id',$building->id)->first();
//        if(!$floor){
//            $floor=Floor::create([
//                    'number'=>$row[6],
//                    'building_id'=>$building->id,
//                    'code'=>$row[6]
//            ]);
//        }
//        $office=Office::where('code',$row[7])->where('floor_id',$floor->id)->first();
//        if(!$office){
//            $office=Office::create([
//                    'name'=>' المكتب '.$row[7],
//                    'floor_id'=>$floor->id,
//                    'code'=>$row[7]
//            ]);
//        }
//
//        return new OfficeRequest([
//            'id'=>$row[0],
//            'user_id'=>User::first()->id,
//            'customer_id'=>$customer->id,
//            'code'=>$row[3],
//            'gov_id'=>$gov->id,
//            'building_id'=>$building->id,
//            'floor_id'=>$floor->id,
//            'office_id'=>$office->id,
//            'hours'=>$row[8],
//            'value'=>$row[9],
//            'date_from'=>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]))->format('Y-m-d'),
//            'date_to'=>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[10]))->addYear()->format('Y-m-d'),
//            'contract_woner'=>$row[12],


//        ]);
        return new OfficeRequest([
            'SN'=>$row[0],
            'governorate'=>$row[1],
            'company_source'=>$row[2],
            'company_name'=>$row[3],
            'date'=>Carbon::parse(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[4]))->format('Y/m/d'),
            'duration'=>$row[5],
            'building'=>$row[6],
            'floor'=>$row[7],
            'office'=>$row[8],
            'hours'=>$row[9],
            'year'=>$row[10],
            'code'=>$row[11],
            'status_pay'=>$row[12],
            'status_contract'=>$row[13]
        ]);
    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [

        ];
    }
}
