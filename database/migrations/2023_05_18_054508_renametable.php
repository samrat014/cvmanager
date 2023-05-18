<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('user_c_v_s', 'applicant');
        Schema::rename('c_vstatus', 'applicant_status');

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('applicant', 'user_c_v_s' );
        Schema::rename('applicant_status', 'c_vstatus');

    }
};
