<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FillSiteImagesDefaultValue extends Migration
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
            //[slug, width, height]
            ['hero_1_image', 524, 393],
            ['home_2_project_management', 620, 464],
            ['home_2_task_management', 620, 464],
            ['home_2_dark_mode', 620, 464],
            ['home_3_image', 587, 403],
            ['home_4_image', 567, 398],
            ['blog_featured', 858, 425]
        ];
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::transaction(function(){
            foreach($this->preloadedData as $data) {
                DB::table('site_images')->insert([
                    'name'=> ucfirst(str_replace('_', ' ', $data[0])),
                    'slug'=> $data[0],
                    'width'=> $data[1],
                    'height'=> $data[2]
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
                DB::table('site_images')->where([
                    'name'=> ucfirst(str_replace('_', ' ', $data[0])),
                    'slug'=> $data[0],
                    'width'=> $data[1],
                    'height'=> $data[2]
                ])->delete();
            }
        });
    }
}
