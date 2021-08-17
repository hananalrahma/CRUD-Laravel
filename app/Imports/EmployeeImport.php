<?php

namespace App\Imports;

use App\employee;
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
        return new employee([
            //
            'nama' => $row[1],
            'jabatan' => $row[2],
            'umur' => $row[3],
            'email' => $row[4],
            'alamat' => $row[5],
            'no_hp' => $row[6],
        ]);
    }
}
