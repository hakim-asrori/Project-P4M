<?php

use App\Http\Controllers\AkunController;
use App\Http\Controllers\AlamatController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\HakAksesController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\TerakhirLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [UserController::class, "index"]);

// Galeri
Route::get("/galeri", [UserController::class, "galeri"]);

// Berita
Route::prefix("berita")->group(function() {
    // Semua Berita
    Route::get("/", [UserController::class, "berita"]);

    // Berita Selengkapnya
    Route::get('/{slug}',[UserController::class, "detailBerita"]);
});

// Kontak
Route::get("/kontak", [UserController::class, "kontak"]);
Route::post("/kirim_pesan", [UserController::class, "kirim_pesan"]);
Route::get("/profil", [UserController::class, "profil"]);

Route::prefix("page")->group(function() {

    Route::group(["middleware" => ["guest"]], function() {
        Route::get("/login", [LoginController::class, "login"])->name("login");
        Route::post("/post_login", [LoginController::class, "post_login"]);
    });

    Route::group(["middleware" => ["auth"]], function() {
        Route::prefix("admin")->group(function() {
            // Dashboard
            Route::get("/dashboard", [AppController::class, "dashboard"]);

            // Kategori
            Route::get("/kategori/checkSlug", [KategoriController::class, "checkSlug"]);
            Route::resource("/kategori", KategoriController::class);

            // Berita
            Route::get("/berita/checkSlug", [BeritaController::class, "checkSlug"]);
            Route::resource("/berita", BeritaController::class);

            // Galeri
            Route::get("/galeri/edit", [GaleriController::class, "edit"]);
            Route::put("/galeri/simpan", [GaleriController::class, "update"]);
            Route::resource("/galeri", GaleriController::class);

            // Akun
            Route::resource("/akun", AkunController::class);

            // Kontak
            Route::get("/kontak/", [KontakController::class, "index"]);

            Route::resource("/profil", ProfilController::class);
            // Alamat
            Route::resource("/alamat", AlamatController::class);

            // Visi & Misi
            Route::resource("/visi_misi", VisiMisiController::class);

            // Hak Akses
            Route::resource("/hak_akses", HakAksesController::class);

            // TerakhirLogin
            Route::resource("/terakhir_login", TerakhirLoginController::class);

            Route::get("/logout", [LoginController::class, "logout"]);

        });
    });
});
