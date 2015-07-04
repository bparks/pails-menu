CREATE TABLE menus (
	id integer not null auto_increment primary key,
	name varchar(255) not null,
	slug varchar(255),
	created_at timestamp default current_timestamp,
	updated_at timestamp default current_timestamp
);

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