<?php

require '../../../Smarty-master/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->template_dir = dirname(__FILE__, 3) . '/templates';
$smarty->compile_dir = dirname(__FILE__, 3) . '/templates_c';
$smarty->config_dir = dirname(__FILE__, 3) . '/configs';
$smarty->cache_dir = dirname(__FILE__, 3) . '/cache';

$smarty->escape_html = true;
