<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            'nama' =>$row[1],
            'jenisKelamin' =>$row[2],
            'no_tlp' =>$row[3],
            'img' =>$row[4],

        ]);

    }
}
