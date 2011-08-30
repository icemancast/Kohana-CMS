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
	<caption>Page Items</caption>
	<thead>
  	<tr>
		<th width="25">id</td>
		<th>Content Title</td>
		<th width="65">Status</td>
		<th width="100">Date Modified</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($contents as $content): ?>
		<?php
			$date_modified = date('M d, y', $content->date_modified);
			echo '<tr>
				<td>' . $content->id . '</td>
				<td>' . $content->content_title . '</td>
				<td>' . $content->status . '</td>
				<td>' . $date_modified . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/content/manage/' . $content->id . '"><img src="' . url::base() . 'media/admin/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>