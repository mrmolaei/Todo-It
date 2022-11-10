jQuery(document).ready(function () {
    jQuery('.js-tab-link').click(function (e) {
        e.preventDefault()
        jQuery('.js-tab-link').removeClass('is-active')
        jQuery('.js-tabs-tab').removeClass('is-active')
        jQuery(jQuery(this).attr('href')).addClass('is-active')
        jQuery(this).addClass('is-active')
    })

    // Add/Edit todo
    const editPageTitleInput = jQuery('.todoit-plugin-page.post-new-php input[name="post_title"]')
    if (editPageTitleInput) {
        editPageTitleInput.on('keyup', function (input) {
            jQuery('.todoit-submit-button').prop("disabled", (input.currentTarget.value !== '' ? false : true));
        })

        jQuery('.js-todo-status').on('change', function () {
            $new_value = jQuery(this).prop('checked');
            jQuery('.js-todo-status').prop('checked', $new_value);

        })
    }


})
