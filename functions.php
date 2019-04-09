<?php
ini_set("error_reporting", "E_ALL & ~E_NOTICE");

function themeConfig($form)
{
    _e('<p><b>博客数据库(必填)</b></p>');

    $db_host = new Typecho_Widget_Helper_Form_Element_Text('db_host', NULL, 'localhost', _t('数据库地址'));
    $form->addInput($db_host);

    $db_uname = new Typecho_Widget_Helper_Form_Element_Text('db_uname', NULL, NULL, _t('数据库用户'));
    $form->addInput($db_uname);

    $db_passwd = new Typecho_Widget_Helper_Form_Element_Password('db_passwd', NULL, NULL, _t('数据库密码'));
    $form->addInput($db_passwd);

    $logo = new Typecho_Widget_Helper_Form_Element_Text('logo', NULL, NULL, _t('头像'), _t('填写网站图标地址，留空为关闭, 一般为http://www.yourblog.com/image.png,支持 https:// 或 //'));
    $form->addInput($logo->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));

    $self_intro = new Typecho_Widget_Helper_Form_Element_Textarea('self_intro', NULL, '暂未填写', _t('个人介绍'), _t('支持&lt;p&gt;分段'));
    $form->addInput($self_intro);

    $shortcut_ico = new Typecho_Widget_Helper_Form_Element_Text('shortcut_ico', NULL, NULL, _t('favicon设置'), _t('填写网站图标地址，留空为关闭, 一般为http://www.yourblog.com/image.png,支持 https:// 或 //'));
    $form->addInput($shortcut_ico->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));

    $blog_url = new Typecho_Widget_Helper_Form_Element_Text('blog_url', NULL, NULL, _t('博客地址'), _t('填写你的博客地址 (不需要前缀)'));
    $form->addInput($blog_url);

    $halo_url = new Typecho_Widget_Helper_Form_Element_Text('halo_url', NULL, NULL, _t('Halo博客地址'), _t('填写你的Halo博客地址 (不需要前缀)'));
    $form->addInput($halo_url);

    $tw_name = new Typecho_Widget_Helper_Form_Element_Text('tw_name', NULL, NULL, _t('推特用户名'));
    $form->addInput($tw_name);

    $g_name = new Typecho_Widget_Helper_Form_Element_Text('g_name', NULL, NULL, _t('Github用户名'));
    $form->addInput($g_name);

    $email = new Typecho_Widget_Helper_Form_Element_Text('email', NULL, NULL, _t('Email'));
    $form->addInput($email);

    $link = new Typecho_Widget_Helper_Form_Element_Textarea('link', NULL, '暂未填写', _t('友链'), _t('格式: 一行标题一行url <br>null<br>https://www.shizuri.net/'));
    $form->addInput($link);


}


global $db_1;
function replace_db($host, $user, $passwd)
{
    $db = new Typecho_Db('Pdo_Mysql', 'typecho_');
    $db->addServer(array(
        'host' => $host,
        'user' => $user,
        'password' => $passwd,
        'charset' => 'utf8',
        'port' => '3306',
        'database' => 'typecho',
        'engine' => 'MyISAM',
    ), Typecho_Db::READ);
    global $db_1;
    $db_1 = Typecho_Db::get();
    Typecho_Db::set($db);
}

function restore_db()
{
    global $db_1;
    Typecho_Db::set($db_1);
}

$repo_name = array();
$repo_url = array();
function get_data($username)
{
    $url = "https://api.github.com/users/" . $username . "/repos?page=1&per_page=6&sort=updated";
    $ch = curl_init();

// 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36');
//return the transfer as a string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $json_string = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($json_string, true);


    foreach ($data as $each) {
        global $repo_name, $repo_url;
        $repo_name[] = $each['name'];
        $repo_url[] = $each['html_url'];
    }

}

function get_repo()
{
    global $repo_name;
    return $repo_name;
}

function get_url()
{
    global $repo_url;
    return $repo_url;
}

function get_avatar($name)
{
    $url = "https://api.github.com/users/" . $name;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $json_string = curl_exec($ch);
    curl_close($ch);
    $data = json_decode($json_string, true);
    echo $data['avatar_url'];
}

function parse_halo_sitemap($url)
{
    $url_map = $url . '/sitemap.html';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url_map);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_3) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/72.0.3626.121 Safari/537.36');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $html = curl_exec($ch);
    curl_close($ch);

    preg_match_all('#<div class="T1 pull-left"><a href="' . $url . '/archives/.*?" title="(.*?)">#', $html, $title);
    $title['1'] = array_reverse($title['1']);
    $url_list = array();
    foreach ($title['1'] as $item) {
        $url_list[] = $url . '/archives/' . $item;
    }


    $all = array_map(function ($i1, $i2) {
        return '<a href="' . $i1 . '" target="_blank">' . $i2 . '</a>';
    }, $url_list, $title['1']);
    return $all;

}

function get_post_view($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

function parse_Flink($link_string)
{
    $arr = explode("\n",$link_string);
    $arr = array_filter($arr);

    $parse_link = function ($array) {
        $link = $name = array();
        for ($i = 0; $i < count($array); $i += 2) {
            $link[] = $array[$i];
            $name[] = $array[$i + 1];
        }
        $total = array_map(function ($i1, $i2) {
            return '<li><a href="' . $i1 . '" target="_blank">' . $i2 . '</a></li>';
        }, $name, $link);
        return $total;
    };


    $s = $parse_link($arr);
    foreach ($s as $item) {
        echo $item;
    }
}