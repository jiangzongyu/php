<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
    <script type="text/javascript" src="js/jquery-1.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/jquery_002.js"></script>
    <script type="text/javascript" src="js/oschina.js"></script>
    <style type="text/css">
        body,table,input,textarea,select {font-family:Verdana,sans-serif,宋体;}
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {padding: 3px 10px 3px 10px;}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {padding: 3px 10px 4px 10px;}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <div id="OSC_Banner">
        <div id="OSC_Channels">
            <ul>
                <li><a href="#" class="project">心情 here...</a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div><!-- #EndLibraryItem --><div id="OSC_Topbar">
        <div id="VisitorInfo">
            当前访客身份：
            <?php
            $login_user=$this->session->userdata('login_user');
            if($login_user){
                ?>

                <?php echo $login_user->NAME; ?>已登录 [ <a href="user/logout">退出</a> ]
                <?php
            }else {
                ?>
                游客 [ <a href="user/login">登录</a> | <a href="user/regist">注册</a> ]

                <?php
            }
            ?>
            <span id="OSC_Notification">
			<a href="inbox.htm" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
			</span>
        </div>
        <div id="SearchBar">
            <form action="#">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value=在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content"><div class="SpaceChannel">


            <div class="clear"></div>
        </div>
        <div class="BlogList">
            <ul>
                <li class="Blog" id="blog_24027">

                    <div class="outline">
                        <?php
                        foreach($blogs as $blog) {
                            ?>
                            <h2 class="BlogAccess_true BlogTop_0"><a href="blogc/view/<?php echo $blog->BLOG_ID ?>"><?php echo $blog->TITLE ?></a></h2>
                            <span class="time">时间：<?php echo $blog->ADD_TIME ?></span>
                            <span class="catalog">分类: <a href="#"><?php echo $blog->CATALOG_NAME ?></a></span>

                            <span class="stat">统计: <?php echo $blog->CLICK_RATE ?>阅读</span>

                            <br/>
                            <span class="content">内容：<?php echo mb_strlen($blog->CONTENT)<10?$blog->CONTENT:mb_substr($blog->CONTENT,0,10)."......"; ?></span>
                            <div class='fullcontent'><a href="blogc/view/<?php echo $blog->BLOG_ID ?>">阅读全文...</a></div>
                            <?php
                        }
                        ?>
                    </div>
            </ul>
            <div class="clear"></div>
        </div>



        </script></div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 大禹哥(WWW.SYSIT.ORG)</div>
</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>
<script type="text/javascript">

</script>
</body></html>