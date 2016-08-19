<?php
/**
 * Grav DateTools Plugin
 *
 * The DateTools Plugin provides provides date tools to use inside of Twig 
 * for filtering pages. With the release of Grav 0.9.13 `startDate` and 
 * `endDate` were introduced to collection parsing. You can use the 
 * following `datetools` to set various dates for retrieving collections. 
 *
 * PHP version 5.6+
 *
 * @package    Events
 * @author     Kaleb Heitzman <kalebheitzman@gmail.com>
 * @copyright  2016 Kaleb Heitzman
 * @license    https://opensource.org/licenses/MIT MIT
 * @version    1.0.6
 * @link       https://github.com/kalebheitzman/grav-plugin-datetools
 * @since      1.0.0 Initial Release
 */

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

		$args = [];
		$args['config'] = $this->grav['config'];

		$twig = $this->grav['twig'];
		$twig->twig_vars['datetools'] = new DateTools($args);
	}

}