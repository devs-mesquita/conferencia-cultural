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
        Schema::create('inscricao', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->char('cpf',14)           ->unique();
            $table->string('email');
            $table->mediumtext('foto');
            $table->dateTime('nascimento');
            $table->string('telefone');
            $table->enum('tipo',['OBSERVADOR','PARTICIPANTE','DELEGADO','CONVIDADO']);
            $table->string('cep');
            $table->string('rua');
            $table->string('numero');
            $table->string('complemento')   ->nullable();
            $table->string('bairro');
            $table->string('municipio');
            $table->string('youtube')       ->nullable();
            $table->string('instagram')     ->nullable();
            $table->string('twitter')       ->nullable();
            $table->string('linkedin')      ->nullable();
            $table->string('pinterest')     ->nullable();
            $table->string('gt');
            $table->mediumtext('doc_identidade')->nullable();
            $table->mediumtext('doc_residencia')->nullable();
            $table->mediumtext('doc_portifolio')->nullable();
            $table->boolean('avaliado')         ->default(0);
            $table->BigInteger('avaliador_id')  ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscricao');
    }
};
