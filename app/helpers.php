<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function resizeImages($directory, $createDirectory = true)
{
	$basePathMedium = "photos/medium/";
	$basePathThumbnails = "photos/thumbnails/";

	if($createDirectory) {
		$directoryName = basename($directory);
		Storage::disk('local')->makeDirectory($directoryName);

		$basePathMedium .= "{$directoryName}/";
		$basePathThumbnails .= "{$directoryName}/";
	}

	$images = Storage::disk('local')->files($directory);

	foreach ($images as $image) {
		$filename = basename($image);
		$image = Image::make(Storage::disk('local')->get($image));

		resizeAndStoreToMedium($image, $basePathMedium.$filename);
//		resizeAndStoreToThumbnail($image, $basePathThumbnails.$filename);

	}
}

function resizeAndStoreToMedium($image, $fullPath)
{
	$image = resizeTo($image, 800);

	Storage::disk('local')->put($fullPath, $image);
}

function resizeAndStoreToThumbnail($image, $fullPath)
{
	$image = resizeTo($image, 350);

	Storage::disk('local')->put($fullPath, $image);
}

function resizeTo($image, $width = null, $height = null)
{
	return $image = $image->resize($width, $height, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	})->encode('jpg');
}
