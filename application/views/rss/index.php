<?php
#views/rss/index.php
$this->load->view($this->config->item('theme').'header');
?>

<h2><?php echo $title ?></h2>

<?php 
	foreach ($link as $rss_category): ?>
    	
        <h3><a href="<?php echo $rss_category['link']; ?>"><?php echo $rss_category['link'];?></a></h3>

<?php endforeach ?>

<?php
$this->load->view($this->config->item('theme').'footer');
?>