<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;


use App\FrontModule\classes\galleriesOverview;
use App\Model\GalleryModel;
use App\Model\ImageModel;

class GalleryPresenter extends BasePresenter
{

	/** @var ImageModel @inject */
	public $images;

	/** @var GalleryModel @inject */
	public $gallery;

	public array $galleriesArr;

    public function renderDefault(): void
    {
		$galleries = $this->repository->getGalleries();

		foreach ($galleries as $gallery) {
			$galleriesOverview = new galleriesOverview;
			$galleriesOverview->galleryId = $gallery->id;
			$galleriesOverview->galleryName = $gallery->name;
			$galleriesOverview->imageName = $this->repository->getFrontImageNameByGalId($gallery->id)->name;
			$galleriesArr[] = $galleriesOverview;
		}

		$this->template->galleries = $galleriesArr;
    }

    public function renderShow(int $galleryId): void
    {
		$this->template->gallery = $this->gallery->getGallery($galleryId);
		$this->template->images = $this->images->getImagesByGallery($galleryId);
    }
}
