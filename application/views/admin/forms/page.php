<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/page/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('parent_id', 'Parent page'); ?>
	<?= Form::select('parent_id', $select_page, !empty($post['parent_id']) ? $post['parent_id'] : ''); ?>
</p>

<p>
	<?= Form::label('nav_id', '* Navigation to use'); ?>
	<?= Form::select('nav_id', $navs, !empty($post['nav_id']) ? $post['nav_id'] : ''); ?>
</p>

<p>
	<?= Form::label('head_code', 'Add head code'); ?>
	<?= Form::textarea('head_code', !empty($post['head_code']) ? $post['head_code'] : '', array('id' => 'head_code' )); ?>
</p>

<p>
	<?= Form::label('description', 'Page description'); ?>
	<?= Form::textarea('description', !empty($post['description']) ? $post['description'] : '', array('id' => 'description' )); ?>
</p>

<p>
	<?= Form::label('slug', '* Slug'); ?>
	<?= Form::input('slug', !empty($post['slug']) ? $post['slug'] : '', array('id' => 'slug' )); ?>
</p>

<p>
	<?= Form::label('browser_title', '* Browser title'); ?>
	<?= Form::input('browser_title', !empty($post['browser_title']) ? $post['browser_title'] : '', array('id' => 'browser_title' )); ?>
</p>

<p>
	<?= Form::label('page_title', '* Page title'); ?>
	<?= Form::input('page_title', !empty($post['page_title']) ? $post['page_title'] : '', array('id' => 'page_title' )); ?>
</p>

<p>
	<?= Form::label('status', '* Page Status'); ?>
	<?= Form::select('status', $select_status, !empty($post['status']) ? $post['status'] : ''); ?>
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