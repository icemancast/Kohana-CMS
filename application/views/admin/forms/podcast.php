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
	
<legend>All required</legend>

<p>
	<?= Form::label('podcast_title', '* Podcast Title'); ?>
	<?= Form::input('podcast_title', !empty($post['podcast_title']) ? $post['podcast_title'] : '', array('id' => 'podcast_title' )); ?>
</p>

<p>
	<?= Form::label('podcast_author', '* Podcast Author'); ?>
	<?= Form::input('podcast_author', !empty($post['podcast_author']) ? $post['podcast_author'] : '', array('id' => 'podcast_author' )); ?>
</p>

<p>
	<?= Form::label('link', '* Link (url)'); ?>
	<?= Form::input('link', !empty($post['link']) ? $post['link'] : '', array('id' => 'link' )); ?>
</p>

<p>
	<?= Form::label('description', '* Description'); ?>
	<?= Form::textarea('description', !empty($post['description']) ? $post['description'] : '', array('id' => 'description' )); ?>
</p>

<p>
	<?= Form::label('subtitle', 'Sub Title'); ?>
	<?= Form::input('subtitle', !empty($post['subtitle']) ? $post['subtitle'] : '', array('id' => 'subtitle' )); ?>
</p>

<p>
	<?= Form::label('summary', '* Summary'); ?>
	<?= Form::textarea('summary', !empty($post['summary']) ? $post['summary'] : '', array('id' => 'summary' )); ?>
</p>

<p>
	<?= Form::label('owner_name', '* Owner Name'); ?>
	<?= Form::input('owner_name', !empty($post['owner_name']) ? $post['owner_name'] : '', array('id' => 'owner_name' )); ?>
</p>

<p>
	<?= Form::label('owner_email', '* Owner Email'); ?>
	<?= Form::input('owner_email', !empty($post['owner_email']) ? $post['owner_email'] : '', array('id' => 'owner_email' )); ?>
</p>

<p>
	<?= Form::label('image', '* Image'); ?>
	<?= Form::input('image', !empty($post['image']) ? $post['image'] : '', array('id' => 'image' )); ?>
</p>

<p>
	<?= Form::label('image_title', '* Image Title'); ?>
	<?= Form::input('image_title', !empty($post['image_title']) ? $post['image_title'] : '', array('id' => 'image_title' )); ?>
</p>

<p>
	<?= Form::label('image_link', '* Image Link'); ?>
	<?= Form::input('image_link', !empty($post['image_link']) ? $post['image_link'] : '', array('id' => 'image_link' )); ?>
</p>

<p>
	<?= Form::label('image_width', '* Width x Height'); ?>
	<?= Form::input('image_width', !empty($post['image_width']) ? $post['image_width'] : '', array('id' => 'image_width', 'size' => '4', 'maxlength' => '4' )); ?> 
	x 
	<?= Form::input('image_height', !empty($post['image_height']) ? $post['image_height'] : '', array('id' => 'image_height', 'size' => '4', 'maxlength' => '4' )); ?>
</p>

<p>
	<?= Form::label('image_itunes', '* Image iTunes'); ?>
	<?= Form::input('image_itunes', !empty($post['image_itunes']) ? $post['image_itunes'] : '', array('id' => 'image_itunes' )); ?>
</p>

<p>
	<?= Form::label('category', '* Category'); ?>
	<?= Form::input('category', !empty($post['category']) ? $post['category'] : '', array('id' => 'category' )); ?>
</p>

<p>
	<?= Form::label('category_itunes', '* iTunes Category'); ?>
	<?= Form::input('category_itunes', !empty($post['category_itunes']) ? $post['category_itunes'] : '', array('id' => 'category_itunes' )); ?>
</p>

<p>
	<?= Form::label('subcategory_itunes', '* iTunes Subcategory'); ?>
	<?= Form::input('subcategory_itunes', !empty($post['subcategory_itunes']) ? $post['subcategory_itunes'] : '', array('id' => 'subcategory_itunes' )); ?>
</p>

<p>
	<?= Form::label('keywords', '* Keywords'); ?>
	<?= Form::input('keywords', !empty($post['keywords']) ? $post['keywords'] : '', array('id' => 'keywords' )); ?>
	 <small>(keyword 1, keyword 2, etc...)
</p>

<p>
	<label>&nbsp;</label>
	<?= Form::hidden('id', $post['id']); ?>
	<?= Form::submit('send', 'Submit to my Power', array('class' => 'button ui-corner-all')); ?>
</p>

<?= Form::close(); ?>