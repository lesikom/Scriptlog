<?php
/**
 * catch_weblink
 * 
 * to extract HTML link from a web page founded within it
 * and return all link on it.
 * 
 * @category function
 * @author Contributors
 * @license MIT
 * @version 1.0
 * @param string $web_page
 * @return array
 * 
 */
function catch_weblink($web_page)
{

 $links = [];

 $contents = file_get_contents($web_page);

if (!$contents)  { return null; }

 $dom_doc = new DOMDocument();

 $dom_doc->loadHTML($contents);

 $xpath = new DOMXPath($dom_doc);

 $hrefs = $xpath->evaluate("/html/body//a");

 for ($i=0; $i < $hrefs->length; $i++) { 
   
    $links[$i] = absolute_url($web_page, $hrefs->item($i)->getAttribute('href'));
        
  }

  return $links;

}