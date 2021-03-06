<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;
use Cake\ORM\TableRegistry;




  $site_config = TableRegistry::get('Siteconfigs')->find()->first();
	$front_theme = $site_config->front_theme;

Router::scope('/', ['plugin'=>$front_theme], function (RouteBuilder $routes) {
		$routes->connect('/',[ 'controller' => 'post', 'action' => 'home']);
	  $routes->fallbacks(DashedRoute::class);
   
});

Router::scope('/api', ['plugin'=>$front_theme], function (RouteBuilder $routes) {
		$routes->connect('/',[ 'controller' => 'post', 'action' => 'home','prefix'=>'api']);
		$routes->connect('/:controller/:action',['prefix'=>'api']);
	
	  $routes->fallbacks(DashedRoute::class);
   
});
/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */

