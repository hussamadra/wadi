<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeRequestIvoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'SN' => $this->SN,
            'governorate' => $this->governorate,
            'company_source' => $this->company_source,
            'company_name' => $this->company_name,
            'date' => $this->date,
            'duration' => $this->duration,
            'building' => $this->building,
            'floor' => $this->floor,
            'office' => $this->office,
            'hours' => $this->hours,
            'year' => $this->year,
            'code' => $this->code,
            'status_pay' => $this->status_pay,
            'status_contract' => $this->status_contract,

        ];
    }
}