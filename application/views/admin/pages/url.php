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
		<th width="35">Sort</td>
		<th width="100">Date Created</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($urls as $url): ?>
		<?php
			$date_created = date('M d, y', $url->date_created);
			echo '<tr>
				<td>' . $url->id . '</td>
				<td>' . $url->url_title . '</td>
				<td>' . $url->sort . '</td>
				<td>' . $date_created . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/url/manage/' . $url->id . '"><img src="' . url::base() . 'media/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>