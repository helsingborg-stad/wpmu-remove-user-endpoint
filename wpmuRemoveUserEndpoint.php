<?php
/*
Plugin Name:    WPMU Remove user endpoint
Description:    Removes user endpoint if not logged in.
Version:        1.0.0
Author:         Niclas Norin
*/

add_action('init', function () {
    if (is_user_logged_in()) {
        return;
    }

    add_filter('rest_endpoints', function (array $endpoints): array {
        unset($endpoints['/wp/v2/users']);
        unset($endpoints['/wp/v2/users/(?P<id>[\d]+)']);
        unset($endpoints['/wp/v2/users/me']);
        return $endpoints;
    });
});
