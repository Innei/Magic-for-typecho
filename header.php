<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once 'functions.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <?php header("Content-type:text/html;charset=utf-8");  ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta charset="<?php $this->options->charset(); ?>"/>
    <link rel="icon" type="image/png" href="<?php if($this->options->shortcut_ico){$this->options->shortcut_ico();}?>">
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/index.css');?>">
    <title><?php $this->archiveTitle(array(
            'category'  =>  _t('%s'),
            'search'    =>  _t('%s'),
            'tag'       =>  _t('%s'),
            'author'    =>  _t('%s')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
</head>
<body>
