<?php

if ($this->params['controller'] == 'users') {
	if ( $this->params['action'] == 'signup' ) {
		echo $this->Html->script(array("jquery.validate","signup_validate"));
	}
}
?>
