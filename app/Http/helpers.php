<?php

if (! function_exists('print_ra')) {
    /**
     * Beautify array structure.
     *
     * @param  array   $array
     * @return void
     */
    function print_ra($array)
    {
        echo "<pre>";
        print_r($array);
        echo "</pre>";
        return;
    }
}
