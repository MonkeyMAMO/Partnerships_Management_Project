<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('partable', function (Blueprint $table) {
            $table->id();
            $table->string('partners'); // Column for 'الطرف الشريك'
            $table->string('subject');  // Column for 'الموضوع'
            $table->date('date');       // Column for 'التاريخ'
            $table->string('status');  // Column for 'الحالة'
            $table->decimal('amount', 10, 2)->nullable(); // Column for 'المبلغ بالدرهم'
            $table->integer('extension')->nullable(); // Column for 'عدد مرات التمديد'
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partable');
    }
};
