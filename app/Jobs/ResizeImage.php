<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Image;
use Spatie\Image\Manipulations;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

	private $path, $fileName, $w, $h;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
		$this->fileName = basename($filePath);
		$this->w = $w;
		$this->h = $h;
    }

    public function handle()
    {
        $w = $this->w;
		$h = $this->h;

		$sourcePath = storage_path() . '/app/' . $this->path . '/' . $this->fileName;
		$destPath = storage_path() . '/app/' . $this->path . "/crop{$w}x{$h}_" . $this->fileName;
		
		Image::load($sourcePath)
		->crop(Manipulations::CROP_CENTER, $w, $h)
		->watermark('public/img/watermark.png')
		->watermarkOpacity(30)
		->watermarkPadding(50)
		->watermarkPosition(Manipulations::POSITION_CENTER)
		->watermarkHeight(50, Manipulations::UNIT_PERCENT)
		->save($destPath);
    }
}
