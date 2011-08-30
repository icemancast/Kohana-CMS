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
	<caption>Navigation Items</caption>
	<thead>
  	<tr>
		<th width="25">id</td>
		<th>Title</td>
		<th width="100">Last Modified</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($navs as $nav): ?>
		<?php
			$date_created = date('M d, y', $nav->date_created);
		
			echo '<tr>
				<td>' . $nav->id . '</td>
				<td>' . $nav->nav_title . '</td>
				<td>' . $date_created . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/nav/manage/' . $nav->id . '"><img src="' . url::base() . 'media/admin/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>