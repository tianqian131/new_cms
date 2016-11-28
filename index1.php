<?php include("./admin/public/connectDb.php") ?>
<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8" />
        <link rel="stylesheet" href="/object/Css/global.css" />
        <link rel="stylesheet" href="/object/Css/blog.css" />
        <script src="/Scripts/debug.js"></script>
    </head>
<body data-mod="blog" class="blog-index ">
    <div class="global-nav sf-header">
        <nav class="container nav">
            <div class="row hidden-xs">
                <div class="col-sm-10 col-md-8 col-lg-7">
                    <div class="sf-header__logo">
                        <h1><a href="/">SegmentFault</a></h1></div>
                </div>
                <div class="col-sm-2 col-md-4 col-lg-5 text-right">
                    <form action="" class="header-search  hidden-sm hidden-xs mr20" method="post">
                        <input type="submit" class="btn btn-link" value="搜索">
                        <input id="searchBox" name="q" type="text" placeholder="输入关键字搜索" class="form-control" value="<?php echo $_POST ? $_POST['q']:'' ?>" />
                    </form>
                    <ul class="opts list-inline hidden-xs">
                        <li class="opts__item"><a href="/user/login" class="SFLogin em ml10" onClick="_gaq.push(['_trackEvent', 'Button', 'Click', 'Login']);">注册 &middot;登录</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="global-navTags">
        <div class="container">
            <nav class=" nav">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/object/index.php"><i class="fa fa-home"></i>主页
                            </a></li>
                    <li class="nav__item nav__item--split"><a><span class="split"></span></a></li>
                    <?php
                        $sql = "SELECT classname from classify";
                        echo $sql;die;
                        $res = mysql_query($sql);
                        $class = mysql_fetch_row($res);
                        while(list($class) = mysql_fetch_row($res)){
                    ?>
                    <li class="nav__item tag-nav__item"><a href="?class=<?php echo $class ?>"><?php echo $class ?></a></li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
    </div>
    <div class="wrap">
        <div class="container article__container">
            <div class="row">
                <div class="col-xs-12 col-md-9 main">
                    <div class="main__board">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-tabs-zen mb10">
                            <li><a href="">全部的</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="stream-list blog-stream">
                        <?php
                            if($_GET){
                                if($_POST){
                                    $sql = "SELECT articlename,author,content,createdTime FROM article WHERE class='{$_GET['class']}' && articlename LIKE '%{$_POST['q']}%' ";
                                }else{
                                    $sql = "SELECT articlename,author,content,createdTime FROM article WHERE class='{$_GET['class']}'";
                                }
                            }else{
                                if($_POST){
                                    $sql = "SELECT articlename,author,content,createdTime FROM article WHERE articlename LIKE '%{$_POST['q']}%' ";
                                }else{
                                    $sql = "SELECT articlename,author,content,createdTime FROM article";
                                }
                            }
                            $res = mysql_query($sql);
                            while(list($articlename,$author,$content,$createdTime) = mysql_fetch_row($res)){
                        ?>
                            <section class="stream-list__item">
                                <div class="summary">
                                    <h2 class="title"><a href="./article.php?name='<?php echo $articlename ?>'"><?php echo $articlename ?></a></h2>
                                    <p class="excerpt wordbreak hidden-xs"><?php echo $content ?></p>
                                    <ul class="author list-inline">
                                        <li>
                                            <a href="/u/silentred">
                                                <img class="avatar-20 mr10 hidden-xs" src="/Picture/1f339d36b993412b87b369e57181af7a.gif" alt="一堆好人卡"><?php echo $author ?>
                                            </a>
                                            <span class="split"></span><?php echo date("Y-m-d H:i" , $createdTime) ?>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        <?php } ?>
                        </div>
                    </div>
                    <!-- /.main__board -->
                </div>
                <!-- /.layout-sidebar -->
            </div>
        </div>
    </div>
    <footer id="footer">
        <div class="container">
            <div class="row hidden-xs">
                <dl class="col-sm-2 site-link">
                    <dt>友情链接</dt>
                    <?php
                        $sql = "SELECT linkname,adress FROM friendlink";
                        $res = mysql_query($sql);
                        while(list($linkName,$adress) = mysql_fetch_row($res)){
                    ?>
                    <dd><a href="<?php echo $adress ?>" target="_blank"><?php echo $linkName ?></a></dd>
                    <?php } ?>
                </dl>
            </div>
        </div>
    </footer>
</body>
</html>