<?php
/**
 * @author Roman Chvanikoff <chvanikoff@gmail.com>
 * @year 2012
 */

Route::set('create', 'create')
	->defaults(array(
		'controller' => 'Job',
		'action' => 'create',
	));

Route::set('list', 'jobs/all')
	->defaults(array(
		'controller' => 'Job',
		'action' => 'list',
	));

Route::set('read', 'job/<id>')
	->defaults(array(
		'controller' => 'Job',
		'action' => 'read',
	));

Route::set('update', 'update')
	->defaults(array(
		'controller' => 'Job',
		'action' => 'update',
	));

Route::set('delete', 'delete')
	->defaults(array(
		'controller' => 'Job',
		'action' => 'delete',
	));

Route::set('faq', 'faq')
	->defaults(array(
		'controller' => 'faq',
		'action' => 'read',
	));

/**
 * Set the routes. Each route must have a minimum of a name, a URI and a set of
 * defaults for the URI.
 */
Route::set('default', '(<controller>(/<action>(/<id>)))')
	->defaults(array(
		'controller' => 'Index',
		'action'     => 'index',
	));