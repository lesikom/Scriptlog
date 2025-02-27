<?php
/**
 * check_magic_quote()
 * 
 * Deprecated on PHP 7.4 and removed as of PHP 8.0
 * 
 * @category function
 * @see https://www.php.net/manual/en/function.get-magic-quotes-gpc.php
 * @license MIT
 * @version 1.0
 * 
 */
function check_magic_quote()
{

  if (PHP_VERSION < 70400) {

    if ( function_exists("get_magic_quotes_gpc") ) {
        
        $process = array (&$_GET, &$_POST, &$_COOKIE, &$_REQUEST);
        
        foreach (array_keys($process) as $key => $val) {

            foreach ( $val as $k => $v ) {
                unset ( $process [$key] [$k] );
                if (is_array( $v )) {
                    $process[$key][stripslashes( $k )] = $v;
                    $process[] = &$process [$key] [stripslashes( $k )];
                } else {
                    $process[$key][stripslashes( $k )] = stripslashes( $v );
                }
            }

        }
  
        unset($process);
        
    }

  }
    
}

