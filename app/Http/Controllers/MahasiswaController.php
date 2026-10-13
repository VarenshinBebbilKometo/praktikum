<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class MahasiswaController extends Controller
{

    // Menampilkan halaman profil mahasiswa
    public function profil()
    {
        $nama = "Varenshin Bebbil Kometo";
        $nim = "242520115";
        $prodi = "Teknologi Informasi";

        return view('mahasiswa.profil', compact(
            'nama',
            'nim',
            'prodi'
        ));
    }

    // Menampilkan daftar seluruh mahasiswa
    public function daftar()
    {
        $mahasiswa = [
            [
                'nama' => 'Andi',
                'nim' => '23001',
                'ipk' => 3.8
            ],
            [
                'nama' => 'Budi',
                'nim' => '23002',
                'ipk' => 3.2
            ],
            [
                'nama' => 'Citra',
                'nim' => '23003',
                'ipk' => 2.8
            ],
            [
                'nama' => 'Dina',
                'nim' => '23004',
                'ipk' => 3.6
            ],
            [
                'nama' => 'Eka',
                'nim' => '23005',
                'ipk' => 2.5
            ],
            [
                'nama' => 'Fajar',
                'nim' => '23006',
                'ipk' => 1.8
            ],
        ];


        return view('mahasiswa.daftar', compact('mahasiswa'));
    }

    // Menampilkan detail mahasiswa berdasarkan NIM
    public function detail($nim)
    {

        $mahasiswa = [
            [
                'nama' => 'Andi',
                'nim' => '23001',
                'ipk' => 3.8
            ],
            [
                'nama' => 'Budi',
                'nim' => '23002',
                'ipk' => 3.2
            ],
            [
                'nama' => 'Citra',
                'nim' => '23003',
                'ipk' => 2.8
            ],
            [
                'nama' => 'Dina',
                'nim' => '23004',
                'ipk' => 3.6
            ],
            [
                'nama' => 'Eka',
                'nim' => '23005',
                'ipk' => 2.5
            ],
        ];


        foreach ($mahasiswa as $mhs) {

            if ($mhs['nim'] == $nim) {

                return view('mahasiswa.detail', [
                    'mahasiswa' => $mhs
                ]);

            }

        }


        abort(404);
    }

}