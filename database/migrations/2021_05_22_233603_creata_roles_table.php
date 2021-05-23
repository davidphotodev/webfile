<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreataRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->timestamps();
        });

        // Schema::create('user_role', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('user_id');
        //     $table->unsignedInteger('role_id');
        // });

        $roles = [
            [
                'name' => 'Director'
            ],
            [
                'name' => 'Psicología'
            ],
            [
                'name' => 'Trabajador Social'
            ],
            [
                'name' => 'Enfermería'
            ],
            [
                'name' => 'Doctor'
            ],
            [
                'name' => 'Consejero'
            ],
            [
                'name' => 'IAFA'
            ]
        ];

        foreach ($roles as $r) {
            $role = new \App\Models\Role();
            $role->name = $r['name'];
            $role->save();
        }
 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_role');
        Schema::dropIfExists('roles');
    }

}
