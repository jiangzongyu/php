<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url();?>">
    <link rel="stylesheet" href="css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="css/jquery.css" media="screen">
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
			<a href="sendMsg.htm" class="msgbox" title="进入我的留言箱">你有<em>0</em>新留言</a>
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
    <div id="OSC_Content"><div class="SpaceChannel">
            <div id="portrait"><a href="blogc/index?writer=<?php echo $blog->WRITER; ?>"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></div>
            <div id="lnks">
                <strong><?php echo $blog->WRITER_NAME;?>的博客</strong>
                <div>
                    <a href="blogc/index?writer=<?php echo $blog->WRITER; ?>">TA的博客列表</a>&nbsp;|
                    <a href="javascript:sendmsg(154693)">发送留言</a>
                    </span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="Blog">


            <div class="BlogTitle">
                <h1><?php echo $blog->TITLE;?></h1>
                <div class="BlogStat">

                    <?php
                        if($login_user && $login_user->USER_ID==$blog->WRITER){
                    ?>
						<span class="admin">
		                	<a href="newBlog.htm">编辑</a>&nbsp;|&nbsp;<a href="javascript:delete_blog(24026)">删除</a>
		                  </span>
                    <?php
                        }
                    ?>
                    <?php echo $blog->ADD_TIME;?>
                    已有<strong><?php echo $blog->CLICK_RATE;?></strong>次阅读
                    共<strong><a href="#comments"><?php echo count($comments);?></a></strong>个评论
                </div>
            </div>
            <div class="BlogContent TextContent"><?php echo $blog->CONTENT;?></div>
            <div class="BlogLinks">
                <ul>
            </div>
            <div class="BlogComments">
                <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 <?php echo count($comments);?> 条网友评论</h2>
                <ul id="BlogComments">
                    <?php
                        foreach ($comments as $comment) {
                            ?>
                            <li>
                                <div class='portrait'>
                                    <a href="#"><img src="images//portrait.gif" align="absmiddle" alt="sw0411"
                                                     title="sw0411" class="SmallPortrait" user="154693"/></a>
                                </div>
                                <div class='body'>
                                    <div class='title'>
                                        <?php echo $comment->COMMENTATOR_NAME;?> 发表于 <?php echo $comment->ADD_TIME;?>
                                    </div>
                                    <div class='post'><?php echo $comment->CONTENT;?></div>
                                    <div id='inline_reply_of_24027_154693_261665734' class='inline_reply'></div>
                                </div>
                                <div class='clear'></div>
                            </li>
                            <?php
                        }
                    ?>
                </ul>
            </div>
            <div class="CommentForm">
                <a name="postform"></a>
<!--                <form id="form_comment" method="POST">-->
                    <textarea id="postContent" name="content" style="width: 450px; height: 100px;"></textarea><br>
                    <input value="发表评论" id="btnComment" class="SUBMIT" type="button">
                    <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
                    <span id="cmt_tip">文明上网，理性发言</span>
<!--                </form>-->
                <a href="#" class="more">回到顶部</a>
                <a href="#comments" class="more">回到评论列表</a>
            </div>
        </div>
        <div class="BlogMenu"><div class="RecentBlogs SpaceModule">
                <strong>最新博文</strong><ul>
                    <li><a href="#">测试文章2</a></li>
                    <li><a href="#">测试文章1</a></li>
                    <li class="more"><a href="index.htm">查看所有博文»</a></li>
                </ul>
            </div>

        </div>
        <div class="clear"></div>

        <div id="inline_reply_editor" style="display:none;">
            <div class="CommentForm">
                <form id="form_inline_comment" action="/action/blog/add_comment?blog=24026" method="POST">
                    <input id="inline_reply_id" name="reply_id" value="" type="hidden">
                    <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
                    <input value="回复" id="btn_comment" class="SUBMIT" type="submit">
                    <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
                </form>
            </div>
        </div>
        <script type="text/javascript" src="js/blog.htm" defer="defer"></script>
        <script type="text/javascript" src="js/brush.js"></script>
        <link type="text/css" rel="stylesheet" href="css/shCore.css">
        <link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">
        <script type="text/javascript">
            <!--
            function delete_blog(blog_id){
                if(!confirm("文章删除后无法恢复，请确认是否删除此篇文章？")) return;
                ajax_post("/action/blog/delete?id="+blog_id,"",function(html){
                    location.href="index.htm";
                });
            }
            //-->
        </script>
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/jq.js"></script>
<script>
    $(function () {
        $('#btnComment').click(function () {
            //通过ajax来验证用户是否登录
            //url,data,callback,type
            $.get('user/ajax_check_login',function (data) {
                if(data=='not_login'){
                    alert('please login');
                }else if(data=='logined'){
                    //提交数据
                    $.post('commentc/ajax_post',{
                        blogId:<?php echo $blog->BLOG_ID;?>,
                        content:$('#postContent').val()
                    },function(res){
                        if(res=='fail'){
                            alert('comment failed please try again')
                        }else if(res=='success'){
                            location.reload();//页面刷新
                        }
                    },"text");
                }
            },'text');
        });
    });
</script>
</body></html>