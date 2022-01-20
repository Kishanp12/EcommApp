<?php

namespace App\Imports;
use App\Models\User;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    use Importable;

    public $user;

    public function __construct()
    {
        $this->user = User::pluck('id', 'newId')->toArray();

    }
    public function model(array $row)
    {
        return new Product([
            'newId'  => $row['id'],
            'product_name' => $row['product_name'],
            'description' => $row['description'],
            'style' => $row['style'],
            'brand' => $row['brand'],
            'url' => $row['url'],
            'product_type' => $row['product_type'],
            'shipping_price' => $row['shipping_price'],
            'note' => $row['note'],
            'admin_id' => $this->user[$row['admin_id']],
            'created_at' => $row['created_at'],
            'updated_at' => $row['updated_at'],
        ]);
    }

    public function batchSize(): int
    {
        return 300;
    }

    public function chunkSize(): int
    {
        return 300;
    }
}
