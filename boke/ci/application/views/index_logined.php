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
    		<form action="blogc/search">
						<input name="writer" value="<?php echo $writer->USER_ID; ?>" type="hidden">
						<input id="txt_q" name="q" class="SEARCH" value="在此空间的博客中搜索" onblur="(this.value=='')?this.value=在此空间的博客中搜索':this.value" onfocus="if(this.value=='在此空间的博客中搜索'){this.value='';};this.select();" type="text">
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content"><div class="SpaceChannel">
            <?php
                if($login_user||$writer->USER_ID) {
                    ?>
                    <div id="portrait"><a href="adminIndex.htm"><img src="images/portrait.gif" alt="Johnny"
                                                                     title="Johnny" class="SmallPortrait" user="154693"
                                                                     align="absmiddle"></a></div>
                    <?php
                }
    ?>
    <div id="lnks">
        <?php
        $login_user=$this->session->userdata('login_user');
        if($login_user || $writer->USER_ID){
            ?>
		<strong>

            <?php echo $writer->NAME; ?>

		</strong>

                <div><a href="#">博客列表</a>&nbsp;|
                    <a href="sendMsg.htm">发送留言</a></div>
                <?php
            }
        ?>
	</div>
	<div class="clear"></div>
</div>
<div class="BlogList">
<ul>
  <li class="Blog" id="blog_24027">
	
	<div class="outline">
	<?php	
		foreach($blogs as $blog) {
            ?>
            <input id="p1" type="hidden" value="<?php echo $blog->BLOG_ID?>">
            <h2 class="BlogAccess_true BlogTop_0"><a href="blogc/view/<?php echo $blog->BLOG_ID ?>"><?php echo $blog->TITLE ?></a></h2>
            <span class="time">时间：<?php echo $blog->ADD_TIME ?></span>
            <span class="catalog">分类: <a href="#"><?php echo $blog->CATALOG_NAME ?></a></span>

            <span class="stat">统计: <?php echo $blog->CLICK_RATE ?>阅读</span>
            <?php
                if ($login_user&&$login_user->USER_ID==$writer->USER_ID) {
            ?>
                <span class="blog_admin">( <a href="javascript:;" class="updata" data-blogId="<?php echo $blog->BLOG_ID; ?>">修改</a> | <a href="javascript:;" class="del" data-id="<?php echo $blog->BLOG_ID; ?>">删除</a> )</span>
                <br>
            <?php
                }else{
            ?>
                    <br/>
                    <?php
                }
                    ?>
	  	  <span class="content">内容：<?php echo mb_strlen($blog->CONTENT)<10?$blog->CONTENT:mb_substr($blog->CONTENT,0,10)."......"; ?></span>
            <div class='fullcontent'><a href="blogc/view/<?php echo $blog->BLOG_ID ?>">阅读全文...</a></div>
	  	  <?php
			}
	  	  ?>
	  	</div>
</ul>
<div class="clear"></div>
	</div>
        <?php
            if($login_user&&$login_user->USER_ID==$writer->USER_ID){
        ?>
        <div class="BlogMenu">
            <div class="admin SpaceModule">
                <strong>博客管理</strong>
                <ul class="LinkLine">
                    <li><a href="blogc/newBlog">发表博客</a></li>
                    <li><a href="blogc/blogCatalog">博客分类管理</a></li>
                    <li><a href="blogc/blogs">文章管理</a></li>
                    <li><a href="commentc/blogcomments">网友评论管理</a></li>
                </ul>
            </div>
            <div class="catalogs SpaceModule">
                <strong>微博分类</strong>
                <ul class="LinkLine">
                    <?php
                        foreach($catalogs as $catalog){

                    ?>
                            <li><a href="#"><?php echo $catalog->NAME; ?></a></li>

                    <?php
                        }
                    ?>

                </ul>

            </div>
            <?php
            }
    ?>
<div class="comments SpaceModule">
  <strong>最新网友评论</strong>
      <ul>
		<li>
		<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">hoho
			<span class="t">发布于 11分钟前 <a href="viewPost_comment.htm">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
		<li>
		<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">测试评论111
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
		<li>
		<span class="u"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny" class="SmallPortrait" user="154693" align="absmiddle"></a></span>
		<span class="c">测试评论
			<span class="t">发布于 34分钟前 <a href="viewPost_logined.htm">查看»</a></span>
		</span>
		<div class="clear"></div>
	</li>
	  </ul>
  </div></div>
<div class="clear"></div>
<script type="text/javascript" src="js/brush.js"></script>
<link type="text/css" rel="stylesheet" href="css/shCore.css">
<link type="text/css" rel="stylesheet" href="css/shThemeDefault.css">
<script type="text/javascript"><!--
$(document).ready(function(){
	SyntaxHighlighter.config.clipboardSwf = '/js/syntax-highlighter-2.1.382/scripts/clipboard.swf';
	SyntaxHighlighter.all();
});
//-->
</script>
<script type="text/javascript">
<!--
function delete_blog(blog_id){
if(!confirm("文章删除后无法恢复，请确认是否删除此篇文章？")) return;
ajax_post("/action/blog/delete?id="+blog_id,"",function(html){
	$('#blog_'+blog_id).fadeOut();
});
}
//-->
</script></div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 大禹哥(WWW.SYSIT.ORG)</div>
</div>
</div>
<script type='text/javascript'>

    <!--

    $(document).ready(function(){

        KE.show({

            id : 'ta_blog_content',

            resizeMode : 1,

            shadowMode : false,

            allowPreviewEmoticons : false,

            allowUpload : true,

            syncType : 'auto',

            urlType : 'domain',

            cssPath : 'css/ke-oschina.css',

            imageUploadJson : '/action/blog/upload_img',

            items : [ 'bold', 'italic', 'underline', 'strikethrough', 'removeformat','|','textcolor', 'bgcolor',

                'title', 'fontname', 'fontsize',  '|',

                'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', '|',

                'code', 'image', 'flash', 'emoticons', 'link', 'unlink','|','selectall','source' ,'about'

            ]

        });

    });

    //-->

</script>
<script src="js/jq.js"></script>
<script>
    $(function () {

        $('.del').click(function () {
//            alert('hhah');
            var that=this;
            $.get('blogc/remove',{
                blogId:$(this).data('id')
            },function (data) {
                if(data=='success'){
                    $(that).parents('li').remove();
                    location.reload();
                }
            },"text");
        });
    });

    $(function () {

        $('.updata').click(function () {
//            alert($(this).data('id'));
//            var that=this;
            $.get('blogc/updata',{
                id:$(this).data('id')
            },function (data) {

                if(data=='success'){
                    window.location.href ='blogc/updataBlog?blog_id='+$("#p1").val();
                }else{
                    alert('wuwuuwuuw');
                }
            },'text');
        });

    })

</script>
</body></html>