<?php

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
	$directories = Storage::disk('local')->directories('photos/originals');
	Storage::disk('local')->deleteDirectory('photos/thumbnails');
	Storage::disk('local')->makeDirectory('photos/thumbnails');

	ini_set('memory_limit', '-1');

	resizeImages('photos/originals', false);

	foreach ($directories as $directory)
	{
		resizeImages($directory);
    }

	ini_set('memory_limit', '256');
});