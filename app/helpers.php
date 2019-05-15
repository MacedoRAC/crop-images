<?php

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

function resizeImages($directory)
{
	$directoryName = basename($directory);
	$basePathMedium = "photos/medium/{$directoryName}/";
//	$basePathThumbnails = "photos/thumbnails/{$directoryName}/";

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

	Storage::disk('public')->put($fullPath, $image);
}

function resizeAndStoreToThumbnail($image, $fullPath)
{
	$image = resizeTo($image, 350);

	Storage::disk('public')->put($fullPath, $image);
}

function resizeTo($image, $width = null, $height = null)
{
	return $image = $image->resize($width, $height, function ($constraint) {
		$constraint->aspectRatio();
		$constraint->upsize();
	})->encode('jpg');
}
