<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillSiteMetasDefault extends Migration
{
    protected $preloadedData;


    public function __construct()
    {
        $this->setupDefaultData();
    }


    protected function setupDefaultData()
    {
        $this->preloadedData = [
            'footer_note',
            'our_location',
            'phone',
            'email',
            'site_title',
            'facebook_link',
            'twitter_handle',
            'instagram_handle'
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
                DB::table('site_metas')->insert([
                    'slug'=> $data,
                    'name'=> ucfirst(str_replace('_', ' ', $data)),
                    'value'=> $faker->sentence
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
                DB::table('site_metas')->where('slug', $data)->delete();
            }
        });
    }
}
