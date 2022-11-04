<?php settings_errors(); ?>
<div class="todo-it">
    <div class="o-wrap">
        <div class="o-col--1/2">
            <form method="post" action="options.php">
		        <?php
		        settings_fields( 'todoit_options' );
		        do_settings_sections( 'todoit_options_page' );
		        submit_button();
		        ?>
            </form>
        </div>
    </div>
</div>