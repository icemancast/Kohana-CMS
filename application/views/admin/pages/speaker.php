<?php $message = Session::instance()->get('message');

if(strlen($message) > 1): ?>

<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<li><?= $message ?></li>
</ul>

<p class="clear"></p>

<?php endif;

Session::instance()->delete('message');

?>

<p>
<table border="1" class="table admin-table">
	<caption>Speakers in database</caption>
	<thead>
  	<tr>
		<th width="25">id</td>
		<th>Name</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach($speakers as $speaker):
	
	echo '<tr>
		<td>' . $speaker->id . '</td>
		<td>' . $speaker->name . ' - <em>' . $speaker->title . '</em></td>
		<td class="text-center"><a href="' . url::base() . 'admin/speaker/manage/' . $speaker->id . '"><img src="' . url::base() . 'media/admin/images/icons/application_edit.png"></a></td>
	</tr>';
	
	endforeach; ?>
	
	</tbody>
</table>
</p>

<p class="clear"></p>