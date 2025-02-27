<?php
/**
 * write_htaccess()
 *
 * writing mod_rewrite rules into htaccess file with php
 * 
 * @category function
 * @author M.Noermoehammad
 * @license MIT
 * @version 1.0
 * @param string $permalink_status
 * @param string $data
 * 
 */
function write_htaccess($permalink_status, $user_level, $data)
{

(version_compare(PHP_VERSION, '7.4', '>=') ) ? clearstatcache() : clearstatcache(true);

$privilege = (isset($user_level) ) ? user_privilege() : "";

if ( $privilege === 'administrator' || $privilege === 'manager' ) {

   $fp = fopen(__DIR__ . '/../../.htaccess', 'w');

   if ( $permalink_status === 'yes') {

     $sleep_timer = 10; 
   
   } else {
      
     $sleep_timer = 5;

   }

   sleep($sleep_timer);
   fwrite($fp, $data);
   fclose($fp);

} else {

 scriptlog_error("Privilege is not compatible to perform this action");
 
}

}

/**
 * read_htaccess_config
 *
 * @category function
 * @author M.Noermoehammad
 * @param string $permalink_status
 * @return string
 * 
 */
function read_htaccess_config($permalink_status)
{

$content  = '# START ScriptLog'. PHP_EOL;
$content .= '# The directives (lines) between "START ScriptLog" and "FINISH ScriptLog" are' . PHP_EOL;
$content .= '# dynamically generated, and should only be modified if you know what you are doing.' . PHP_EOL;
$content .= '# Any changes to these lines will be overwritten by scriptlog herself on setting permalink.' . PHP_EOL;
   
if ( $permalink_status === 'yes') {

   $content .= '<IfModule mod_rewrite.c>' . PHP_EOL;
   $content .= 'RewriteEngine On'. PHP_EOL; 
   $content .= '#RewriteCond %{HTTP_USER_AGENT} libwww-perl.* ' . PHP_EOL;
   $content .= '#RewriteRule .* – [F,L]'. PHP_EOL;
   $content .= '# The RewriteBase of the system (change if you are using this system in a sub-folder)' . PHP_EOL;
   $content .= '#RewriteBase /'. PHP_EOL;
   $content .= '# This will make the site only accessible without the -www- ' . PHP_EOL; 
   $content .= '#RewriteCond %{HTTP_HOST} ^www\.yourdomain\.TLD$'. PHP_EOL;
   $content .= '#RewriteRule ^/?$ "https\:\/\/yourdomain\.TLD\/" [R=301, L]' . PHP_EOL;
   $content .= '# Ensure all front-end UI-UX files readable'. PHP_EOL;
   $content .= 'RewriteCond %{REQUEST_FILENAME} !\.(ico|css|png|jpg|jpeg|webp|gif|js|txt|htm|html|eot|svg|ttf|woff|woff2|webm|ogg|mp4|wav|mp3|pdf)$ [NC]' . PHP_EOL;
   $content .= 'RewriteRule ^public/.*$ index.php'. PHP_EOL;
   $content .= 'RewriteCond %{REQUEST_FILENAME} !-d ' . PHP_EOL;
   $content .= 'RewriteCond %{REQUEST_FILENAME} !-f ' . PHP_EOL;
   $content .= 'RewriteCond %{REQUEST_FILENAME} !-l ' . PHP_EOL; 
   $content .= 'RewriteRule ^(.*)$ index.php [QSA,L]' . PHP_EOL;
   $content .= '</IfModule>'. PHP_EOL;

} else {
      
   $content .= ''.PHP_EOL;
   $content .= ''.PHP_EOL;
      
}

$content .= '# FINISH ScriptLog' . PHP_EOL;

return $content;

}