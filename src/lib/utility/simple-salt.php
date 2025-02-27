<?php
/**
 * simple_salt
 * 
 * generating simple salt
 * 
 * @category function
 * @author M.Noermoehammad
 * @license MIT
 * @version 1.0
 * @param int|number $num_chars
 * @return string
 * 
 */
function simple_salt($num_chars)
{
  
 if((is_numeric($num_chars)) && ($num_chars > 0) && (!is_null($num_chars))) {

     $salt = null;
     
     $accepted_chars = ircmaxell_generator_string('low', $num_chars);

     srand(((int)((double)microtime()*1000003)));

     for($i=0; $i<=$num_chars; $i++) {

         $random_number = rand(0, (strlen($accepted_chars)-1));

         $salt .= $accepted_chars[$random_number];

     }

     return $salt;
     
 }
  
}