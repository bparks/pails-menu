<?php
/*
CREATE TABLE menu_items (
	id integer not null auto_increment primary key,
	name varchar(255) not null,
	url varchar(255),
	menu_id integer,
	parent_id integer,
	node_id integer,
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp
);
*/
class MenuItem extends ActiveRecord\Model
{
	static $belongs_to = array(
		array('menu'),
		array('parent', 'class_name' => 'MenuItem')
	);

	static $has_many = array(
		array('children', 'class_name' => 'MenuItem', 'foreign_key' => 'parent_id')
	);

	static $has_one = array(
		array('node')
	);
}