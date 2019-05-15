<?php

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/crop', function () {
	$directories = Storage::disk('local')->directories('photos/originals');

	ini_set('memory_limit', '-1');

	Storage::disk('public')->deleteDirectory('photos');

	foreach ($directories as $directory)
	{
		resizeImages($directory);
    }

	ini_set('memory_limit', '256');
});