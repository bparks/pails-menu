<h2>Add Menu Item</h2>

<p>Adding to menu <?php echo $this->model->name; ?></p>

<form action="/menu_item/create" method="POST">
<?php echo $this->input_for('menu_id', '', array('type' => 'hidden', 'value' => $this->model->id)); ?>
<?php echo $this->input_for('name', 'Name'); ?>
<hr />
<?php echo $this->input_for('url', 'Enter a URL'); ?>
<p><strong>OR</strong></p>
<?php echo $this->input_for('node_id', 'Choose existing content', array(
	'type' => 'list',
	'options' => $this->model_options(Node::all(), 'id', '{title} - {type} - {slug}')
)); ?>
<hr />
<?php echo $this->input_for('parent_id', 'Parent', array(
	'type' => 'list',
	'options' => $this->model_options($this->model->all_items, 'id', 'name')
)); ?>
<input type="submit" value="Save" />
</form>