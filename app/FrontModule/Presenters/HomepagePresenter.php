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

        $this->template->services = array(
            'lesenarske-sluzby' => 'Lešenářské služby',
            'stavebni-prace' => 'Stavební práce',
            'zemni-prace' => 'Zemní práce',
            'pokladka-kanalizace' => 'Pokládka kanalizace',
            'elektroinstalace' => 'Elektroinstalace',
            'autodoprava' => 'Autodoprava',
        );
	}

	public function renderNew($slug): void
    {
        $this->template->news = $this->news->getNew($slug, $this->lang);
    }


}