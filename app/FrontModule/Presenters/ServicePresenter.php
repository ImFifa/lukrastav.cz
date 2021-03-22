<?php declare(strict_types = 1);

namespace App\FrontModule\Presenters;


class ServicePresenter extends BasePresenter
{

    public function renderDefault(): void
    {

    }

    public function renderShow($slug): void
    {

        $services = array(
            'lesenarske-sluzby' => 'Lešenářské služby',
            'stavebni-prace' => 'Stavební práce',
            'zemni-prace' => 'Zemní práce',
            'pokladka-kanalizace' => 'Pokládka kanalizace',
            'elektroinstalace' => 'Elektroinstalace',
            'autodoprava' => 'Autodoprava',
        );

        if (array_key_exists($slug, $services)) {
            $this->template->service = $services[$slug];
            $this->template->slug = $slug;
        } else {
            $this->error();
        }
    }
}