<?php

use App\Support\ProgramCatalog;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::view('/programs', 'programs', ['groups' => ProgramCatalog::forProgramsPage()])->name('programs');
Route::view('/science', 'science', ['groups' => ProgramCatalog::forSciencePage()])->name('science');
