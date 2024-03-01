<?php
/*
Plugin Name:    WPMU Remove user endpoint
Description:    Removes user endpoint if not logged in.
Version:        1.0.0
Author:         Niclas Norin
*/

function removeUserEndpointIfNotLoggedIn() {
    if (!is_user_logged_in()) {
        add_filter('rest_prepare_user', function ($response, $user, $request) {
            return new WP_Error('rest_forbidden', 'We are no longer friends.', array('status' => 403));
        }, 10, 3);
    }
}

add_action('init', 'removeUserEndpointIfNotLoggedIn');
