<?php
class MenuController extends Pails\Controller
{
	use PailsAuthentication;
	use FormBuilder;

	public $before_actions = array('require_login');

	function index()
	{
		$this->model = Menu::all();
	}

	function __call($name, $arguments)
	{
		if ($name == 'new') {
			$this->view = 'menu/new';
			return;
		}

		$this->model = Menu::find_by_slug($name);

		if (!($this->model))
		{
			$this->view = false;
			return 404;
		}

		if (count($arguments) > 0)
		{
			$opts = $arguments[0];
			if ($opts[0] == 'edit')
			{
				$this->view = 'menu/edit';
			}
			elseif ($opts[0] == 'delete')
			{
				$this->view = 'menu/delete';
			}
			elseif ($opts[0] == 'add-item')
			{
				$this->view = 'menu_item/new';
			}
			else
				$this->view = 'menu/show';
		}
		else
		{
			$this->view = 'menu/show';
		}
	}
}