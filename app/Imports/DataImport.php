<?php

namespace App\Imports;

use App\Models\Employee;
use App\Models\ExcelData;
use App\Models\studentdata;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
class DataImport implements ToModel , WithHeadingRow , WithBatchInserts
{
    private $files;
    public function __construct($a)
    {
        $this->a = $a;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row )
    {

        return new studentdata([
            'name' => $row['name'],
            'email' => $row['email'],
            'department' => $row['department'],
            'title' => $row['title'],
            'file_id' => $this->a,
        ]);

    }
    public function batchSize(): int
    {
        return 1000;
    }

}
