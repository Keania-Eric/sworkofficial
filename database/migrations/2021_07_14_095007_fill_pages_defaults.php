<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FillPagesDefaults extends Migration
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
            'api_docs',
            'marketting_project_management',
            'project_tour',
            'swork_status',
            'terms',
            'privacy'
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
                DB::table('pages')->insert([
                    'slug'=> $data,
                    'name'=> ucfirst(str_replace('_', ' ', $data)),
                    'content'=> "<p>Egestas fringilla phasellus faucibus scelerisque eleifend. Ultricies leo integer malesuada nunc vel risus commodo viverra. Condimentum mattis pellentesque id nibh tortor id. Commodo sed egestas egestas fringilla. Ut etiam sit amet nisl purus in. Volutpat blandit aliquam etiam erat velit scelerisque in dictum.</p>
                                <p>Massa vitae tortor condimentum lacinia quis vel eros donec ac. Cursus metus aliquam eleifend mi. Lacus vestibulum sed arcu non odio. Ultrices gravida dictum fusce ut placerat. Posuere morbi leo urna molestie at elementum eu. Tempor commodo ullamcorper a lacus vestibulum sed arcu non. Hac habitasse platea dictumst vestibulum rhoncus est pellentesque elit ullamcorper.</p>
                                <p>Cursus mattis molestie a iaculis at erat pellentesque. Pulvinar sapien et ligula ullamcorper malesuada. Velit egestas dui id ornare arcu odio. Lacus viverra vitae congue eu consequat ac. Gravida cum sociis natoque penatibus et magnis dis. In fermentum et sollicitudin ac. Cras ornare arcu dui vivamus. Diam maecenas ultricies mi eget mauris. Cras tincidunt lobortis feugiat vivamus at augue eget.</p>
                                <p>Tellus molestie nunc non blandit massa enim nec dui. Condimentum mattis pellentesque id nibh. Amet nulla facilisi morbi tempus iaculis urna id volutpat. Justo donec enim diam vulputate ut pharetra sit amet aliquam. Nisl rhoncus mattis rhoncus urna neque. Dui nunc mattis enim ut tellus elementum sagittis vitae et.</p>
                                <p>Morbi leo urna molestie at elementum. Dui sapien eget mi proin. Gravida neque convallis a cras semper auctor neque vitae tempus. Orci dapibus ultrices in iaculis nunc sed augue. Urna nec tincidunt praesent semper feugiat nibh. Aliquet eget sit amet tellus cras adipiscing enim eu. Vulputate odio ut enim blandit.</p>"
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
                DB::table('pages')->where('slug', $data)->delete();
            }
        });
    }
}
