<?php

use App\Planet;
use App\Region;
use Illuminate\Database\Seeder;

class PlanetSeeder extends Seeder
{
    public function run()
    {
        $regions = Region::all();

        Planet::create([
            "name" => "Alderaan",
            "region_id" => $regions->random()->id,
            "orbital_period" => "364",
        ]);
        Planet::create([
            "name" => "Yavin IV",
            "region_id" => $regions->random()->id,
            "orbital_period" => "4818",
        ]);
        Planet::create([
            "name" => "Hoth",
            "region_id" => $regions->random()->id,
            "orbital_period" => "549",
        ]);
        Planet::create([
            "name" => "Dagobah",
            "region_id" => $regions->random()->id,
            "orbital_period" => "341",
        ]);
        Planet::create([
            "name" => "Bespin",
            "region_id" => $regions->random()->id,
            "orbital_period" => "5110",
        ]);
        Planet::create([
            "name" => "Endor",
            "region_id" => $regions->random()->id,
            "orbital_period" => "402",
        ]);
        Planet::create([
            "name" => "Naboo",
            "region_id" => $regions->random()->id,
            "orbital_period" => "312",
        ]);
        Planet::create([
            "name" => "Coruscant",
            "region_id" => $regions->random()->id,
            "orbital_period" => "368",
        ]);
        Planet::create([
            "name" => "Kamino",
            "region_id" => $regions->random()->id,
            "orbital_period" => "463",
        ]);
        Planet::create([
            "name" => "Geonosis",
            "region_id" => $regions->random()->id,
            "orbital_period" => "256",
        ]);
        Planet::create([
            "name" => "Utapau",
            "region_id" => $regions->random()->id,
            "orbital_period" => "351",
        ]);
        Planet::create([
            "name" => "Mustafar",
            "region_id" => $regions->random()->id,
            "orbital_period" => "412",
        ]);
        Planet::create([
            "name" => "Kashyyyk",
            "region_id" => $regions->random()->id,
            "orbital_period" => "381",
        ]);
        Planet::create([
            "name" => "Polis Massa",
            "region_id" => $regions->random()->id,
            "orbital_period" => "590",
        ]);
        Planet::create([
            "name" => "Mygeeto",
            "region_id" => $regions->random()->id,
            "orbital_period" => "167",
        ]);
        Planet::create([
            "name" => "Felucia",
            "region_id" => $regions->random()->id,
            "orbital_period" => "231",
        ]);
        Planet::create([
            "name" => "Cato Neimoidia",
            "region_id" => $regions->random()->id,
            "orbital_period" => "278",
        ]);
        Planet::create([
            "name" => "Saleucami",
            "region_id" => $regions->random()->id,
            "orbital_period" => "392",
        ]);
        Planet::create([
            "name" => "Stewjon",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Eriadu",
            "region_id" => $regions->random()->id,
            "orbital_period" => "360",
        ]);
        Planet::create([
            "name" => "Corellia",
            "region_id" => $regions->random()->id,
            "orbital_period" => "329",
        ]);
        Planet::create([
            "name" => "Rodia",
            "region_id" => $regions->random()->id,
            "orbital_period" => "305",
        ]);
        Planet::create([
            "name" => "Nal Hutta",
            "region_id" => $regions->random()->id,
            "orbital_period" => "413",
        ]);
        Planet::create([
            "name" => "Dantooine",
            "region_id" => $regions->random()->id,
            "orbital_period" => "378",
        ]);
        Planet::create([
            "name" => "Bestine IV",
            "region_id" => $regions->random()->id,
            "orbital_period" => "680",
        ]);
        Planet::create([
            "name" => "Ord Mantell",
            "region_id" => $regions->random()->id,
            "orbital_period" => "334",
        ]);
        Planet::create([
            "name" => "Trandosha",
            "region_id" => $regions->random()->id,
            "orbital_period" => "371",
        ]);
        Planet::create([
            "name" => "Socorro",
            "region_id" => $regions->random()->id,
            "orbital_period" => "326",
        ]);
        Planet::create([
            "name" => "Mon Cala",
            "region_id" => $regions->random()->id,
            "orbital_period" => "398",
        ]);
        Planet::create([
            "name" => "Chandrila",
            "region_id" => $regions->random()->id,
            "orbital_period" => "368",
        ]);
        Planet::create([
            "name" => "Sullust",
            "region_id" => $regions->random()->id,
            "orbital_period" => "263",
        ]);
        Planet::create([
            "name" => "Toydaria",
            "region_id" => $regions->random()->id,
            "orbital_period" => "184",
        ]);
        Planet::create([
            "name" => "Malastare",
            "region_id" => $regions->random()->id,
            "orbital_period" => "201",
        ]);
        Planet::create([
            "name" => "Dathomir",
            "region_id" => $regions->random()->id,
            "orbital_period" => "491",
        ]);
        Planet::create([
            "name" => "Ryloth",
            "region_id" => $regions->random()->id,
            "orbital_period" => "305",
        ]);
        Planet::create([
            "name" => "Aleen Minor",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Vulpter",
            "region_id" => $regions->random()->id,
            "orbital_period" => "391",
        ]);
        Planet::create([
            "name" => "Troiken",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Tund",
            "region_id" => $regions->random()->id,
            "orbital_period" => "1770",
        ]);
        Planet::create([
            "name" => "Haruun Kal",
            "region_id" => $regions->random()->id,
            "orbital_period" => "383",
        ]);
        Planet::create([
            "name" => "Cerea",
            "region_id" => $regions->random()->id,
            "orbital_period" => "386",
        ]);
        Planet::create([
            "name" => "Glee Anselm",
            "region_id" => $regions->random()->id,
            "orbital_period" => "206",
        ]);
        Planet::create([
            "name" => "Iridonia",
            "region_id" => $regions->random()->id,
            "orbital_period" => "413",
        ]);
        Planet::create([
            "name" => "Tholoth",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Iktotch",
            "region_id" => $regions->random()->id,
            "orbital_period" => "481",
        ]);
        Planet::create([
            "name" => "Quermia",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Dorin",
            "region_id" => $regions->random()->id,
            "orbital_period" => "409",
        ]);
        Planet::create([
            "name" => "Champala",
            "region_id" => $regions->random()->id,
            "orbital_period" => "318",
        ]);
        Planet::create([
            "name" => "Mirial",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Serenno",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Concord Dawn",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Zolan",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Ojom",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Skako",
            "region_id" => $regions->random()->id,
            "orbital_period" => "384",
        ]);
        Planet::create([
            "name" => "Muunilinst",
            "region_id" => $regions->random()->id,
            "orbital_period" => "412",
        ]);
        Planet::create([
            "name" => "Shili",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Kalee",
            "region_id" => $regions->random()->id,
            "orbital_period" => "378",
        ]);
        Planet::create([
            "name" => "Umbara",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
        Planet::create([
            "name" => "Tatooine",
            "region_id" => $regions->random()->id,
            "orbital_period" => "304",
        ]);
        Planet::create([
            "name" => "Jakku",
            "region_id" => $regions->random()->id,
            "orbital_period" => null,
        ]);
    }
}
