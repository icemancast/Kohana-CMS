<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/nav/manage', array('class' => 'form')); ?>

<fieldset>

<legend>All required</legend>

<p>
	<?= Form::label('mainnav', '* Main Nav'); ?>
	<?= Form::select('mainnav', $nav_select, !empty($post['mainnav']) ? $post['mainnav'] : '', array('id' => 'mainnav' )); ?>
</p>

<p>
	<?= Form::label('nav_title', '* Nav Title'); ?>
	<?= Form::input('nav_title', !empty($post['nav_title']) ? $post['nav_title'] : '', array('id' => 'nav_title' )); ?>
</p>

<p>
	<?= Form::label('sort', '* Sort'); ?>
	<?= Form::input('sort', !empty($post['sort']) ? $post['sort'] : '0', array('id' => 'sort' )); ?>
</p>

</fieldset>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>