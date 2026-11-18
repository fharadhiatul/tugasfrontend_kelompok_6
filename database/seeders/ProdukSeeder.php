<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode' => 'BK-001', 'nama' => 'Laskar Pelangi', 'kategori' => 'Buku', 'harga' => 89000, 'stok' => 14, 'rak' => 'A-03', 'lorong' => 'Lorong A', 'is_active' => true],
            ['kode' => 'BK-002', 'nama' => 'Bumi Manusia', 'kategori' => 'Buku', 'harga' => 115000, 'stok' => 6, 'rak' => 'A-05', 'lorong' => 'Lorong A', 'is_active' => true],
            ['kode' => 'BK-003', 'nama' => 'Filosofi Teras', 'kategori' => 'Buku', 'harga' => 98000, 'stok' => 0, 'rak' => 'B-01', 'lorong' => 'Lorong B', 'is_active' => true],
            ['kode' => 'BK-004', 'nama' => 'Negeri 5 Menara', 'kategori' => 'Buku', 'harga' => 95000, 'stok' => 9, 'rak' => 'A-04', 'lorong' => 'Lorong A', 'is_active' => true],
            ['kode' => 'AT-001', 'nama' => 'Pulpen Gel Hitam 0.5mm', 'kategori' => 'Alat tulis', 'harga' => 12000, 'stok' => 45, 'rak' => 'C-02', 'lorong' => 'Lorong C', 'is_active' => true],
            ['kode' => 'AT-002', 'nama' => 'Buku Tulis Campus 50 Lembar', 'kategori' => 'Alat tulis', 'harga' => 18500, 'stok' => 22, 'rak' => 'C-01', 'lorong' => 'Lorong C', 'is_active' => true],
        ];

        foreach ($data as $item) {
            Produk::firstOrCreate(['kode' => $item['kode']], $item);
        }
    }
}
