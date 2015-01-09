<?php

namespace Grav\Plugin;

use Grav\Common\Plugin;

class DateToolsPlugin extends Plugin
{
	/**
	 * @return array
	 */
	public static function getSubscribedEvents() 
	{
		return [
			'onPluginsInitialized' => ['onPluginsInitialized', 0],
		];
	}

	/**
	 * Initialize configuration
	 */
	public function onPluginsInitialized()
	{
		if ( $this->isAdmin() ) {
			$this->active = false;
			return;
		}

		$this->enable([
			'onTwigSiteVariables' => ['onTwigSiteVariables', 0]
		]);
	}

	/**
	 * Set needed variables to display events
	 */
	public function onTwigSiteVariables()
	{
		require_once __DIR__ . '/classes/datetools.php';

		$twig = $this->grav['twig'];
		$twig->twig_vars['datetools'] = new DateTools();
	}

}