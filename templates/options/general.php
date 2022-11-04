<?php settings_errors(); ?>
<div class="todo-it">
    <div class="c-tabs c-tabs--no-border js-tabs">
        <div class="c-tabs__nav">
            <ul class="c-tabs__nav__list">
                <li class="c-tabs__nav__item">
                    <a href="#general" class="c-tabs__link js-tab-link is-active">General</a>
                </li>
                <li class="c-tabs__nav__item">
                    <a href="#customization" class="c-tabs__link js-tab-link">Customization</a>
                </li>
            </ul>
        </div>

        <div class="c-tabs__pane">
            <div id="general" class="c-tabs__pane__tab js-tabs-tab is-active">
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
            <div id="customization" class="c-tabs__pane__tab js-tabs-tab">
                <h2>Customization</h2>
            </div>
        </div>
    </div>
</div>