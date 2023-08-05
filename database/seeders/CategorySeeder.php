<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "Wood",
                "desc" => "Wood is a porous and fibrous structural tissue found in the stems and roots of trees and other woody plants. It is an organic material – a natural composite of cellulose fibers that are strong in tension and embedded in a matrix of lignin that resists compression.",
            ],
            [
                "name" => "Steel",
                "desc" => "Steel is an alloy of iron with typically a few percent of carbon to improve its strength and fracture resistance compared to iron. Many other additional elements may be present or added. Stainless steels that are corrosion- and oxidation-resistant need typically an additional 11% chromium.",
            ],
            [
                "name" => "Concrete",
                "desc" => "Concrete is a composite material composed of fine and coarse aggregate bonded together with a fluid cement that hardens over time. Most concretes used are lime-based concretes such as Portland cement concrete or concretes made with other hydraulic cements, such as calcium aluminate cements.",
            ],
            [
                "name" => "Plastic",
                "desc" => "Plastics are a wide range of synthetic or semi-synthetic materials that use polymers as a main ingredient. Their plasticity makes it possible for plastics to be moulded, extruded or pressed into solid objects of various shapes.",
            ],
            [
                "name" => "Glass",
                "desc" => "Glass is a non-crystalline, often transparent amorphous solid, that has widespread practical, technological, and decorative use in, for example, window panes, tableware, and optics. Glass is most often formed by rapid cooling of the molten form; some glasses such as volcanic glass are naturally occurring.",
            ],
            [
                "name" => "Brick",
                "desc" => "A brick is a type of block used to build walls, pavements and other elements in masonry construction. Properly, the term brick denotes a block composed of dried clay, but is now also used informally to denote other chemically cured construction blocks.",
            ],
            [
                "name" => "Ceramic",
                "desc" => "A ceramic is any of the various hard, brittle, heat-resistant and corrosion-resistant materials made by shaping and then firing a nonmetallic mineral, such as clay, at a high temperature. Common examples are earthenware, porcelain, and brick.",
            ],
            [
                "name" => "Stone",
                "desc" => "Stone is a block found underground in the Overworld or on the surface of mountains."
            ],
            [
                "name" => "Marble",
                "desc" => "Marble is a metamorphic rock composed of recrystallized carbonate minerals, most commonly calcite or dolomite. Marble is typically not foliated, although there are exceptions. In geology, the term marble refers to metamorphosed limestone, but its use in stonemasonry more broadly encompasses unmetamorphosed limestone.",
            ],
            [
                "name" => "Roofing",
                "desc" => "Roofing material is the outermost layer on the roof of a building, sometimes self-supporting, but generally supported by an underlying structure. A building's roofing material provides shelter from the natural elements. The outer layer of a roof shows great variation dependent upon availability of material, and the nature of the supporting structure.",
            ],
            [
                "name" => "Insulation",
                "desc" => "Insulation is the process of insulating something or someone. In other words, it is the process of protecting something by surrounding it with material that reduces or prevents the transmission of sound, heat, or electricity.",
            ],
            [
                "name" => "Paint",
                "desc" => "Paint is any pigmented liquid, liquefiable, or solid mastic composition that, after application to a substrate in a thin layer, converts to a solid film. It is most commonly used to protect, color, or provide texture to objects.",
            ],
            [
                "name" => "Aggregate",
                "desc" => "An aggregate is a collection of items that are gathered together to form a total quantity. Sand is a naturally occurring granular material mposed of finely divided rock and mineral particles. Aggregate and sand are building materials that are used in various construction projects.",
            ]

        ];

        foreach ($categories as $category) {
            Category::factory()
                ->create($category);
        }
    }
}
