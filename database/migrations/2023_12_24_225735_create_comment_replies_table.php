<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('comment_id');
            $table->longText('content');
            $table->timestamps();

             // Lorsque onDelete('cascade') est utilisé, cela signifie que si un enregistrement parent est supprimé, tous les enregistrements enfants associés dans la table contenant la clé étrangère seront également automatiquement supprimés.
             $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
             $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
             
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_replies');
    }
};
