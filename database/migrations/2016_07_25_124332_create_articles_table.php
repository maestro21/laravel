<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
			$table->string('article_name');
            $table->timestamps();
        });
		
		// Insert some articles
		DB::table('articles')->insert(
			array(
				'article_name' => 'Apfel',
			)
		);
		DB::table('articles')->insert(
			array(
				'article_name' => 'Computer',
			)
		);
		DB::table('articles')->insert(
			array(
				'article_name' => 'Kaugumi',
			)
		);
		DB::table('articles')->insert(
			array(
				'article_name' => 'Fahrrad',
			)
		);
		DB::table('articles')->insert(
			array(
				'article_name' => 'Kaffetasse',
			)
		);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
