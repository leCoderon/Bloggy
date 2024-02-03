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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content');
            $table->integer('online');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

             // Lorsque onDelete('cascade') est utilisé, cela signifie que si un enregistrement parent est supprimé, tous les enregistrements enfants associés dans la table contenant la clé étrangère seront également automatiquement supprimés.
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
