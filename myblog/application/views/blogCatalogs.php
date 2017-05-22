<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN"><head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="Content-Language" content="zh-CN">
  <title>博客设置/分类管理 Johnny的博客 - SYSIT个人博客</title>
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
<?php $login_user=$this->session->userdata("login_user");
					if($login_user){
				?>
    <div id="OSC_Slogon"><?php echo $login_user->NAME; ?>'s Blog</div>
    <div id="OSC_Channels">
        <ul>
        <li><a href="#" class="project">心情 here...</a></li>
        </ul>
    </div>
    <div class="clear"></div>
</div><!-- #EndLibraryItem --><div id="OSC_Topbar">
	  <div id="VisitorInfo">
		当前访客身份：
				<?php echo $login_user->NAME; ?> [ <a href="user/logout">退出</a> ]
				<?php
					}else{
					?>游客[<a href="user/login">登录</a>|<a href="user/reg">注册</a>]
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
				<input class="SUBMIT" value="搜索" type="submit">
    		</form>
		</div>
		<div class="clear"></div>
	</div>
	<div id="OSC_Content">
<div id="AdminScreen">
    <div id="AdminPath">
        <a href="blog/logined">返回我的首页</a>&nbsp;»
    	<span id="AdminTitle"d>博客设置/分类管理</span>
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
			<li><a href="blog/newBlog">发表博客</a></li>
			<li class="current"><a href="catalog">博客设置/分类管理</a></li>
			<li><a href="blog/do_blog">文章管理</a></li>
			<li><a href="comment/manage_comment">博客评论管理</a></li>
		</ol>
	</li>
</ul>
</div>
    <div id="AdminContent">
<div class="MainForm BlogCatalogManage">
<form id="CatalogForm" action="catalog/addBlogCatalog" method="post">
    <h3> 添加博客分类 </h3>
    <div id="error_msg" class="error_msg" style="display:none;"></div>
    <label>分类名称:</label><input id="txt_link_name" name="name" size="15" tabindex="1" type="text">
    <label>排序值:</label><input name="sort_order" value="0" size="3" type="text">
    <span class="submit">
          <input value="添加&nbsp;»" tabindex="3" class="BUTTON SUBMIT" type="submit">
        </span>
</form>
<form class="BlogCatalogs">
<h3>博客分类 <span>(点击分类名编辑)</span></h3>
<table cellpadding="1" cellspacing="1">
	<tbody><tr>
		<th>序号</th>
		<th>分类名</th>
		<th>文章</th>
		<th>操作</th>
	</tr>
	<?php 
		foreach ($catalogs as $catalog) {

	?>
	<tr id="catalog_92334">
		<td class="idx"><?php echo $catalog->CATALOG_ID;?></td>
		<td class="name"><a href="editCatalog.htm" title="点击修改博客分类"><?php echo $catalog->NAME;?></a></td>
		<td class="num">1</td>
		<td class="opts">
			<a href="editCatalog.htm" title="点击修改博客分类">修改</a>
			<a href="#" onclick="return delete_catalog(154693,92334);">删除</a>
		</td>
	</tr>
	<?php }?>
</tbody></table>
</form>
</div>
</div>
	<div class="clear"></div>
</div>

</div>
	<div class="clear"></div>
	<div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
<script type="text/javascript" src="js/space.htm" defer="defer"></script>

</body></html>