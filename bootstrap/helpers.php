<?php

if (! function_exists('is_as_admin')) {
    function is_as_admin($user) {
        return \App\Profile::where('id', $user->acting_profile_id)->where('type', 'admin')->exists();
    }
}
