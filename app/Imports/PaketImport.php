<?php

namespace App\Imports;

use App\Paket;
use Maatwebsite\Excel\Concerns\ToModel;

class PaketImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Paket([
            'nama_paket'=>$row[0],
            'harga_paket'=>$row[1],
            'perpanjangan'=>$row[2]
        ]);
    }
}
