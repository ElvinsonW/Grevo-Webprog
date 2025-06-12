<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            "name" => "", 
            "slug" => "", 
            "product_category_id" => 1, 
            "weight" => 40, 
            "material" => "", 
            "process" => "", 
            "certification" => "", 
            "description" => ""
        ]);

        Product::create([
            "name" => "Deodoran Batu Tawas", 
            "slug" => "deodoran-batu-tawas", 
            "product_category_id" => 1, 
            "weight" => 180, 
            "material" => "Kalium aluminium sulfat alami (mineral bumi)", 
            "process" => "Batu tawas berasal dari tambang mineral alami. Setelah ditambang, mineral diproses melalui metode pemurnian fisik seperti pencucian dan pemotongan tanpa menggunakan bahan kimia tambahan. Batu tawas kemudian dikeringkan secara alami untuk mempertahankan kualitasnya. Produk ini dikemas dengan kertas daur ulang atau tanpa kemasan sama sekali untuk mengurangi limbah.", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Batu tawas alami adalah deodoran mineral murni yang efektif dan bebas bahan kimia berbahaya. Ramah lingkungan karena proses produksinya minimal dan dapat terurai secara alami, mengurangi jejak karbon Anda. Juga berfungsi sebagai astringen dan penghenti pendarahan kecil"
        ]);

        Product::create([
            "name" => "Reusable Cotton Pad", 
            "slug" => "reuseable-cotton-pad", 
            "product_category_id" => 1, 
            "weight" => 40, 
            "material" => "Kalium aluminium sulfat alami (mineral bumi)", 
            "process" => "Kapas organik ditanam tanpa pestisida atau bahan kimia berbahaya. Setelah dipanen, kapas diproses menjadi benang dan ditenun menjadi kain. Kain ini dipotong dan dijahit menjadi bantalan kapas yang lembut. Proses ini menghindari penggunaan pemutih dan pewarna sintetis untuk menjaga keamanannya bagi kulit dan lingkungan.", 
            "certification" => "GOTS (Global Organic Textile Standard)", 
            "description" => "Kapas kain organik yang lembut dan dapat dicuci ulang, sangat cocok untuk membersihkan wajah, mengaplikasikan toner, atau kebutuhan bayi. Mengurangi limbah kapas sekali pakai secara drastis, menjadikannya pilihan berkelanjutan untuk rutinitas kecantikan dan kebersihan Anda"
        ]);

        Product::create([
            "name" => "Sikat Gigi", 
            "slug" => "sikat-gigi", 
            "product_category_id" => 1, 
            "weight" => 20, 
            "material" => "Gagang yang biodegradable, bulu sikat nilon bebas BPA atau bulu sikat dari arang bambu", 
            "process" => "Gagang sikat gigi dibuat dari bahan biodegradable seperti bambu, yang dipotong dan dihaluskan secara manual. Bulu sikat terbuat dari nilon bebas BPA atau arang bambu yang aman bagi kesehatan. Semua komponen dirakit dengan presisi dan dikemas dalam kotak kertas daur ulang untuk menghindari limbah plastik.", 
            "certification" => "FSC (Forest Stewardship Council)", 
            "description" => "Sikat gigi kayu ini adalah alternatif ramah lingkungan yang sempurna untuk sikat gigi plastik. Gagangnya biodegradable dan bulu sikatnya efektif membersihkan gigi. Membantu Anda mengurangi sampah plastik sambil menjaga kebersihan mulut"
        ]);

        Product::create([
            "name" => "Pasta Gigi", 
            "slug" => "pasta-gigi", 
            "product_category_id" => 1, 
            "weight" => 250, 
            "material" => "Kalsium karbonat, xylitol, baking soda, sodium cocoyl isethionate, mint alami, dll", 
            "process" => "Bahan utama seperti kalsium karbonat dan xylitol dicampur dengan baking soda dan minyak mint alami. Proses ini dilakukan tanpa bahan kimia sintetis atau pewarna. Pasta gigi kemudian dikemas dalam tube ramah lingkungan yang terbuat dari material yang dapat terurai atau didaur ulang.", 
            "certification" => "COSMOS Natural/Organic", 
            "description" => "Pasta gigi ini adalah inovasi tanpa limbah yang membersihkan gigi secara efektif dan menyegarkan napas. Cukup kunyah satu tablet, sikat, dan rasakan perbedaannya. Bebas fluoride, sulfat, dan kemasan plastik, mendukung gaya hidup zero waste"
        ]);

        Product::create([
            "name" => "ToteBag Kanvas", 
            "slug" => "totebag-kanvas", 
            "product_category_id" => 1, 
            "weight" => 400, 
            "material" => "100% kanvas katun organik bersertifikat", 
            "process" => "Penanaman kapas organik, penenunan kanvas, pemotongan, penjahitan, dan finishing. Dicetak dengan tinta ramah lingkungan", 
            "certification" => "GOTS (Global Organic Textile Standard)", 
            "description" => "Totebag kanvas katun organik ini adalah pengganti kantong plastik sekali pakai yang stylish dan berkelanjutan. Kuat, tahan lama, dan serbaguna untuk belanja, membawa buku, atau penggunaan sehari-hari. Pilihan sadar lingkungan untuk mengurangi jejak plastik Anda"
        ]);

        Product::create([
            "name" => "Sabun Mandi Batang", 
            "slug" => "sabun-mandi-batang", 
            "product_category_id" => 1, 
            "weight" => 120, 
            "material" => "Minyak kelapa, minyak sawit, soda api (NaOH), gliserin, pewangi, pewarna, ekstrak alami", 
            "process" => "Proses pembuatan sabun batang dimulai dengan mencampur minyak alami seperti kelapa atau zaitun dengan soda api untuk memicu reaksi saponifikasi. Pewarna dan pewangi dari ekstrak tumbuhan ditambahkan sebelum campuran dituangkan ke dalam cetakan. Sabun ini kemudian dibiarkan mengeras secara alami sebelum dipotong dan dikemas", 
            "certification" => "Ekolabel Indonesia dan RSPO (Roundtable on Sustainable Palm Oil)", 
            "description" => "Sabun mandi batang dengan busa melimpah, membersihkan kulit secara lembut tanpa membuatnya kering. Diperkaya dengan ekstrak alami untuk keharuman dan nutrisi kulit"
        ]);

        Product::create([
            "name" => "Sisir Rambut Kayu", 
            "slug" => "sisir-rambut-kayu", 
            "product_category_id" => 1, 
            "weight" => 40, 
            "material" => "Kayu cendana", 
            "process" => "Kayu alami dipilih dengan cermat untuk memastikan kualitas terbaik. Kayu dipotong sesuai ukuran dan dihaluskan untuk menciptakan permukaan yang lembut. Setelah itu, sisir dirakit tanpa bahan tambahan seperti lem kimia dan diberi lapisan minyak alami untuk meningkatkan daya tahan.", 
            "certification" => "FSC (Forest Stewardship Council)", 
            "description" => "Sisir rambut dari kayu alami yang ramah lingkungan, lembut di kulit kepala, dan membantu mengurangi rambut kusut. Desain ergonomis dan tahan lama."
        ]);

        Product::create([
            "name" => "Buku Catatan Daur Ulang", 
            "slug" => "buku-catatan-daur-ulang", 
            "product_category_id" => 1, 
            "weight" => 500, 
            "material" => "Kertas daur ulang, karton daur ulang untuk sampul, spiral kawat/benang daur ulang", 
            "process" => "Kertas bekas dikumpulkan dan dihancurkan menjadi pulp sebelum dicetak ulang menjadi lembaran kertas baru. Karton untuk sampul buku juga terbuat dari bahan daur ulang. Buku ini dirakit dan dijilid menggunakan metode yang menghindari penggunaan bahan berbahaya seperti lem plastik", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Buku catatan ramah lingkungan dengan kertas daur ulang berkualitas tinggi. Cocok untuk menulis, mencatat ide, atau membuat jurnal, mendukung gaya hidup berkelanjutan"
        ]);

        Product::create([
            "name" => "Tempat Pensil kain", 
            "slug" => "tempat-pensil-kain", 
            "product_category_id" => 1, 
            "weight" => 80, 
            "material" => "Kain kanvas, katun, atau denim, ritsleting", 
            "process" => "Kain seperti kanvas, katun, atau denim dipotong dan dijahit menjadi tempat pensil. Tidak ada pewarna sintetis yang digunakan untuk memastikan produk ini ramah lingkungan. Desain sederhana mendukung gaya hidup bebas plastik dengan memanfaatkan bahan yang tahan lama", 
            "certification" => "GOTS (Global Organic Textile Standard)", 
            "description" => "Tempat pensil multifungsi dari kain yang kuat dan tahan lama. Desain ringkas dan stylish, cocok untuk menyimpan alat tulis, kosmetik, atau barang-barang kecil lainnya"
        ]);

        Product::create([
            "name" => "Sedotan Stainless Steel Set", 
            "slug" => "sedotan-stainless-steel-set", 
            "product_category_id" => 1, 
            "weight" => 100, 
            "material" => "Stainless steel food grade (SUS 304).", 
            "process" => "Stainless steel food-grade diproses melalui metode pemotongan presisi tinggi untuk membentuk sedotan. Setiap sedotan dipoles hingga halus dan disterilkan sebelum dikemas dalam pouch kain untuk memudahkan penggunaan ulang", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Sedotan stainless steel yang dapat digunakan berulang kali, alternatif ramah lingkungan untuk sedotan plastik sekali pakai. Aman untuk minuman dingin maupun panas, mudah dibersihkan dengan sikat yang tersedia"
        ]);
        Product::create([
            "name" => "Spons Mandi Loofah Alami", 
            "slug" => "spons-mandi-loofah-alami", 
            "product_category_id" => 1, 
            "weight" => 40, 
            "material" => "Tanaman loofah kering", 
            "process" => "Tanaman loofah dipanen dan dikeringkan secara alami di bawah sinar matahari. Setelah kering, loofah dipotong menjadi ukuran yang sesuai untuk penggunaan mandi. Spons ini dikemas tanpa bahan tambahan untuk memastikan sepenuhnya biodegradable", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Spons mandi alami dari loofah, eksfoliator lembut untuk kulit. Biodegradable sepenuhnya, membantu mengangkat sel kulit mati dan melancarkan sirkulasi darah"
        ]);
        Product::create([
            "name" => "Kain Lap Dapur Bahan Bambu ", 
            "slug" => "kain-lap-dapur-bahan-bambu", 
            "product_category_id" => 1, 
            "weight" => 50, 
            "material" => "Serat bambu", 
            "process" => "Serat bambu diproses dengan metode mekanis untuk menjaga keaslian bahan. Kain ini ditenun menjadi lap yang ringan dan cepat kering. Proses ini tidak melibatkan bahan kimia agresif, menjadikan produk ini aman untuk lingkungan.", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Kain lap dapur super absorban terbuat dari serat bambu yang lembut dan cepat kering. Lebih higienis dan tahan lama dibandingkan kain biasa, serta ramah lingkungan"
        ]);
        Product::create([
            "name" => "Pengharum Ruangan Semprot Bahan Alami", 
            "slug" => "pengharum-ruangan-semprot-bahan-alami", 
            "product_category_id" => 1, 
            "weight" => 200, 
            "material" => "Air suling, alkohol biji-bijian, minyak esensial alami", 
            "process" => "Minyak esensial murni dicampur dengan air suling dan alkohol biji-bijian untuk menciptakan campuran pengharum yang alami. Campuran ini dikemas dalam botol kaca, menghindari penggunaan plastik sekali pakai dan menjamin keberlanjutan", 
            "certification" => "COSMOS Natural/Organic", 
            "description" => "Pengharum ruangan semprot yang terbuat dari bahan-bahan alami dan minyak esensial murni, bebas dari bahan kimia sintetis. Menciptakan suasana segar dan nyaman di rumah Anda secara alami"
        ]);
        Product::create([
            "name" => "Sumpit Bambu", 
            "slug" => "sumpit-bambu", 
            "product_category_id" => 1, 
            "weight" => 30, 
            "material" => "bambu alami", 
            "process" => "Batang bambu dipotong dan dihaluskan menggunakan alat manual. Setelah selesai, sumpit dicuci, dikeringkan, dan dibiarkan tanpa lapisan pelindung sintetis untuk memastikan produk ini sepenuhnya biodegradable", 
            "certification" => "FSC (Forest Stewardship Council)", 
            "description" => "Sumpit bambu alami yang ringan dan ramah lingkungan. Permukaan halus dan mudah digenggam, cocok untuk menikmati berbagai hidangan Asia"
        ]);
        Product::create([
            "name" => "Pembungkus Makanan Beeswax (Beeswax Wrap)", 
            "slug" => "pembungkus-makanan-beeswax-beeswax-wrap", 
            "product_category_id" => 1, 
            "weight" => 200, 
            "material" => "Kain katun organik, beeswax (lilin lebah), resin pohon, minyak jojoba", 
            "process" => "Kain katun organik dipotong sesuai ukuran dan dilapisi dengan campuran beeswax, resin pohon, dan minyak alami. Campuran ini dilelehkan ke kain dengan pemanasan lembut. Produk akhir memiliki daya tahan dan dapat digunakan kembali, menggantikan plastik wrap", 
            "certification" => "GOTS (Global Organic Textile Standard)", 
            "description" => "Gantikan plastik wrap Anda dengan pembungkus makanan beeswax yang dapat digunakan berulang kali. Elastis dan tahan lama, menjaga kesegaran makanan seperti keju, roti, buah, atau sayuran. Cukup cuci dengan air dingin dan sabun ringan"
        ]);
        Product::create([
            "name" => "Bola Pengering Pakaian Wol", 
            "slug" => "bola-pengering Pakaian Wol", 
            "product_category_id" => 1, 
            "weight" => 40, 
            "material" => "100% wol domba alami", 
            "process" => "Wol domba alami dikumpulkan, dicuci, dan digulung menjadi bola. Proses ini dilakukan tanpa tambahan pewarna atau bahan sintetis. Bola wol ini diuji untuk memastikan daya tahan sebelum dikemas dalam kantong kain biodegradable", 
            "certification" => "Ekolabel Indonesia", 
            "description" => "Bola pengering pakaian wol ini membantu mengurangi waktu pengeringan di mesin, menghemat energi, dan melunakkan pakaian secara alami tanpa bahan kimia. Alternatif ramah lingkungan untuk pelembut pakaian cair atau lembaran pengering, serta dapat digunakan ratusan kali"
        ]);
    }
}
