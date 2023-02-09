<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Surat;

class SuratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nomor_surat'=>1,'nama_surat'=>"Al Fatihah"],
            ['nomor_surat'=>2,'nama_surat'=>"Al Baqarah"],
            ['nomor_surat'=>3,'nama_surat'=>"Ali Imran"],
            ['nomor_surat'=>4,'nama_surat'=>"An Nisa"],
            ['nomor_surat'=>5,'nama_surat'=>"Al Ma'idah"],
            ['nomor_surat'=>6,'nama_surat'=>"Al An'am"],
            ['nomor_surat'=>7,'nama_surat'=>"Al-A'raf"],
            ['nomor_surat'=>8,'nama_surat'=>"Al-Anfal"],
            ['nomor_surat'=>9,'nama_surat'=>"At-Taubah"],
            ['nomor_surat'=>10,'nama_surat'=>"Yunus"],
            ['nomor_surat'=>11,'nama_surat'=>"Hud"],
            ['nomor_surat'=>12,'nama_surat'=>"Yusuf"],
            ['nomor_surat'=>13,'nama_surat'=>"Ar-Ra'd"],
            ['nomor_surat'=>14,'nama_surat'=>"Ibrahim"],
            ['nomor_surat'=>15,'nama_surat'=>"Al-Hijr"],
            ['nomor_surat'=>16,'nama_surat'=>"An-Nahl"],
            ['nomor_surat'=>17,'nama_surat'=>"Al-Isra'"],
            ['nomor_surat'=>18,'nama_surat'=>"Al-Kahf"],
            ['nomor_surat'=>19,'nama_surat'=>"Maryam"],
            ['nomor_surat'=>20,'nama_surat'=>"Ta Ha"],
            ['nomor_surat'=>21,'nama_surat'=>"Al-Anbiya"],
            ['nomor_surat'=>22,'nama_surat'=>"Al-Hajj"],
            ['nomor_surat'=>23,'nama_surat'=>"Al-Mu'minun"],
            ['nomor_surat'=>24,'nama_surat'=>"An-Nur"],
            ['nomor_surat'=>25,'nama_surat'=>"Al-Furqan"],
            ['nomor_surat'=>26,'nama_surat'=>"Asy-Syu'ara'"],
            ['nomor_surat'=>27,'nama_surat'=>"An-Naml"],
            ['nomor_surat'=>28,'nama_surat'=>"Al-Qasas"],
            ['nomor_surat'=>29,'nama_surat'=>"Al-'Ankabut"],
            ['nomor_surat'=>30,'nama_surat'=>"Ar-Rum"],
            ['nomor_surat'=>31,'nama_surat'=>"Luqman"],
            ['nomor_surat'=>32,'nama_surat'=>"As-Sajdah"],
            ['nomor_surat'=>33,'nama_surat'=>"Al-Ahzab"],
            ['nomor_surat'=>34,'nama_surat'=>"Saba'"],
            ['nomor_surat'=>35,'nama_surat'=>"Fatir"],
            ['nomor_surat'=>36,'nama_surat'=>"Ya Sin"],
            ['nomor_surat'=>37,'nama_surat'=>"As-Saffat"],
            ['nomor_surat'=>38,'nama_surat'=>"Sad"],
            ['nomor_surat'=>39,'nama_surat'=>"Az-Zumar"],
            ['nomor_surat'=>40,'nama_surat'=>"Ghafir"],
            ['nomor_surat'=>41,'nama_surat'=>"Fussilat"],
            ['nomor_surat'=>42,'nama_surat'=>"Asy-Syura"],
            ['nomor_surat'=>43,'nama_surat'=>"Az-Zukhruf"],
            ['nomor_surat'=>44,'nama_surat'=>"Ad-Dukhan"],
            ['nomor_surat'=>45,'nama_surat'=>"Al-Jasiyah"],
            ['nomor_surat'=>46,'nama_surat'=>"Al-Ahqaf"],
            ['nomor_surat'=>47,'nama_surat'=>"Muhammad"],
            ['nomor_surat'=>48,'nama_surat'=>"Al-Fath"],
            ['nomor_surat'=>49,'nama_surat'=>"Al-Hujurat"],
            ['nomor_surat'=>50,'nama_surat'=>"Qaf"],
            ['nomor_surat'=>51,'nama_surat'=>"Az-Zariyat"],
            ['nomor_surat'=>52,'nama_surat'=>"At-Tur"],
            ['nomor_surat'=>53,'nama_surat'=>"An-Najm"],
            ['nomor_surat'=>54,'nama_surat'=>"Al-Qamar"],
            ['nomor_surat'=>55,'nama_surat'=>"Ar-Rahman"],
            ['nomor_surat'=>56,'nama_surat'=>"Al-Waqi'ah"],
            ['nomor_surat'=>57,'nama_surat'=>"Al-Hadid"],
            ['nomor_surat'=>58,'nama_surat'=>"Al-Mujadilah"],
            ['nomor_surat'=>59,'nama_surat'=>"Al-Hasyr"],
            ['nomor_surat'=>60,'nama_surat'=>"Al-Mumtahanah"],
            ['nomor_surat'=>61,'nama_surat'=>"As-Saff"],
            ['nomor_surat'=>62,'nama_surat'=>"Al-Jumu'ah"],
            ['nomor_surat'=>63,'nama_surat'=>"Al-Munafiqun"],
            ['nomor_surat'=>64,'nama_surat'=>"At-Tagabun"],
            ['nomor_surat'=>65,'nama_surat'=>"At-Talaq"],
            ['nomor_surat'=>67,'nama_surat'=>"Al-Mulk"],
            ['nomor_surat'=>68,'nama_surat'=>"Al-Qalam"],
            ['nomor_surat'=>69,'nama_surat'=>"Al-Haqqah"],
            ['nomor_surat'=>70,'nama_surat'=>"Al-Ma'arij"],
            ['nomor_surat'=>71,'nama_surat'=>"Nuh"],
            ['nomor_surat'=>72,'nama_surat'=>"Al-Jinn"],
            ['nomor_surat'=>73,'nama_surat'=>"Al-Muzzammil"],
            ['nomor_surat'=>74,'nama_surat'=>"Al-Muddassir"],
            ['nomor_surat'=>75,'nama_surat'=>"Al-Qiyamah"],
            ['nomor_surat'=>76,'nama_surat'=>"Al-Insan"],
            ['nomor_surat'=>77,'nama_surat'=>"Al-Mursalat"],
            ['nomor_surat'=>78,'nama_surat'=>"An-Naba'"],
            ['nomor_surat'=>79,'nama_surat'=>"An-Nazi'at"],
            ['nomor_surat'=>80,'nama_surat'=>"'Abasa"],
            ['nomor_surat'=>81,'nama_surat'=>"At-Takwir"],
            ['nomor_surat'=>82,'nama_surat'=>"Al-Infitar"],
            ['nomor_surat'=>83,'nama_surat'=>"Al-Tatfif"],
            ['nomor_surat'=>84,'nama_surat'=>"Al-Insyiqaq"],
            ['nomor_surat'=>85,'nama_surat'=>"Al-Buruj"],
            ['nomor_surat'=>86,'nama_surat'=>"At-Tariq"],
            ['nomor_surat'=>87,'nama_surat'=>"Al-A'la"],
            ['nomor_surat'=>88,'nama_surat'=>"Al-Gasyiyah"],
            ['nomor_surat'=>89,'nama_surat'=>"Al-Fajr"],
            ['nomor_surat'=>90,'nama_surat'=>"Al-Balad"],
            ['nomor_surat'=>91,'nama_surat'=>"Asy-Syams"],
            ['nomor_surat'=>92,'nama_surat'=>"Al-Lail"],
            ['nomor_surat'=>93,'nama_surat'=>"Ad-Duha"],
            ['nomor_surat'=>94,'nama_surat'=>"Al-Insyirah"],
            ['nomor_surat'=>95,'nama_surat'=>"At-Tin"],
            ['nomor_surat'=>96,'nama_surat'=>"Al-'Alaq"],
            ['nomor_surat'=>97,'nama_surat'=>"Al-Qadr"],
            ['nomor_surat'=>98,'nama_surat'=>"Al-Bayyinah"],
            ['nomor_surat'=>99,'nama_surat'=>"Az-Zalzalah"],
            ['nomor_surat'=>100,'nama_surat'=>"Al-'Adiyat"],
            ['nomor_surat'=>101,'nama_surat'=>"Al-Qari'ah"],
            ['nomor_surat'=>102,'nama_surat'=>"At-Takasur"],
            ['nomor_surat'=>103,'nama_surat'=>"Al-'Asr"],
            ['nomor_surat'=>104,'nama_surat'=>"Al-Humazah"],
            ['nomor_surat'=>105,'nama_surat'=>"Al-Fil"],
            ['nomor_surat'=>106,'nama_surat'=>"Quraisy"],
            ['nomor_surat'=>107,'nama_surat'=>"Al-Ma'un"],
            ['nomor_surat'=>108,'nama_surat'=>"Al-Kausar"],
            ['nomor_surat'=>109,'nama_surat'=>"Al-Kafirun"],
            ['nomor_surat'=>110,'nama_surat'=>"An-Nasr"],
            ['nomor_surat'=>111,'nama_surat'=>"Al-Lahab"],
            ['nomor_surat'=>112,'nama_surat'=>"Al-Ikhlas"],
            ['nomor_surat'=>113,'nama_surat'=>"Al-Falaq"],
            ['nomor_surat'=>114,'nama_surat'=>"An-Nas"],

        ];
        foreach($data as $value){
            Surat::create($value);
        }
    }
}