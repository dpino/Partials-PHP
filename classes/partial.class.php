<?php

/**
 * Helper class for including chunks of HTML code 
 *
 * Diego Pino García <dpino@igalia.com>
 */
class Partial {

    /**
     * Includes a file, before it creates all variables set in hash params. 
     * The variables and the inclusion of the file have to be in the same scope.
     **/
    public static function render($file, $params) {
        if (!isset($params) || count($params) == 0) {
            include($file);
            return;
        }

        $keys = array_keys($params);
        $i = 0; $total = count($keys);

        do {
            // Create variable
            $key = $keys[$i++];
            $value = $params[$key];
            eval("\$$key = '$value';");

            // All variables were created, include file
            if ($i == $total) {
                include_once($file);
            }
        } while ($i < $total);
    }

    public static function inline($file, $params) {
        if (!isset($params) || count($params) == 0) {
            return Partial::str_include($file);
        }

        $keys = array_keys($params);
        $i = 0; $total = count($keys);

        do {
            // Create variable
            $key = $keys[$i++];
            $value = $params[$key];
            eval("\$$key = '$value';");

            // All variables were created, include file
            if ($i == $total) {
                return Partials::str_include($file);
            }
        } while ($i < $total);
    }

    public static function str_include($file){
        ob_start();
        include($file);
        return ob_get_clean();
    }

}
  
?>
