<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('second_surname')->nullable();
            $table->string('nationality')->nullable();
            $table->string('identification')->nullable();
            $table->string('genre')->nullable();
            $table->string('record')->nullable();
            $table->string('age')->nullable();
            $table->string('religion')->nullable();
            $table->string('date_birth')->nullable();
            $table->string('origin')->nullable();
            $table->string('status')->nullable();
            $table->string('admission_date')->nullable();
            $table->string('egress_date')->nullable();
            $table->string('entry_hour')->nullable();
            $table->string('egress_hour')->nullable();
            $table->string('egress_reason')->nullable();
            $table->string('first_treatment')->nullable();
            $table->string('another_center_entered')->nullable();
            $table->string('times_he_entered')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('have_children')->nullable();
            $table->string('children_number')->nullable();
            $table->string('job')->nullable();
            $table->string('occupation')->nullable();
            $table->string('study')->nullable();
            $table->string('educational_level')->nullable();
            $table->string('kind_resident')->nullable();
            $table->string('cellphone')->nullable();
            $table->string('on_street')->nullable();
            $table->string('referral_from_cai')->nullable();
            $table->string('destiny')->nullable();
            $table->string('destiny_reason')->nullable();
            $table->string('province')->nullable();
            $table->string('canton')->nullable();
            $table->string('address')->nullable();
            $table->string('psychiatric_diagnosis')->nullable();
            $table->string('drug_dependence_diagnosis')->nullable();
            $table->json('consumption_data_table')->nullable();
            $table->string('pending_cases')->nullable();
            $table->string('egress')->nullable();
            $table->string('egress_reason_law')->nullable();
            $table->string('drugs')->nullable();
            $table->string('sexual_nature')->nullable();
            $table->string('against_property')->nullable();
            $table->string('against_life')->nullable();
            $table->string('others_law')->nullable();
            $table->string('bath')->nullable();
            $table->string('clothe')->nullable();
            $table->string('listens')->nullable();
            $table->string('bedroom')->nullable();
            $table->string('breakfast')->nullable();
            $table->string('morning_snack')->nullable();
            $table->string('lunch')->nullable();
            $table->string('afternoon_snack')->nullable();
            $table->string('dinner')->nullable();
            $table->string('psychology')->nullable();
            $table->string('social_work')->nullable();
            $table->string('medicine')->nullable();
            $table->string('counseling')->nullable();
            $table->string('occupational_therapy')->nullable();
            $table->string('group_sessions')->nullable();
            $table->string('others')->nullable();
            $table->string('commentaries')->nullable();
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
        Schema::dropIfExists('residents');
    }
}
