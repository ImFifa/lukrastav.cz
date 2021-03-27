<?php declare(strict_types = 1);

namespace App;

use Nette;
use Nette\Application\Routers\RouteList;

class RouterFactory
{

	use Nette\StaticClass;

	public static function createRouter(): Nette\Routing\Router
	{
		$router = new RouteList();

		$router->withModule('Admin')
			->addRoute('admin/<presenter>/<action>[/<id>]', 'Homepage:default');

		$router->withModule('Front')->addRoute('[<lang=cs (cs)>/]', 'Homepage:default');
		$router->withModule('Front')->addRoute('[<lang=cs (cs)>/]reference', 'Homepage:references');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]aktuality', 'News:default');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]aktualita/<slug>', 'News:show');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]sluzby', 'Service:default');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]sluzba/<slug>', 'Service:show');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]galerie', 'Gallery:default');
		$router->withModule('Front')->addRoute('[<lang=cs [a-z]{2}>/]galerie/<galleryId>', 'Gallery:show');
		return $router;
	}

}
