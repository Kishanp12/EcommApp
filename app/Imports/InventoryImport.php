<?php

namespace App\Imports;
use App\Models\Inventory;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class InventoryImport implements ToModel, WithHeadingRow, WithChunkReading, WithBatchInserts
{
    use Importable;

    public $productId;

    public function __construct()
    {
        $this->productId = Product::pluck('id', 'newId')->toArray();
    }

    public function model(array $row)
    {
        return new Inventory([
            'newId'  => $row['id'],
            'product_id' => $this->productId[$row['product_id']],
            'quantity' => $row['quantity'],
            'color' => $row['color'],
            'size' => $row['size'],
            'weight' => $row['weight'],
            'price_cents' => $row['price_cents'],
            'sale_price_cents' => $row['sale_price_cents'],
            'cost_cents' => $row['cost_cents'],
            'sku' => $row['sku'],
            'length' => $row['length'],
            'width' => $row['width'],
            'height' => $row['height'],
            'note' => $row['note'],
        ]);

        dd('hello');

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
