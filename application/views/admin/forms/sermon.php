<?php if(!empty($errors)): ?>
<ul class="errors ui-state-error ui-corner-all">
	<span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>
	<?php foreach($errors as $error) : ?>
	<li><?= ucfirst($error); ?></li>
	<?php endforeach ?>
</ul>
<?php endif; ?>

<?= Form::open('admin/podcast/manage', array('class' => 'form')); ?>

<fieldset>
	
<legend>* required</legend>

<p>
	<?= Form::label('podcast_id', '* Podcast ID'); ?>
	<?= Form::select('podcast_id', $podcast_select, !empty($post['podcast_id']) ? $post['podcast_id'] : ''); ?>
</p>

<p>
	<?= Form::label('speaker_id', '* Speaker'); ?>
	<?= Form::select('speaker_id', $speaker_select, !empty($post['speaker_id']) ? $post['speaker_id'] : ''); ?>
</p>

<p>
	<?= Form::label('sermon_title', '* Sermon Title'); ?>
	<?= Form::input('sermon_title', !empty($post['sermon_title']) ? $post['sermon_title'] : '', array('id' => 'sermon_title' )); ?>
</p>

<p>
	<?= Form::label('description', '* Description'); ?>
	<?= Form::textarea('description', !empty($post['description']) ? $post['description'] : '', array('id' => 'description' )); ?>
</p>

<p>
	<?= Form::label('file_size', '* File Size'); ?>
	<?= Form::input('file_size', !empty($post['file_size']) ? $post['file_size'] : '', array('id' => 'file_size' )); ?>
</p>

<p>
	<?= Form::label('duration', '* Duration'); ?>
	<?= Form::input('duration', !empty($post['duration']) ? $post['duration'] : '', array('id' => 'duration' )); ?>
</p>

<p>
	<?= Form::label('cupertino', 'Cupertino'); ?>
	<?= Form::input('cupertino', !empty($post['cupertino']) ? $post['cupertino'] : '', array('id' => 'cupertino' )); ?>
</p>

<p>
	<?= Form::label('lightcast_location', '* Lightcast Location'); ?>
	<?= Form::input('lightcast_location', !empty($post['lightcast_location']) ? $post['lightcast_location'] : '', array('id' => 'lightcast_location' )); ?>
</p>

<p>
	<?= Form::label('lightcast_code', '* Lightcast Code'); ?>
	<?= Form::textarea('lightcast_code', !empty($post['lightcast_code']) ? $post['lightcast_code'] : '', array('id' => 'lightcast_code' )); ?>
</p>

<p>
	<?= Form::label('mp3_file', '* mp3 File'); ?>
	<?= Form::input('mp3_file', !empty($post['mp3_file']) ? $post['mp3_file'] : '', array('id' => 'mp3_file' )); ?>
	<small><?= $mp3_file . ' possible file name?'; ?></small>
</p>

<p>
	<?= Form::label('keywords', '* Keywords'); ?>
	<?= Form::input('keywords', !empty($post['keywords']) ? $post['keywords'] : '', array('id' => 'keywords' )); ?>
	 <small>(keyword 1, keyword 2, etc...)</small>
</p>

<p>
	<?= Form::label('date_sermon', '* Sermon Date'); ?>
	<?= Form::input('date_sermon', !empty($post['date_sermon']) ? $post['date_sermon'] : '', array('id' => 'date_sermon', 'class' => 'datepicker' )); ?>
</p>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>