<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Spatie\Image\Enums\CropPosition;
use Spatie\Image\Image;
use Spatie\Image\Enums\Unit;

class ResizeImage implements ShouldQueue
{
    use Queueable;

    private $path;
    private $fileName;
    private $w;
    private $h;

    public function __construct($filePath, $w, $h)
    {
        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    public function handle(): void
    {
        $srcPath = storage_path('app/public/' . $this->path . '/' . $this->fileName);
        $destPath = storage_path('app/public/' . $this->path . "/crop_{$this->w}x{$this->h}_" . $this->fileName);

        Image::load($srcPath)
            ->crop($this->w, $this->h, CropPosition::Center)
            ->watermark(
                base_path('resources/img/watermark.png'),
                width: 120,
                height: 35,
                paddingX: 5,
                paddingY: 5,
                paddingUnit: Unit::Percent
            )
            ->save($destPath);
    }
}