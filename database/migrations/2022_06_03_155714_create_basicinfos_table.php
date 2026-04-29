<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basicinfos', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('phone_one')->nullable();
            $table->string('phone_two')->nullable();
            $table->string('email')->nullable();
            $table->text('logo')->nullable();
            $table->text('address')->nullable();
            $table->text('facebook_pixel')->nullable();
            $table->text('google_analytics')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->text('meta_image')->nullable();
            $table->text('logo')->nullable();

            // text
            $table->text('about_us')->nullable();
            $table->text('service_info')->nullable();
            $table->text('call_to')->nullable();
            $table->text('fact_info')->nullable();
            $table->text('team_info')->nullable();
            $table->text('contact_us')->nullable();
            $table->text('news')->nullable();
            $table->text('footer_text_logo')->nullable();
            // facts
            $table->integer('clients')->default(0);
            $table->integer('projects')->default(0);
            $table->integer('workers')->default(0);
            $table->integer('working_hour')->default(0);
            $table->text('screenshot')->nullable();

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('google')->nullable();
            $table->string('rss')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('youtube')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('basicinfos');
    }
}