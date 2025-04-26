<?php

namespace Database\Seeders;

use App\Models\Cities;
use App\Models\Regions;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CityRegionsSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities = [
            "Bakı",
            "Gəncə",
            "Sumqayıt",
            "Mingəçevir",
            "Naftalan",
            "Şəki",
            "Şirvan",
            "Lənkəran",
            "Yevlax",
            "Xankəndi",
            "Naxçıvan",
            "Abşeron",
            "Ağcabədi",
            "Ağdam",
            "Ağdaş",
            "Ağstafa",
            "Ağsu",
            "Astara",
            "Balakən",
            "Beyləqan",
            "Bərdə",
            "Biləsuvar",
            "Cəbrayıl",
            "Cəlilabad",
            "Daşkəsən",
            "Füzuli",
            "Gədəbəy",
            "Goranboy",
            "Göyçay",
            "Göygöl",
            "Hacıqabul",
            "İmişli",
            "İsmayıllı",
            "Kəlbəcər",
            "Kürdəmir",
            "Qax",
            "Qazax",
            "Qəbələ",
            "Qobustan",
            "Quba",
            "Qubadlı",
            "Qusar",
            "Laçın",
            "Lerik",
            "Masallı",
            "Neftçala",
            "Oğuz",
            "Ordubad",
            "Saatlı",
            "Sabirabad",
            "Salyan",
            "Samux",
            "Siyəzən",
            "Şabran",
            "Şamaxı",
            "Şəmkir",
            "Şərur",
            "Tərtər",
            "Tovuz",
            "Ucar",
            "Xaçmaz",
            "Xızı",
            "Xocalı",
            "Xocavənd",
            "Yardımlı",
            "Zaqatala",
            "Zəngilan",
            "Zərdab"
        ];

        $regions = [
            "Binəqədi",
            "Nərimanov",
            "Nəsimi",
            "Nizami",
            "Pirallahı",
            "Qaradağ",
            "Sabunçu",
            "Səbail",
            "Suraxanı",
            "Xətai",
            "Xəzər",
            "Yasamal"
        ];

        foreach ($cities as $key => $city) {
            Cities::create([
                'city_name' => $city,
                'status' => 1
            ]);
        }

        $city_uid = Cities::where('city_name', 'Bakı')->first()->uid;

        foreach ($regions as $key => $region) {
            Regions::create([
                'region_name' => $region,
                'status' => 1,
                'cities_uid' => $city_uid,
            ]);
        }
    }
}
