<?php
require_once("../conn/conn.php");
require_once("./tools/history.php");
?>
<!DOCTYPE html><html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name=viewport content=" width = device-width" initial-scale="1" >
	<title>Someone Like You</title>
	<link rel="shortcut icon" type="image/x-icon"  href="img/logo.ico">
	<link rel="stylesheet" type="text/css" href="css/normalize.css">
	<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
    <ul id="slide-out" class="side-nav fixed"><!-- 侧边栏开始 -->
	    <div class="side-nav-content">
		    <div class="canvas">
		    	<canvas id="clork" height="120px" width="120px"></canvas>
		    	<canvas id="date" height="120px" width="120px"></canvas>
		    </div>
	      	<p>
	          	我希望有个如你一般的人<br>
	          	如山间清爽的风 如古城温暖的光<br>
	          	从清晨到夜晚 从山野到书房<br>
	          	贯彻未来<br>
	          	数遍生命的公路牌<br>
	              一切都没关系<br>
	          	<b>只要最后是你 就好</b>
	      	</p>
	      	<hr class="side-nav-hr">
			<li><a href="#" class="active"><i class="fa fa-home" aria-hidden="true"></i>首页</a></li>
			<li><a href="./article/"><i class="fa fa-book" aria-hidden="true"></i>文章</a></li>
			<li><a href="#"><i class="fa fa-folder-open" aria-hidden="true"></i>资源</a></li>
			<li><a href="#"><i class="fa fa-id-card-o" aria-hidden="true"></i>简历</a></li>
			<li><a href="https://github.com/uchihaty"><i class="fa fa-github" aria-hidden="true"></i>Github</a></li>
	    </div>
    </ul><!-- 侧边栏结束 -->

	<header><!-- 页头开始 -->
		<nav>
		    <div class="nav-wrapper">
				<a href="#" class="brand-logo center">Someone&nbspLike&nbspYou</a>
				<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</header><!-- 页头结束 -->

	<main>
		<div id="slides" class="slider"><!-- 首页幻灯片开始 -->
		  <ul class="slides">
		    <li>
		      <img src="img/slide01.jpg"> <!-- random image -->
		      <div class="caption center-align">
		        <h3>温暖</h3>
		        <h5 class="light grey-text text-lighten-3">我希望有个如你一般的人</h5>
		      </div>
		    </li>
		    <li>
		      <img src="img/slide02.jpg"> <!-- random image -->
		      <div class="caption left-align">
		        <h3>阅读</h3>
		        <h5 class="light grey-text text-lighten-3">站在巨人的肩膀上</h5>
		      </div>
		    </li>
		    <li>
		      <img src="img/slide03.jpg"> <!-- random image -->
		      <div class="caption right-align">
		        <h3>阳光</h3>
		        <h5 class="light grey-text text-lighten-3">愿你被世界温柔以待</h5>
		      </div>
		    </li>
		    <li>
		      <img src="img/slide04.jpg"> <!-- random image -->
		      <div class="caption left-align">
		        <h3>科技</h3>
		        <h5 class="light grey-text text-lighten-3">科学技术是第一生产力</h5>
		      </div>
		    </li>
		  </ul>
		</div><!-- 首页幻灯片结束 -->

		<div id="article-list"><!-- 文章区域开始 -->
			<div class="article"><!-- 文章列表抬头开始 -->
				<h3>最新文章</h3>
				<hr>
				<p>
					技术、情感、随笔
				</p>
			</div><!-- 文章列表抬头开始 -->
			<div class="row"><!-- 文章列表开始 -->
				<?php
				// Include WordPress
				define('WP_USE_THEMES', false);
				require('./article/wp-load.php');
				query_posts('showposts=6');
				// get_most_viewed("post",6);
				?>
				<?php while (have_posts()): the_post(); ?>
					<div class="col s12 m6 l4">
					  <div class="card small white hoverable">
					    <div class="card-content black-text">
					      <span class="card-title light-blue-text"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span>
					      <p><?php the_content(); ?></p>
					    </div>
					    <div class="card-action">
					      <a href="<?php the_permalink(); ?>">阅读全文</a>
					    </div>
					  </div>
					</div>
				<?php endwhile; ?>
			</div><!-- 文章列表结束 -->
			<div class="more-things"><!-- 更多文章按钮开始 -->
				<a href="./article" title="" class="btn more-things">更多文章</a>
			</div><!-- 更多文章按钮结束 -->
		</div><!-- 文章区域结束 -->

		<div id="files-list">
			<div class="download">
				<h3>热门资源</h3>
				<hr>
				<p>
					不定期更新各种热门资源
				</p>
			</div>
			<div class="collection">
			  <a href="#!" class="collection-item">20170618 hosts文件
				  <span class="new badge" data-badge-caption="次下载">
				  4
				  </span>
				</a>
			  <a href="#!" class="collection-item">Your Name.2016.HDrip.1080P AAC x264.mp4
				  <span class="new badge" data-badge-caption="次下载">
				  3
				  </span>
			  </a>
			  <a href="#!" class="collection-item">你的名字。.mkv</a>
			  <a href="#!" class="collection-item">American.Genius.S01E01.Jobs.vs.Gates.720p.HDTV.x264-DHD</a>
			</div>

			<div class="more-things">
				<a href="" title="" class="btn more-things">更多资源</a>
			</div>
		</div>
	</main>

	<footer class="page-footer"><!-- 页脚开始 -->
	  <div class="container">
	    <div class="row">
	      <div class="col l5 s12">
	        <h5 class="white-text">WELCOME</h5>
	        <p class="grey-text text-lighten-4">你是第<?php echo $num["id"]+1023; ?>位到这儿来的胖友，超过了99%的人类！真腻害~</p>
	      </div>
	      <div class="col l4 s12">
	        <h5 class="white-text">友情链接</h5>
	        <ul>
	          <li><a class="grey-text text-lighten-3" href="https://mobike.com/cn/">摩拜科技</a></li>
	          <li><a class="grey-text text-lighten-3" href="http://www.qyer.com/">穷游网</a></li>
	          <li><a class="grey-text text-lighten-3" href="http://grs.pku.edu.cn/ch/">北京大学研究生院</a></li>
	          <li><a class="grey-text text-lighten-3" href="http://graduate.buct.edu.cn/">北京化工大学研究生院</a></li>
	        </ul>
	      </div>
	    </div>
	  </div>
	  <div class="footer-copyright">
	    <div class="container">
	    © 2017 Liutianyi , Inc.
	    <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
	    </div>
	  </div>
	</footer><!-- 页脚结束 -->

	<a id="back_top" class="btn-floating btn-large red hoverable">
	<i class="material-icons">navigation</i>
	</a>

	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/materialize.min.js"></script>
	<script src="js/date.js"></script>
	<script src="js/clork.js"></script>
	<script src="js/main.js"></script>
</body>
</html>