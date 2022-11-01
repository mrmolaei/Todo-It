<div class="todo-it">
    <div class="o-wrap">
        <h1>Components</h1>
        <div class="o-spacer"></div>
        <h2>Buttons</h2>
        <button class="c-btn">
            Button
        </button>
        <div class="o-spacer"></div>
        <button class="c-btn c-btn--ghost">
            Button - Ghost
        </button>
        <div class="o-spacer"></div>
        <a href="#" class="c-btn">
            Button
        </a>
        <div class="o-spacer"></div>
        <a href="#" class="c-btn c-btn--ghost">
            Button - Ghost
        </a>
        <div class="o-spacer"></div>
        <h2>Inputs</h2>
        <input type="text" placeholder="Text"/>
        <div class="o-spacer"></div>
        <input type="Email" placeholder="Email"/>
        <div class="o-spacer"></div>
        <input type="Number" placeholder="Number"/>
        <div class="o-spacer"></div>
        <input type="url" placeholder="Url"/>
        <div class="o-spacer"></div>
        <input type="time" placeholder="Time"/>
        <div class="o-spacer"></div>
        <input type="month" placeholder="Month"/>
        <div class="o-spacer"></div>
        <input type="week" placeholder="Week"/>
        <div class="o-spacer"></div>
        <input type="date" placeholder="Date"/>
        <div class="o-spacer"></div>
        <label>
            <input type="radio" name="rad" placeholder="Radio"/>Radio
        </label>
        <label>
            <input type="radio" name="rad" placeholder="Radio"/> Radio
        </label>
        <div class="o-spacer"></div>
        <label>
            <input type="checkbox" placeholder="Checkbox"/> Checkbox
        </label>
        <div class="o-spacer"></div>
        <input type="range" placeholder="Range"/>
        <div class="o-spacer"></div>
        <input type="time" placeholder="Time"/>
        <div class="o-spacer"></div>
        <input type="password" placeholder="Password"/>
        <div class="o-spacer"></div>
        <textarea placeholder="Text Area"></textarea>
        <div class="o-spacer"></div>
        <select>
            <option>Option - First</option>
            <option>Option - Second</option>
            <option>Option - Third</option>
        </select>
        <div class="o-spacer"></div>
        <div class="o-grid">
            <div class="o-row">
                <div class="o-col o-col--1/4">
                    <div class="c-card">
                        <h3>Card Components</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at commodi
                            consectetur
                            dolore optio saepe suscipit! Aliquid architecto atque consectetur deleniti eos inventore,
                            ipsa
                            natus quam, recusandae repellendus unde.</p>
                    </div>
                </div>
                <div class="o-col o-col--1/4">
                    <div class="c-card">
                        <h3>Card Components</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at commodi
                            consectetur
                            dolore optio saepe suscipit! Aliquid architecto atque consectetur deleniti eos inventore,
                            ipsa
                            natus quam, recusandae repellendus unde.</p>
                    </div>
                </div>
                <div class="o-col o-col--1/2">
                    <div class="c-card">
                        <h3>Card Components</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at commodi
                            consectetur
                            dolore optio saepe suscipit! Aliquid architecto atque consectetur deleniti eos inventore,
                            ipsa
                            natus quam, recusandae repellendus unde.</p>
                    </div>
                </div>
                <div class="o-col o-col--1/3">
                    <div class="c-card">
                        <h3>Card Components</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at commodi
                            consectetur
                            dolore optio saepe suscipit! Aliquid architecto atque consectetur deleniti eos inventore,
                            ipsa
                            natus quam, recusandae repellendus unde.</p>
                    </div>
                </div>
                <div class="o-col o-col--1/2">
                    <div class="c-card">
                        <h3>Card Components</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus alias at commodi
                            consectetur
                            dolore optio saepe suscipit! Aliquid architecto atque consectetur deleniti eos inventore,
                            ipsa
                            natus quam, recusandae repellendus unde.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="o-spacer"></div>
        <div class="c-tabs js-tabs">
            <div class="c-tabs__nav">
                <ul class="c-tabs__nav__list">
                    <li class="c-tabs__nav__item">
                        <a href="#tab-1" class="c-tabs__link js-tab-link is-active">General</a>
                    </li>
                    <li class="c-tabs__nav__item">
                        <a href="#tab-2" class="c-tabs__link js-tab-link">CPT Settings</a>
                    </li>
                    <li class="c-tabs__nav__item">
                        <a href="#tab-3" class="c-tabs__link js-tab-link">About</a>
                    </li>
                </ul>
            </div>

            <div class="c-tabs__pane">
                <div id="tab-1" class="c-tabs__pane__tab js-tabs-tab is-active">
                    <form method="post" action="options.php">
					    <?php
					    settings_fields( 'acf_cbg_option');
					    do_settings_sections( 'my_plugin_test' );
					    submit_button();
					    ?>
                    </form>
                </div>
                <div id="tab-2" class="c-tabs__pane__tab js-tabs-tab">
                    <h3>CPT Settings</h3>
                </div>
                <div id="tab-3" class="c-tabs__pane__tab js-tabs-tab">
                    <h3>About the author</h3>
                </div>
            </div>
        </div>
    </div>
</div>