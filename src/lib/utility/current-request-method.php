<?php
/**
 * current_request_method
 * check and get current request method
 *
 * @category function
 * @author M.Noermoehammad
 * @license MIT
 * @version 1.0
 * @return void
 * 
 */
function current_request_method()
{
    
 $current_request = (isset($_SERVER['REQUEST_METHOD'])) ? $_SERVER['REQUEST_METHOD'] : "";
 
 return $current_request;

}