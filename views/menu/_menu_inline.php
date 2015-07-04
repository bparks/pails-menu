<?php
$items = array();
if (is_a($model, 'ActiveRecord\Model'))
	$items = $model->menu_items;
else
	$items = $model;
?>
<ul>
<?php foreach ($items as $item): ?>
	<li><a href="<?php echo $item->url; ?>"><?php echo $item->name; ?></a></li>
	<?php
	if ($item->children && count($item->children))
		$this->render_partial('menu/_menu_inline', $item->children);
	?>
<?php endforeach; ?>
</ul>