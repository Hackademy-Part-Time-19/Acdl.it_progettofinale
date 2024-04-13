<?php

namespace App\Jobs;

use Spatie\Image\Image as SpatieImage;

use App\Models\Image;

use Illuminate\Bus\Queueable;

use Spatie\Image\Manipulations;

use Illuminate\Queue\SerializesModels;

use Illuminate\Queue\InteractsWithQueue;

use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Foundation\Bus\Dispatchable;

class Watermark implements ShouldQueue

{

    private $ad_image_id;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct($ad_image_id)

    {

        $this->ad_image_id = $ad_image_id;
    }

    public function handle(): void

    {

        $i = Image::find($this->ad_image_id);

        if (!$i) {

            return;
        }

        $srcPath = storage_path('app/public/' . $i->path);

        $imageWatermark = SpatieImage::load($srcPath);

        $imageWatermark->watermark(base_path('resources/img/LogoPresto.png'))

            ->watermarkPosition('bottom-right')

            ->watermarkPadding(10, 10)

            ->watermarkOpacity(50)

            ->watermarkFit(Manipulations::FIT_STRETCH)

            ->save($srcPath);
    }
}
