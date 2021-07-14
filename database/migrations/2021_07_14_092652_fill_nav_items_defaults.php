<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillNavItemsDefaults extends Migration
{
    protected $preloadedData;


    public function __construct()
    {
        $this->setupDefaultData();
    }


    protected function setupDefaultData()
    {
        $this->preloadedData = [
            'home_2_nav_1',
            'home_2_nav_2',
            'home_2_nav_3',
        ];
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $faker = \Faker\Factory::create();

        DB::transaction(function() use($faker){
            foreach($this->preloadedData as $data) {
                DB::table('nav_items')->insert([
                    'slug'=> $data,
                    'name'=> $faker->word,
                ]);
            }
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::transaction(function(){
            foreach($this->preloadedData as $data) {
                DB::table('nav_items')->where('slug', $data)->delete();
            }
        });
    }
}
