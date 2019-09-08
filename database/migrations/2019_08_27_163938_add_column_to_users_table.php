<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
        // $table->integer('user_id'); //追加
        $table->string('doctor_name');
        $table->string('post_code',8);
        $table->string('clinic_address');
        $table->string('clinic_phone_number');
        // 以下追加
        $table->string('main_photo')->nullable();
        $table->string('tagline')->nullable();
        $table->text('clinic_pr')->nullable();
        $table->text('doctor_profile')->nullable();
        $table->string('doctor_photo')->nullable();
        $table->integer('doctor_number')->nullable();
        $table->integer('staff_number')->nullable();
        $table->string('personnel_details')->nullable();
        $table->text('clinic_url')->nullable();
        $table->string('clinic_category')->nullable();
        $table->string('clinic_treatment')->nullable();
        $table->string('clinic_features')->nullable();
        $table->string('disease_name')->nullable();
        $table->text('conference')->nullable();
        $table->dateTime('open_date')->nullable();
        $table->string('sub_photo')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
