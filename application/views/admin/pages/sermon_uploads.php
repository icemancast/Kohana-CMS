<?php $message = Session::instance()->get('message');

if(strlen($message) > 1): ?>

<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<li><?= $message ?></li>
</ul>

<p class="clear"></p>

<? endif; 

Session::instance()->delete('message');

?>

<p>
<table border="1" class="table admin-table">
	<caption>Sermons not added to database yet</caption>
	<thead>
  	<tr>
		<th width="25">id</td>
		<th>Sermon Title</td>
		<th width="35">Add</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($sermons as $sermon): ?>
		<?php
			
			echo '<tr>
				<td>' . $sermon['id'] . '</td>
				<td>' . $sermon['title'] . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/sermon/manage/' . $sermon['id'] . '"><img src="' . url::base() . 'media/admin/images/icons/database_add.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>