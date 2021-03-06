<?php
//Include relevant models
require_once(__DIR__.'/models/Menu.php');
require_once(__DIR__.'/models/MenuItem.php');

//Controllers and views get included automatically

class PailsMenu
{
	static function initialize()
	{
		if (defined('ADMIN_MENU_SLUG'))
		{
			Menu::add_static_item(ADMIN_MENU_SLUG, 'Menus', '/menu');
		}
	}
}