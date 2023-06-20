<?php

namespace App\Imports;

use App\Models\Barang;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BarangImport implements ToCollection, WithHeadingRow
{
  
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $barang = Barang::where('kode_barang', $row['kode_barang'])->exists();
            $cari = Barang::where('kode_barang', $row['kode_barang'])->first();

            if ($barang == null) {
                Barang::create([
                    'kode_barang' => $row['kode_barang'],
                    'nama_barang' => $row['nama_barang'],
                    'harga' => $row['harga'],
                    'harga_dollar' => $row['harga_dollar'],
                ]);
            } elseif ($barang != null) {
                $cari->update([
                    'kode_barang' => $row['kode_barang'],
                    'nama_barang' => $row['nama_barang'],
                    'harga' => $row['harga'],
                    'harga_dollar' => $row['harga_dollar'],
                ]);
            }
        }
    }
}
