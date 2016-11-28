<?php include("./admin/public/connectDb.php") ?>
<DOCTYPE HTML>
<html lang="zh-CN">

<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Css/global.css" />
    <link rel="stylesheet" href="Css/blog.css" />
    <link rel="stylesheet" href="Css/responsive.css" />
    <script src="Scripts/debug.js"></script>
</head>

<body data-mod="blog" class="blog-post ">
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
                        <li class="opts__item"><a href="/user/login" class="SFLogin em ml10" onClick="_gaq.push(['_trackEvent', 'Button', 'Click', 'Login']);">注册 &middot;
                                        登录</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="global-navTags">
        <div class="container">
            <nav class=" nav">
                <ul class="nav__list">
                    <li class="nav__item"><a href="/"><i class="fa fa-home"></i>home
                            </a></li>
                    <li class="nav__item"><a href="/timeline"><i class="fa fa-list-alt"></i>feed
                            </a></li>
                    <li class="nav__item nav__item--split"><a><span class="split"></span></a></li>
                    <?php
                        $sql = "SELECT classname from classify";
                        $res = mysql_query($sql);
                        while(list($class) = mysql_fetch_row($res)){
                    ?>
                    <li class="nav__item tag-nav__item"><a href="index.php?class=<?php echo $class ?>"><?php echo $class ?></a></li>
                    <?php } ?>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="wrap">
        <div class="container mt30">
            <div class="row">
                <div class="col-xs-12 col-md-9 main ">
                    <div class="article fmt article__content" data-id="1190000007613430" data-license="nd">
                        <?php
                            if($_GET){
                                $name = $_GET['name'];
                                $sql = "SELECT articlename,content,createdTime FROM article WHERE articlename={$name} ";
                                $res = mysql_query($sql);
                                $row = mysql_fetch_array($res);
                                echo "<h2>{$row['articlename']}</h2>
                                <p>{$row['content']}</p>
                                </div>
                                <div class='clearfix mt10'>
                                <ul class='article-operation list-inline pull-left'>
                                <li><a href='' class=''>".date('Y-m-d H:i',$row['createdTime'])."</a></li>
                                </ul>
                                </div>";
                            }else{
                                $sql = "SELECT articlename,content,createdTime FROM article";
                                $res = mysql_query($sql);
                                while(list($articlename,$content,$createdTime) = mysql_fetch_row($res)){
                                    echo "<h2>{$articlename}</h2>
                                <p>{$content}</p>
                                </div>
                                <div class='clearfix mt10'>
                                <ul class='article-operation list-inline pull-left'>
                                <li><a href='' class=''>".date('Y-m-d H:i',$createdTime)."</a></li>
                                </ul>
                                </div>";
                                }
                            }
                        ?>
                    <h2 class="h4 post-comment-title">讨论区</h2>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    