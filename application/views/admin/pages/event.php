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
		<th width="100">Event Date</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php foreach($events as $event): ?>
		<?php
			$date_event = date('M d, y', $event->date_event);
		
			echo '<tr>
				<td>' . $event->id . '</td>
				<td>' . $event->event_title . '</td>
				<td>' . $date_event . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/event/manage/' . $event->id . '"><img src="' . url::base() . 'media/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>
</p>

<p class="clear"></p>