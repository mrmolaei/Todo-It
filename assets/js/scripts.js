jQuery(document).ready(function () {
    jQuery('.js-tab-link').click(function (e) {
        e.preventDefault()
        jQuery('.js-tab-link').removeClass('is-active')
        jQuery('.js-tabs-tab').removeClass('is-active')
        jQuery(jQuery(this).attr('href')).addClass('is-active')
        jQuery(this).addClass('is-active')
    })
})