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
        Schema::create('rpts', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->string('kelas');
            $table->string('nama');
            $table->string('nisn');
            $table->string('semester');

            $table->string('released')->nullable();
            $table->string('wname')->nullable();
            $table->string('nip')->nullable();
            $table->string('hmaster')->nullable();
            $table->string('hmnip')->nullable();

            $table->string('beriman')->nullable();
            $table->string('mandiri')->nullable();
            $table->string('gotong_royong')->nullable();

            $table->string('note')->nullable();


            $table->integer('pai')->nullable();
            $table->text('desc_pai')->nullable();
            $table->integer('pkn')->nullable();
            $table->text('desc_pkn')->nullable();
            $table->integer('indo')->nullable();
            $table->text('desc_indo')->nullable();
            $table->integer('mtk')->nullable();
            $table->text('desc_mtk')->nullable();
            $table->integer('sejindo')->nullable();
            $table->text('desc_sejindo')->nullable();
            $table->integer('bhs_asing')->nullable();
            $table->text('desc_bhs_asing')->nullable();

            // Muatan Kewilayahan
            $table->integer('sbd')->nullable();
            $table->text('desc_sbd')->nullable();
            $table->integer('pjok')->nullable();
            $table->text('desc_pjok')->nullable();

            // Muatan Peminatan Kejuruan
            // C1. Dasar Bidang Keahlian
            $table->integer('simdig')->nullable();
            $table->text('desc_simdig')->nullable();
            $table->integer('fis')->nullable();
            $table->text('desc_fis')->nullable();
            $table->integer('kim')->nullable();
            $table->text('desc_kim')->nullable();

            // C2. Dasar Program Keahlian
            $table->integer('sis_kom')->nullable();
            $table->text('desc_sis_kom')->nullable();
            $table->integer('komjar')->nullable();
            $table->text('desc_komjar')->nullable();
            $table->integer('progdas')->nullable();
            $table->text('desc_progdas')->nullable();
            $table->integer('ddg')->nullable();
            $table->text('desc_ddg')->nullable();

            // C3. Kompetensi Keahlian
            $table->integer('iaas')->nullable();
            $table->text('desc_iaas')->nullable();
            $table->integer('paas')->nullable();
            $table->text('desc_paas')->nullable();
            $table->integer('saas')->nullable();
            $table->text('desc_saas')->nullable();
            $table->integer('siot')->nullable();
            $table->text('desc_siot')->nullable();
            $table->integer('skj')->nullable();
            $table->text('desc_skj')->nullable();
            $table->integer('pkk')->nullable();
            $table->text('desc_pkk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rpts');
    }
};
