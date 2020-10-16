<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Product([
            'name' => $row['nama'],
            'price' => $row['harga'],
            'size' => $row['ukuran'],
            'color' => $row['warna'],
            'category' => $row['kategori'],
            'description' => $row['deskripsi'],
            'image' => $row['fotoproduk'],
            'quantity' => $row['stok'],
        ]);
    }
}
