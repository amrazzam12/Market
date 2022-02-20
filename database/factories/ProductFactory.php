<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'title' => 'Radiant-360 R6 Wireless Omnidirectional Speaker [White]',
            'slug' => '7,9-inch LED-backlit, 130Gb',
            'desc' =>  'Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, a t everti meliore erroribus sea. ro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.
                        Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum eque. Est cu nibh clita. Sed an nominavi, et stituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus taria .',
            'stock' => $this->faker->randomNumber('4'),
            'photo' => 'assets/images/products/tools_equipment_7.jpg',
            'price' => $this->faker->randomNumber('3'),
            'sale' => rand(0,100),
            'weight' => 100,
            'condition' => $this->faker->randomElement(['new' , 'used']),
            'status'=>'active',
            'cat_id' => 1,
            'subcat_id' => 1,
            'vendor_id' => 1,


        ];
    }
}
