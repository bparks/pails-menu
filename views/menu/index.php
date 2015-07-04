<h2>Menus</h2>

<div class="actions">
<a href="/menu/new">new menu</a>
</div>

<div class="menus">
<?php foreach ($this->model as $menu): ?>
	<div class="menu">
		<h3><a href="/menu/<?php echo $menu->slug; ?>"><?php echo $menu->name; ?></a></h3>
		<?php $this->render_partial('menu/_menu_actions', $menu); ?>
	</div>
<?php endforeach; ?>
</div>