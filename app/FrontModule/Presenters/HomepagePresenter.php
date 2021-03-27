<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

use App\FrontModule\classes\galleriesOverview;
use App\Model\ImageModel;
use App\Model\NewModel;

class HomepagePresenter extends BasePresenter
{

	/** @var ImageModel @inject */
	public $images;

    /** @var NewModel @inject */
    public $news;

	public array $galleriesArr;

	public function renderDefault(): void
	{
		$this->template->news = $this->news->getPublicNews($this->lang)->limit(2);

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
}
