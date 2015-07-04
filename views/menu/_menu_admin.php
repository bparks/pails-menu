<?php
$items = array();
if (is_a($model, 'ActiveRecord\Model'))
	$items = $model->menu_items;
else
	$items = $model;
?>
<div style="padding-left: 20px;">
<?php foreach ($items as $item): ?>
	<div>
		<h3><a href="<?php echo $item->url; ?>"><?php echo $item->name; ?></a></h3>
	</div>
	<?php
	if ($item->children && count($item->children))
		$this->render_partial('menu/_menu_admin', $item->children);
	?>
<?php endforeach; ?>
</div>