<?php

namespace Database\Seeders;

use App\Models\Furniture;
use Illuminate\Database\Seeder;

class FurnitureSeeder extends Seeder
{
    public function run(): void
    {
        // Nama file di kolom "image" harus sama dengan file di public/assets/images/
        $items = [
            ['Sofa Minimalis Modern', 'Sofa', 'Kain premium', 2500000, '200 x 85 x 80 cm', 'sofa-minimalis.jpg',
                'Sofa tiga dudukan dengan garis bersih dan busa padat yang tidak cepat kempis. Cocok untuk ruang tamu, ruang keluarga, maupun ruang santai.'],
            ['Sofa L Scandinavian', 'Sofa', 'Kain linen, rangka kayu karet', 4750000, '260 x 160 x 82 cm', 'sofa-l-scandinavian.jpg',
                'Sofa sudut berbentuk L dengan kaki kayu ramping. Sarung bisa dilepas dan dicuci, jadi gampang dirawat.'],
            ['Sofa Bed Lipat', 'Sofa', 'Kulit sintetis', 3150000, '190 x 90 x 75 cm', 'sofa-bed-lipat.jpg',
                'Siang jadi tempat duduk, malam jadi tempat tidur. Pilihan pas untuk rumah dengan ruang terbatas atau kamar tamu.'],

            ['Meja Makan Kayu Jati', 'Meja', 'Kayu jati', 3200000, '160 x 90 x 75 cm', 'meja-makan-jati.jpg',
                'Meja makan enam kursi dari kayu jati dengan serat yang terlihat jelas. Finishing doff supaya tahan noda sehari-hari.'],
            ['Meja Tamu Round', 'Meja', 'Kayu mahoni', 1350000, 'Diameter 80 x 45 cm', 'meja-tamu-round.jpg',
                'Meja tamu bulat tanpa sudut tajam, aman untuk rumah dengan anak kecil. Permukaannya cukup lega untuk nampan dan vas.'],
            ['Meja Kerja Minimalis', 'Meja', 'Plywood dan rangka besi', 1450000, '120 x 60 x 75 cm', 'meja-kerja-minimalis.jpg',
                'Meja kerja dengan rangka besi kokoh dan laci kecil di bawah papan. Cukup untuk laptop, monitor, dan alat tulis.'],

            ['Kursi Minimalis', 'Kursi', 'Kain dan kaki kayu', 850000, '60 x 62 x 85 cm', 'kursi-minimalis.jpg',
                'Kursi santai dengan sandaran melengkung yang nyaman untuk duduk lama. Cocok di sudut baca atau kamar tidur.'],
            ['Kursi Kantor Ergonomis', 'Kursi', 'Mesh dan nilon', 1600000, '65 x 65 x 110 cm', 'kursi-kantor-ergonomis.jpg',
                'Sandaran mesh yang sejuk, tinggi dudukan bisa diatur, dan roda halus untuk lantai keramik maupun kayu.'],
            ['Kursi Makan Rotan', 'Kursi', 'Rotan alami, kayu mahoni', 720000, '45 x 50 x 85 cm', 'kursi-makan-rotan.jpg',
                'Anyaman rotan di sandaran memberi tampilan hangat dan membuat sirkulasi udara tetap enak.'],

            ['Lemari Pakaian 2 Pintu', 'Lemari', 'MDF finishing duco', 2800000, '120 x 55 x 200 cm', 'lemari-pakaian.jpg',
                'Dua pintu dengan rak gantung dan susun di dalam. Pegangan tersembunyi membuat tampilannya rata dan rapi.'],
            ['Lemari Pakaian Sliding', 'Lemari', 'Plywood finishing HPL', 3600000, '180 x 60 x 210 cm', 'lemari-sliding.jpg',
                'Pintu geser hemat ruang untuk kamar yang sempit. Bagian dalam dibagi menjadi area gantung, rak, dan laci.'],
            ['Lemari Sepatu', 'Lemari', 'Kayu pinus', 950000, '80 x 30 x 100 cm', 'lemari-sepatu.jpg',
                'Muat sampai 12 pasang sepatu dengan sirkulasi udara di sisi belakang agar tidak lembap.'],

            ['Tempat Tidur Minimalis', 'Tempat Tidur', 'Kayu mahoni', 4500000, '200 x 160 x 95 cm', 'tempat-tidur-minimalis.jpg',
                'Ranjang ukuran queen dengan headboard rendah dan rangka yang kokoh. Tanpa suara berderit saat dipakai.'],
            ['Tempat Tidur Anak', 'Tempat Tidur', 'Kayu pinus', 2900000, '200 x 100 x 90 cm', 'tempat-tidur-anak.jpg',
                'Dilengkapi pagar pengaman di sisi samping dan cat berbahan air yang aman untuk anak.'],

            ['Rak Buku Minimalis', 'Rak', 'Kayu pinus', 1900000, '90 x 30 x 180 cm', 'rak-buku-minimalis.jpg',
                'Lima tingkat dengan rak yang kuat menahan buku tebal. Bisa juga dipakai untuk pajangan dan tanaman kecil.'],
            ['Rak TV Kayu', 'Rak', 'Kayu mahoni', 1750000, '150 x 40 x 50 cm', 'rak-tv.jpg',
                'Rak TV rendah dengan dua pintu dan ruang terbuka untuk perangkat. Lubang kabel sudah disediakan di belakang.'],

            ['Pot Keramik Besar', 'Dekorasi', 'Keramik glasir', 280000, 'Diameter 30 x 35 cm', 'pot-keramik.jpg',
                'Pot keramik berglasir matte dengan lubang drainase. Pas untuk tanaman hias berukuran sedang.'],
            ['Lampu Meja Rotan', 'Dekorasi', 'Rotan dan kayu', 450000, 'Diameter 28 x 45 cm', 'lampu-meja-rotan.jpg',
                'Kap anyaman rotan menyaring cahaya menjadi hangat. Cocok di meja samping tempat tidur.'],
            ['Cermin Dinding Oval', 'Dekorasi', 'Kaca dan bingkai kayu', 620000, '60 x 90 cm', 'cermin-oval.jpg',
                'Cermin oval berbingkai kayu tipis, tinggal digantung. Membuat ruangan terasa lebih luas.'],
        ];

        foreach ($items as [$name, $category, $material, $price, $dimensions, $image, $description]) {
            Furniture::updateOrCreate(
                ['name' => $name],
                compact('category', 'material', 'price', 'dimensions', 'image', 'description')
            );
        }
    }
}
