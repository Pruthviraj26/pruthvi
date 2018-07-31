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


/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass(DashedRoute::class);






Router::prefix('admin', ['_namePrefix' => 'admin:'], function ($routes) {
	
		$routes->connect('/cms', ['plugin'=>'CMS'], ['routeClass' => 'DashedRoute']);
	Router::scope('/users',['controller'=>'users'], function (RouteBuilder $routes) { });
	
	
		//start default 
		$routes->connect('/home', ['controller'=>'pages','action' => 'home'], ['routeClass' => 'DashedRoute']);	
		
	
	
	
	$routes->connect('/:controller/togglestatus/:id', ['action' => 'togglestatus','id'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/changestatus/:status/:id', ['action' => 'changestatus','status','id'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/edit/:id', ['action' => 'add','id'], ['routeClass' => 'DashedRoute']);
		$routes->connect('/:controller/type/:type', ['controller'=>'users','action' => 'index','type'], ['routeClass' => 'DashedRoute']);		
	
	$routes->connect('/:controller/get/:id', ['action' => 'get','id'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/remove/:id', ['action' => 'remove','id'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/page/:page', ['action' => 'index','page'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/search/:search', ['action' => 'index',':search'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/status/:status', ['action' => 'index','status'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/:controller/status/:status/page/:page', ['action' => 'index','status','page'], ['routeClass' => 'DashedRoute']);
	
		$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);		
	$routes->connect('/:controller/:action', [], ['routeClass' => 'DashedRoute']);
  $routes->connect('/:controller/:action/:id', [], ['routeClass' => 'DashedRoute','id','id' => '\d+']);
	
	
  

	
  //end default 
	/*
	$routes->connect('/cards/:status', ['controller'=>'cards','action' => 'index','status','page'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/cards/:status/:page', ['controller'=>'cards','action' => 'index','status','page'], ['routeClass' => 'DashedRoute']);
	$routes->connect('/cards/:action', ['controller'=>'cards'], ['routeClass' => 'DashedRoute']);
	
	
	$routes->connect('/', ['controller' => 'Pages', 'action' => 'home', 'home']);
	$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
	
	$routes->connect('/:controller/edit/:id', ['action' => 'add'],['id' => '\d+', 'pass' => ['id']]);
	$routes->connect('/:controller/edit/:id', ['action' => 'add'],['id' => '\d+', 'pass' => ['id']]);
	*/
	
	
   
});


Router::scope('/', function (RouteBuilder $routes) {
	
			$routes->connect('/admin', ['controller' => 'Pages', 'action' => 'home','prefix' => 'admin'], ['routeClass' => 'DashedRoute']);	
	
	/*
 		$routes->connect('/admin', ['controller' => 'Pages', 'action' => 'home','prefix' => 'admin'], ['routeClass' => 'DashedRoute']);	
	  $routes->connect('/', ['controller' => 'Post', 'action' => 'home', 'home','prefix' => 'front']);	
	  $routes->connect('/:slug', ['controller' => 'Post', 'action' => 'index','slug', 'home','prefix' => 'front']);	
	
		$routes->connect('/:controller/get/:id', ['action' => 'get','id','prefix' => 'front'], ['routeClass' => 'DashedRoute']);
		
		$routes->connect('/:action', ['controller' => 'Pages','prefix' => 'front'], ['routeClass' => 'DashedRoute']);
  	$routes->connect('/:controller/:action/*', ['prefix' => 'front'], ['routeClass' => 'DashedRoute']);
		
		$routes->connect('/cards/:status/:id', ['controller'=>'cards','action'=>'changestatus','prefix' => 'front','status','id'], ['routeClass' => 'DashedRoute']);
		$routes->connect('/cards/delete/:id', ['controller'=>'cards','action'=>'delete','prefix' => 'front','status','id'], ['routeClass' => 'DashedRoute']);*/
	
	 
    $routes->fallbacks(DashedRoute::class);
});



/**
 * Load all plugin routes. See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
