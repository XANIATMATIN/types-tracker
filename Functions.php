<?php

if (!function_exists('types')) {
    function types($category = null, $case = null)
    {
        if (empty($category)) {
            return app('types');
        }
        return app('types')->search($category, $case);
    }
}
