<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <title>Johnny的博客 - SYSIT个人博客</title>
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
    <script src="js/jq.js"></script>
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
        <div id="OSC_Slogon">Johnny's Blog</div>
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
			<a href="#" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
																				</span>
        </div>
        <div id="SearchBar">
            <form action="#">
                <input name="user" value="154693" type="hidden">
                <input id="txt_q" name="q" class="SERACH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value='在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
                <input class="SUBMIT" value="搜索" type="submit">
            </form>
        </div>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content">
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="index_logined.htm">返回我的首页</a>&nbsp;»
                <span id="AdminTitle">管理首页</span>
            </div>
            <div id="AdminMenu"><ul>
                    <li class="caption">个人信息管理
                        <ol>
                            <li><a href="inbox.htm">站内留言(0/1)</a></li>
                            <li><a href="profile.htm">编辑个人资料</a></li>
                            <li><a href="chpwd.htm">修改登录密码</a></li>
                            <li><a href="userSettings.htm">网页个性设置</a></li>
                        </ol>
                    </li>
                </ul>
                <ul>
                    <li class="caption">博客管理
                        <ol>
                            <li><a href="newBlog.htm">发表博客</a></li>
                            <li><a href="blogCatalogs.htm">博客设置/分类管理</a></li>
                            <li><a href="blogs.htm">文章管理</a></li>
                            <li class="current"><a href="blogComments.htm">博客评论管理</a></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div id="AdminContent">
                <div class="MainForm BlogCommentManage">
                    <h3>共有 3 篇博客评论，每页显示 20 个，共 1 页</h3>
                    <ul>
                        <?php
                            foreach ($comments as $comment) {
                                ?>
                                <li id="cmt_24027_154693_261665734" class="row_1">
                                    <span class="portrait"><a href="#" target="_blank"><img src="images/portrait.gif"
                                                                                            alt="Johnny" title="Johnny"
                                                                                            class="SmallPortrait"
                                                                                            user="154693"
                                                                                            align="absmiddle"></a></span>
                                    <span class="comment">
		<div class="user"><b><?php echo $comment->COMMENTATOR_NAME;?></b> 评论了 <a href="viewPost_comment.htm" target="_blank"><?php echo $comment->TITLE;?></a></div>
		<div class="content"><p><?php echo $comment->CONTENT;?></p></div>
		<div class="opts">
			<span style="float:right;">
			<a href="javascript:;" class="del" data-id="<?php echo $comment->COMMENT_ID; ?>">删除</a>
			</span>
            <?php echo $comment->ADD_TIME;?>
		</div>
		</span>
                                    <div class="clear"></div>
                                </li>
          <?php
               }
          ?>
                    </ul>
                </div>
                <script type="text/javascript">

                </script></div>
            <div class="clear"></div>
        </div>
        <script type="text/javascript">

        </script>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 姜宗禹(WWW.SYSIT.ORG)</div>
</div>
<script>
    $(function () {

        $('.del').click(function () {
//            alert('hhah');
            var that=this;
            $.get('commentc/remove',{
                commentId:$(this).data('id')
            },function (data) {
                if(data=='success'){
                    $(that).parents('li').remove();
                }
            },"text");
        });

    })

</script>
</body></html>