<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;

use App\Model\ImageModel;
use App\Model\NewModel;

class HomepagePresenter extends BasePresenter
{

	/** @var ImageModel @inject */
	public $images;

    /** @var NewModel @inject */
    public $news;

	public function renderDefault(): void
	{
		$this->template->images = $this->images->getImagesByGallery(1);
		$this->template->news = $this->news->getPublicNews($this->lang)->limit(2);

		$galleries = $this->repository->getGalleries();
		$this->template->galleries = $galleries;
	}
}
