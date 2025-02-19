<?php

namespace App\Imports;

use App\Models\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ClientsImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2; 
    }

    public function model(array $row)
    {
        if (empty(trim($row[0] ?? '')) || empty(trim($row[1] ?? '')) || empty(trim($row[2] ?? '')) || empty(trim($row[3] ?? '')) || empty(trim($row[4] ?? ''))) {
            return null;
        }

        return new Client([
            'first_name'    => trim($row[0] ?? ''),
            'last_name'     => trim($row[1] ?? ''),
            'email'         => trim($row[2] ?? ''),
            'phone_number'  => trim($row[3] ?? ''),
            'city'          => trim($row[4] ?? ''),
        ]);
    }
}
