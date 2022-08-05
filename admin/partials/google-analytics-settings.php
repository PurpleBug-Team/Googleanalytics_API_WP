<?php
/**
 * Analytics API Settings
 */
?>
<div class="wrap">
	<form method="post" action="options.php" enctype="multipart/form-data"> 
        <?php
		settings_fields( 'analytics_settings_option' );
		do_settings_sections( 'analytics_settings_option' );
		submit_button();
		?>
	</form>
</div>