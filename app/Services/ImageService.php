<?php

namespace App\Services;

use App\Models\Image;
use App\Repositories\ImageRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class ImageService
{
    /**
     * @var ImageRepository;
     */
    protected $imageRepository;

    /**
     * ImageService constructor
     * @param ImageRepository $imageRepository;
     */
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }

    /**
     *
     */
    public function saveNewAdImage(int $userId, UploadedFile $file)
    {
        $uploadService = new UploadService();
        $path = $uploadService->uploadImage($file);
        return $this->imageRepository->store($userId, $path, 'ad_main');
    }

    public function saveExistingAdImage(int $userId, UploadedFile $file, int $adId)
    {
        $uploadService = new UploadService();
        $path = $uploadService->uploadImage($file);
        $newImage = $this->imageRepository->store($userId, $path, 'ad');
        //If ad was created without image set current image as main
        if(count($this->imageRepository->getImagesByAdId($adId)) == 0){
            $newImage->image_type = 'ad_main';
        }
        return $newImage;
    }

    public function updateExistingAdImage(array $imageData)
    {
        $uploadService = new UploadService();
        if (Arr::has($imageData, 'imageMain')) {
            $this->imageRepository->setNewMainImage($imageData['imageMain']);
        }
        if (Arr::has($imageData, 'removeImage')) {
            $imagesToRemove = $this->imageRepository->getImagesById($imageData['removeImage']);
            foreach ($imagesToRemove as $imageToRemove) {
                $uploadService->removeImage($imageToRemove->path);
            }
            $this->imageRepository->deleteImagesById($imageData['removeImage']);
            //If main image was removed and no new main image was set among remaining
            //set first remaining image as main
            $adId = $imagesToRemove[0]->ad_id;
            $remainingImages = $this->imageRepository->getImagesByAdId($adId);
            if (count($remainingImages) !== 0) {
                foreach ($remainingImages as $image){
                    if($image->image_type == 'ad_main'){
                        $mainImageId = $image->id;
                        break;
                    }
                }
                if(!isset($mainImageId)){
                    $this->imageRepository->setNewMainImage($remainingImages[0]->id);
                }
            }
        }
    }
}
