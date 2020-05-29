<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->text('restaurant_name')->nullable();

            $table->text('restaurant_intro_short')->nullable();
            
            $table->text('restaurant_intro_long')->nullable();
            
            $table->text('restaurant_image')->nullable();
            
            $table->text('restaurant_address')->nullable();
            
            $table->text('access_line')->nullable();
            
            $table->text('access_station')->nullable();
            
            $table->text('restaurant_access_walk')->nullable();
            
            $table->text('restaurant_tell')->nullable();
            
            $table->text('restaurant_opentime')->nullable();
            
            $table->text('restaurant_holiday')->nullable();
            
            $table->text('restaurant_budget')->nullable();
            
            $table->text('restaurant_budget_lunch')->nullable();
            
            $table->text('restaurant_credit_card')->nullable();
            
            $table->text('restaurant_e_money')->nullable();
            
            $table->text('restaurant_url')->nullable();

            $table
            ->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
