<?php

namespace App\Repositories;

use App\Models\Image;

class ImageRepository
{
    /**
     * @var Image
     */
    protected $image;

    /**
     * ImageRepository constructor
     * @param Image $image
     */
    public function __construct(Image $image)
    {
        $this->image = $image;
    }

    public function store(int $userId, string $path, string $imageType)
    {
        $image = new Image([
            'user_id' => $userId,
            'path' => $path,
            'image_type' => $imageType
        ]);

        return $image;
    }

    public function getImagesById(array $images)
    {
        return Image::whereIn('id', $images)->get();
    }

    public function deleteImagesById(array $images)
    {
        Image::destroy($images);
    }

    public function setNewMainImage(int $id)
    {
        $image = Image::findOrFail($id);
        Image::where('ad_id', $image->ad_id)->update(['image_type' => 'ad']);
        $image->image_type = 'ad_main';
        $image->save();
    }

    public function getImagesByAdId(int $adId)
    {
        Image::where('ad_id', $adId)->get();
    }
}
