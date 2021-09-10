<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
			
			$table->string('first_name')->nullable();
			$table->string('last_name')->nullable();
			
			$table->string('birth_date')->nullable();
			$table->string('gender')->nullable();
			
			$table->string('address')->nullable();
			$table->string('city')->nullable();
			$table->string('postal_code')->nullable();
			
			$table->string('phone_number')->nullable();
			$table->string('email_address')->nullable();
			
			$table->tinyInteger('notifications')->nullable();

			$table->string('guardian_first_name')->nullable();
			$table->string('guardian_last_name')->nullable();
			
			$table->string('guardian_phone_number')->nullable();
			
			$table->string('guardian_relationship')->nullable();
			
			$table->tinyInteger('pregnant_flag')->nullable();
			
			$table->tinyInteger('illness_flag')->nullable();
			$table->longText('illness_description')->nullable();
			
			$table->tinyInteger('medications_flag')->nullable();
			$table->longText('medications_description')->nullable();

			$table->tinyInteger('injuries_flag')->nullable();
			$table->longText('injuries_description')->nullable();
			
			$table->tinyInteger('concussion_flag')->nullable();
			$table->longText('concussion_description')->nullable();

			$table->tinyInteger('others_flag')->nullable();
			$table->longText('others_description')->nullable();
			
			$table->longText('goal')->nullable();
			
			$table->longText('reference')->nullable();
			
			$table->string('signee')->nullable();
			$table->longText('signature')->nullable();
			
			$table->tinyInteger('media_release')->nullable();
			$table->longText('media_release_signature')->nullable();
			
			$table->tinyInteger('deprecated')->default(0);
			
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
        Schema::dropIfExists('applications');
    }
}
