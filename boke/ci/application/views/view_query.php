<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="<?php echo site_url();?>">
    <title>Document</title>
    <style>

        li{
            list-style: none;
        }
    </style>
</head>
<body>
    <?php
        $login_user=$this->session->userdata('login_user');
    ?>
    <a href="blogc/index?writer=<?php echo $login_user->USER_ID?>">返回博客列表</a>
    <?php
        foreach ($blog as $blogs){
    ?>

   <li><?php echo $blogs->TITLE;?></li>

    <li><?php echo $blogs->CONTENT;?></li>
----------------------------------------------------
    <?php
        }
    ?>
</body>
</html>