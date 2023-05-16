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
        Schema::create('c_vstatus', function (Blueprint $table) {
        $table->id();
        $table->foreignId('usercv_id')->constrained('user_c_v_s')->onDelete('cascade');
        $table->enum('status', ['not-shortlisted','shortlisted', 'First Interview' , 'second interview' , 'Hired', 'Rejected ','Black listed'])->nullable();
        $table->string('task')->nullable();
        $table->date('interview_date')->nullable();

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('c_vstatus');
    }
};
