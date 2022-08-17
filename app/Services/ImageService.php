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

    public function saveExistingAdImage(int $userId, UploadedFile $file)
    {
        $uploadService = new UploadService();
        $path = $uploadService->uploadImage($file);
        return $this->imageRepository->store($userId, $path, 'ad');
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
            $adId = $imagesToRemove[0]->ad_id;
            $images = $this->imageRepository->getImagesByAdId($adId);
            dd($images);
        }
    }
}
