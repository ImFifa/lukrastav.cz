<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;


class NewsPresenter extends BasePresenter
{

    public function renderDefault(): void
    {
		$this->template->news = $this->repository->getPublicNews();
    }

    public function renderShow($slug): void
    {
		$this->template->new = $this->repository->getNew($slug);
    }
}
