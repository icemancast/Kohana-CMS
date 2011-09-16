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
		<th>Sermon Title</td>
		<th width="100">Sermon Date</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($sermons as $sermon): ?>
		<?php
			$date_sermon = date('M d, y', $sermon->date_sermon);
			echo '<tr>
				<td>' . $sermon->id . '</td>
				<td>' . $sermon->sermon_title . '</td>
				<td>' . $date_sermon . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/sermon/manage/' . $sermon->id . '"><img src="' . url::base() . 'media/admin/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>