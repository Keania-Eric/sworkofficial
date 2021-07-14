<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillSiteContentsDefaiult extends Migration
{
    protected $preloadedData;

    public function __construct()
    {
        $this->setupDefaultData();
    }
    
    /**
     * Method setupDefaultData
     *
     * @return void
     */
    protected function setupDefaultData()
    {
        $this->preloadedData = [
            //'home_hero_content'
            'home_hero_content',
            'home_2_tab_1_1',
            'home_2_tab_1_2',
            'home_2_tab_2_1',
            'home_2_tab_2_2',
            'home_2_tab_3_1',
            'home_2_tab_3_2',
            'home_3',
            'home_4',
            'home_5',
            'contact_post_1',
            'contact_post_2'
        ];
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        $faker = \Faker\Factory::create();

        DB::transaction(function() use($faker){
            foreach($this->preloadedData as $data) {
                DB::table('site_contents')->insert([
                    'slug'=> $data,
                    'title'=> $faker->sentence,
                    'content'=> $faker->paragraph
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
                DB::table('site_contents')->where('slug', $data)->delete();
            }
        });
    }
}
