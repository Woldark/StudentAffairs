<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::disableForeignKeyConstraints();
		Schema::create('comments', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('post_id')->nullable()->unsigned();
			$table->integer('image_id')->nullable()->unsigned();
			$table->mediumText('body');
			$table->mediumText('answer')->nullable();
			$table->string('name');
			$table->string('email')->nullable();
			$table->string('website')->nullable();
			$table->tinyInteger('confirm')->default(0);
			$table->string('create_date');
			$table->boolean('seen')->default(false);
			$table->timestamps();
			$table->foreign('post_id')
				->references('id')
				->on('posts')
				->onDelete('cascade')
				->onUpdate('cascade');
			$table->foreign('image_id')
				->references('id')
				->on('posts')
				->onDelete('cascade')
				->onUpdate('cascade');
		});
		Schema::enableForeignKeyConstraints();
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('comments');
	}
}
