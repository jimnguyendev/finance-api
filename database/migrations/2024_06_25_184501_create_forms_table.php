<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    public function up(): void
    {
        Schema::create('forms', static function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->unique(['user_id', 'title']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
}
