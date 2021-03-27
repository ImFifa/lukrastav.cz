<?php

namespace App\Service;

use App\Model\GalleryModel;
use App\Model\ImageModel;
use App\Model\NewModel;
use Nette\Database\Table\ActiveRow;
use Nette\Database\Table\Selection;

/**
 * @property-read GalleryModel $gallery
 * @property-read NewModel $new
 * @property-read ImageModel $image
 */
class ProjectModelRepository extends ModelRepository
{


	public function getFrontImageNameByGalId(int $galleryId): ActiveRow
	{
		return $this->image->getTable()->where('gallery_id', $galleryId)->where('position', 0)->fetch();
	}

	public function getPublicNews(): array
	{
		return $this->new->getTable()->where('public', 1)->order('created DESC')->order('id DESC')->fetchAll();
	}

	public function getNew($slug): ActiveRow
	{
		return $this->new->getTable()->where('slug', $slug)->fetch();
	}

	public function getGalleries(): array
	{
		return $this->gallery->getTable()->order('id DESC')->fetchAll();
	}

	public function getImageByGallery(int $id): array
	{
		return $this->image->getTable()->where('gallery_id', $id)->order('id DESC')->order('position ASC')->fetchAll();
	}

}
