<?php
    $this->load->view($this->config->item('theme').'header');
?>

<?php foreach ($link as $l): ?>
    	
<h3>
	<?php echo anchor('rss/' . $l['link'], $l['link']); ?>
</h3>

<?php endforeach ?>

<?php
    $this->load->view($this->config->item('theme').'footer');
?>