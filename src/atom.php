<?php
/**
 * atom.php
 * 
 * @category atom.php file to write atom feeds
 * @author M.Noermoehammad
 * @license https://opensource.org/licenses/MIT MIT License
 * @version 1.0
 * 
 */
require __DIR__ . '/lib/main.php';

$app_title = app_info()['site_name'];
$app_link = app_info()['app_url'];
$app_description = app_info()['site_description'];
$feed_link = app_url().DS.'atom.php';

$atom_feed = new AtomWriter();

print $atom_feed->generateAtomFeed($app_title, $app_link, $feed_link, app_reading_setting()['post_per_rss']);
