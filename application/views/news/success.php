<?php
#views/news/success.php
$this->load->view($this->config->item('theme').'header');
?>

<?php
echo 'You success this thing!';
?>

<?php
$this->load->view($this->config->item('theme').'footer');
?>