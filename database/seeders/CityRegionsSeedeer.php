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
            "Bakı" => "Baku",
            "Gəncə" => "Ganja",
            "Sumqayıt" => "Sumqayit",
            "Mingəçevir" => "Mingachevir",
            "Naftalan" => "Naftalan",
            "Şəki" => "Shaki",
            "Şirvan" => "Shirvan",
            "Lənkəran" => "Lankaran",
            "Yevlax" => "Yevlakh",
            "Xankəndi" => "Khankendi",
            "Naxçıvan" => "Nakhchivan",
            "Abşeron" => "Absheron",
            "Ağcabədi" => "Agjabadi",
            "Ağdam" => "Agdam",
            "Ağdaş" => "Agdash",
            "Ağstafa" => "Aghstafa",
            "Ağsu" => "Agsu",
            "Astara" => "Astara",
            "Balakən" => "Balaken",
            "Beyləqan" => "Beylagan",
            "Bərdə" => "Barda",
            "Biləsuvar" => "Bilasuvar",
            "Cəbrayıl" => "Jabrayil",
            "Cəlilabad" => "Jalilabad",
            "Daşkəsən" => "Dashkasan",
            "Füzuli" => "Fuzuli",
            "Gədəbəy" => "Gadabay",
            "Goranboy" => "Goranboy",
            "Göyçay" => "Goychay",
            "Göygöl" => "Goygol",
            "Hacıqabul" => "Hajigabul",
            "İmişli" => "Imishli",
            "İsmayıllı" => "Ismayilli",
            "Kəlbəcər" => "Kalbajar",
            "Kürdəmir" => "Kurdamir",
            "Qax" => "Qakh",
            "Qazax" => "Gazakh",
            "Qəbələ" => "Gabala",
            "Qobustan" => "Gobustan",
            "Quba" => "Guba",
            "Qubadlı" => "Gubadli",
            "Qusar" => "Gusar",
            "Laçın" => "Lachin",
            "Lerik" => "Lerik",
            "Masallı" => "Masalli",
            "Neftçala" => "Neftchala",
            "Oğuz" => "Oghuz",
            "Ordubad" => "Ordubad",
            "Saatlı" => "Saatli",
            "Sabirabad" => "Sabirabad",
            "Salyan" => "Salyan",
            "Samux" => "Samukh",
            "Siyəzən" => "Siyazan",
            "Şabran" => "Shabran",
            "Şamaxı" => "Shamakhi",
            "Şəmkir" => "Shamkir",
            "Şərur" => "Sharur",
            "Tərtər" => "Tartar",
            "Tovuz" => "Tovuz",
            "Ucar" => "Ujar",
            "Xaçmaz" => "Khachmaz",
            "Xızı" => "Khizi",
            "Xocalı" => "Khojaly",
            "Xocavənd" => "Khojavend",
            "Yardımlı" => "Yardimli",
            "Zaqatala" => "Zagatala",
            "Zəngilan" => "Zangilan",
            "Zərdab" => "Zardab",
        ];

        $regions = [
            "Binəqədi" => "Binagadi",
            "Nərimanov" => "Narimanov",
            "Nəsimi" => "Nasimi",
            "Nizami" => "Nizami",
            "Pirallahı" => "Pirallahi",
            "Qaradağ" => "Garadagh",
            "Sabunçu" => "Sabunchu",
            "Səbail" => "Sabail",
            "Suraxanı" => "Surakhani",
            "Xətai" => "Khatai",
            "Xəzər" => "Khazar",
            "Yasamal" => "Yasamal",
        ];

        foreach ($cities as $az => $en) {
            Cities::create([
                'city_name' => ['az' => $az, 'en' => $en],
                'status' => 1,
            ]);
        }

        $baku = Cities::where('city_name->az', 'Bakı')->first();

        foreach ($regions as $az => $en) {
            Regions::create([
                'region_name' => ['az' => $az, 'en' => $en],
                'status' => 1,
                'cities_uid' => $baku->uid,
            ]);
        }
    }
}
