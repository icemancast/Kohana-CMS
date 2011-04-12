<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/content/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('page_id', '* Mother page'); ?>
	<?= Form::select('page_id', $select_page, !empty($post['page_id']) ? $post['page_id'] : ''); ?>
</p>

<p>
	<?= Form::label('content_title', '* Content Title'); ?>
	<?= Form::input('content_title', !empty($post['content_title']) ? $post['content_title'] : '', array('id' => 'content_title' )); ?>
</p>

<p>
	<?= Form::label('content', '* Content'); ?>
	<?= Form::textarea('content', !empty($post['content']) ? $post['content'] : '', array('id' => 'content' )); ?>
</p>

<p class="clear"></p>

<p>
	<?= Form::label('status', '* Page Status'); ?>
	<?= Form::select('status', $select_status, !empty($post['status']) ? $post['status'] : ''); ?>
</p>

<p>
	<?= Form::label('sort', '* Sort'); ?>
	<?= Form::input('sort', !empty($post['sort']) ? $post['sort'] : '0', array('id' => 'sort' )); ?>
</p>

<p>
	<?= Form::label('date_published', '* Date published'); ?>
	<?= Form::input('date_published', !empty($post['date_published']) ? $post['date_published'] : '', array('id' => 'date_published', 'class' => 'datepicker' )); ?>
</p>

<p>
	<?= Form::label('date_expired', 'Date expired'); ?>
	<?= Form::input('date_expired', !empty($post['date_expired']) ? $post['date_expired'] : '0', array('id' => 'date_expired', 'class' => 'datepicker' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>