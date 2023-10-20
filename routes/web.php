<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
// use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;            
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotacaoController;
use App\Http\Controllers\InscricaoController;
use App\Http\Controllers\ExportController;

use App\Http\Middleware\ValidaRotaMeuVoto;
            

Route::group(['middleware' => 'auth'], function () {


	Route::get('/home', 		[HomeController::class, 'index'])->name('home');
	Route::post('logout', 		[LoginController::class, 'logout'])->name('logout');

	Route::get('/register', 	[RegisterController::class, 'create'])->name('register');
	Route::post('/register', 	[RegisterController::class, 'store'])->name('register.perform');

	Route::get('/form', 		 [HomeController::class, 'formulario'])->name('formulario');
	Route::post('/formsave', [HomeController::class, 'formsave'])->name('formsave');

	Route::put('inscricao/{id}/avalia' , [InscricaoController::class, 'avalia']);
	
	Route::resources([
		'user'		  => UserController::class,
		'votacao'     => VotacaoController::class,
		'inscricao'	  => InscricaoController::class,
		'export'	  => ExportController::class,
	]);

	Route::get('checacpfexiste/{cpf}', [VotacaoController::class, 'checacpfexiste']);
	Route::get('meuvoto/{cpf}',		   [VotacaoController::class, 'meuvoto'])->middleware(ValidaRotaMeuVoto::class);
	Route::post('/vota',			   [VotacaoController::class, 'vota'])->name('vota');

	Route::get('/resultado',		   [HomeController::class,  'resultado'])->name('resultado');

	Route::get('/confirmados',   [ExportController::class, 'confirmados'])->name('confirmados');
	Route::get('/recusados',     [ExportController::class, 'recusados'])->name('recusados');
	Route::get('/votacaofinal',  [ExportController::class, 'votacaofinal'])->name('votacaofinal');


	
});


	Route::get('/', [LoginController::class, 'show'])->middleware('guest')->name('login');
	Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
	// Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
	// Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
