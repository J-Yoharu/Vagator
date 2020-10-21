<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreignId('department_id')->comment('área de atuação')
                ->constrained('departments')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreignId('locale_id')
                ->constrained('locales')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->foreignId('type_id')
                ->constrained('types')
                ->onUpdate('no action')
                ->onDelete('cascade');
            $table->boolean('is_remote')->default(false);
            $table->softDeletes('deleted_at', 0);
            $table->longText('description');
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
        Schema::dropIfExists('jobs');
    }
}
