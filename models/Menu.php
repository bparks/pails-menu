<?php
/*
CREATE TABLE menus (
	id integer not null auto_increment primary key,
	name varchar(255) not null,
	slug varchar(255),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp
);
*/
class Menu extends ActiveRecord\Model
{
	static $has_many = array(
		array('__menu_items', 'class_name' => 'MenuItem', 'conditions' => array('parent_id is null')),
		array('all_items', 'class_name' => 'MenuItem')
	);

	private static $menu_defs = array();

	function __get($name) {
		if ($name == 'menu_items')
		{
			if (isset(self::$menu_defs[$this->slug]))
				return array_merge($this->__menu_items, self::$menu_defs[$this->slug]);
			else
				return $this->__menu_items;
		}
		return parent::__get($name);
	}

	static function construct ($slug)
	{
		$menu = self::find_by_slug($slug);

		//Ensure we have a valid menu object
		if (!$menu) $menu = new Menu(array(
			'name' => $slug,
			'slug' => $slug
		));

		return $menu;
	}

	static function add_static_item($slug, $name, $url, $subitems = array())
	{
		$item = (object)array(
			'name' => $name,
			'url' => $url,
			'children' => array()
		);

		foreach ($subitems as $key => $value)
		{
			$item->children[] = (object)array(
				'name' => $key,
				'url' => $url,
				'children' => array()
			);
		}

		if (isset(self::$menu_defs[$slug]))
			array_push(self::$menu_defs[$slug], $item);
		else
			self::$menu_defs[$slug] = array($item);
	}
}