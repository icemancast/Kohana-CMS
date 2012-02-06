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

<table border="1" class="table admin-table">
	<caption>Categories</caption>
	<thead>
  	<tr>
		<th width="25">id</td>
		<th>Category Title</td>
		<th width="100">Date Modified</td>
		<th width="35">Edit</td>
	</tr>
	</thead>
	<tbody>
		
		<?php 
		
			foreach($categories as $category):
		
			$date_modified = (empty($category->date_modified) ? $category->date_created : $category->date_modified);
			$date_modified = date('M d, y', $date_modified);
						
			echo '<tr>
				<td>' . $category->id . '</td>
				<td>' . UTF8::ucfirst($category->category_title) . '</td>
				<td>' . $date_modified . '</td>
				<td class="text-center"><a href="' . url::base() . 'admin/category/edit/' . $category->id . '"><img src="' . url::base() . 'media/admin/images/icons/application_edit.png"></a></td>
			</tr>';	?>
		<?php endforeach; ?>
	</tbody>
</table>