<?php
use Cake\Core\Configure;
use Cake\ORM\TableRegistry;


$site_config = TableRegistry::get('Siteconfigs')->find()->first();
$front_theme = $site_config->front_theme;


//$themeConfigFile = str_replace("config",'',__DIR__)."plugins\\".$front_theme."\config\\themeConfig";
$front_theme.'.themeConfig';

//Configure::load($front_theme.'.themeConfig');

?>