<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'index'));
	Router::connect('/st/*', array('controller' => 'pages', 'action' => 'staticpage'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/manager', array('controller' => 'users', 'action' => 'dashboard',"admin"=>"true"));
	Router::connect('/ad-change-password', array('controller' => 'users', 'action' => 'changepassword',"admin"=>"true"));
	Router::connect('/ad-locations/*', array('controller' => 'locations', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-new-location', array('controller' => 'locations', 'action' => 'add',"admin"=>"true"));
	Router::connect('/ad-languages/*', array('controller' => 'languages', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-new-language', array('controller' => 'languages', 'action' => 'add',"admin"=>"true"));
	Router::connect('/ad-cmspages/*', array('controller' => 'cmsPages', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-new-cmspage', array('controller' => 'cmsPages', 'action' => 'add',"admin"=>"true"));
	Router::connect('/ad-blogs/*', array('controller' => 'blogs', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-new-blog', array('controller' => 'blogs', 'action' => 'add',"admin"=>"true"));
	Router::connect('/ad-users/*', array('controller' => 'users', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-emailtemplates/*', array('controller' => 'emailTemplates', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ready_to_signin', array('controller' => 'users', 'action' => 'ready_to_signin'));
	Router::connect('/signup/*', array('controller' => 'users', 'action' => 'signup'));
	Router::connect('/forgot_password', array('controller' => 'users', 'action' => 'forgot_password'));
	Router::connect('/reset_password/*', array('controller' => 'users', 'action' => 'reset_password'));
	Router::connect('/confirmlink/*', array('controller' => 'users', 'action' => 'confirmlink'));
	Router::connect('/ad-digitalsignatures/*', array('controller' => 'digitalSignatures', 'action' => 'index',"admin"=>"true"));
	Router::connect('/ad-new-digitalsignature', array('controller' => 'digitalSignatures', 'action' => 'add',"admin"=>"true"));
	
	Router::connect('/dashboard', array('controller' => 'users', 'action' => 'dashboard'));
	
	


/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
