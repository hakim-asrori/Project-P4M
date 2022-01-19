<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbLogPendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_log_penduduk', function (Blueprint $table) {
            $table->id();
            $table->integer("id_penduduk")->nullable();
            $table->integer("kode_peristiwa")->nullable()->unique();
            $table->string("meninggal_di", 50)->nullable();
            $table->tinyText("alamat_tujuan")->nullable();
            $table->timestamp("tgl_lapor");
            $table->datetime("tgl_peristiwa");
            $table->text("catatan");
            $table->string("no_kk")->nullable();
            $table->string("nama_kk")->nullable();
            $table->tinyInteger("ref_pindah")->default(1);
            $table->integer("created_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->string("maksud_tujuan_kedatangan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_log_penduduk');
    }
}