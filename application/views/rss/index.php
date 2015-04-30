<?php
    $this->load->view($this->config->item('theme').'header');
?>

<?php foreach ($links as $l):?>
    	
<h3>
	<?php echo anchor('rss/view' . $l, $l, array('title' => $l));?>
</h3>

<?php endforeach ?>

<?php
    $this->load->view($this->config->item('theme').'footer');
?>