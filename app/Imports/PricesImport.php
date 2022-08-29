<?php

namespace App\Imports;

use App\Models\Price;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PricesImport implements ToModel
{
    public function rules(): array
    {
        return [
            '1' => Rule::in(['patrick@maatwebsite.nl']),

             // Above is alias for as it always validates in batches
             '*.1' => Rule::in(['patrick@maatwebsite.nl']),
             
             // Can also use callback validation rules
             '0' => function($attribute, $value, $onFailure) {
                  if ($value !== 'Patrick Brouwers') {
                       $onFailure('Name is not Patrick Brouwers');
                  }
              }
        ];
    }

    public function sheets(): array
    {
        return [
            new FirstSheetImport()
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Price([
            'name' => $row[0],
        ]);
    }

    public function arrayToCell(array $row){

    }
}
