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
        Schema::create('article_likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('article_id');
            $table->timestamps();

            // Lorsque onDelete('cascade') est utilisé, cela signifie que si un enregistrement parent est supprimé, tous les enregistrements enfants associés dans la table contenant la clé étrangère seront également automatiquement supprimés.
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');

            // ->unique(['user_id', 'article_id']) est utilisé pour assurer l'unicité des combinaisons de valeurs dans les colonnes spécifiées,
            // cela garantit qu'un utilisateur ne peut pas aimer plusieurs fois le même article, et vice versa
            $table->unique(['user_id', 'article_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('article_likes');
    }
};
