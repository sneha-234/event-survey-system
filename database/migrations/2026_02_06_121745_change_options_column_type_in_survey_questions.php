<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->json('options')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('survey_questions', function (Blueprint $table) {
            $table->text('options')->nullable()->change();
        });
    }
};
