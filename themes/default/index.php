<?php echo __FILE__ ?>
<!doctype html>
<html lang="en-US">
<head>
<meta charset="UTF-8" />
<title>Silver Blog | Free WordPress Theme</title>
<link href="<?php echo findBlogInfo('base_uri') ?>/themes/default/style.css" rel="stylesheet" type="text/css">
<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if IE 6]>
<script src="js/belatedPNG.js"></script>
<script>
	DD_belatedPNG.fix('*');
</script>
<![endif]-->
<script src="js/jquery-1.4.min.js" type="text/javascript" charset="utf-8"></script>
<script src="js/loopedslider.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" charset="utf-8">
	$(function(){
		$('#slider').loopedSlider({
			autoStart: 6000,
			restart: 5000
		});
		
	});
</script> 
</head>

<body>
<div id="bodywrap">
<section id="pagetop">
<p id="siteinfo">
random text
</p>
<nav id="sitenav">
<ul>
<li class="current"><a href="index.html">Home</a></li>
<li><a href="about.html">Link 1</a></li>
<li><a href="styles.html">Link 2</a></li>
<li><a href="contact.html">Link 3</a></li>

</ul>

</nav>
</section>
<header id="pageheader">
<h1>
  random<span>name</span>
</h1>
<div id="search">

<form action="#">

<div class="searchfield">


<input type="text" name="search" id="s">

</div>
<div class="searchbtn">
<input type="image" src="images/searchbtn.png" alt="search">
</div>

</form>

</div>

<!-- start menu -->
<ul class="solidblockmenu">
   <li class='active '><a href='index.html'><span>Home</span></a></li>
   <?php $pages = new Page() ?>
   <?php foreach ($pages->findAll() as $page) : ?>
   <li>
	<a href='?page_id=<?php echo $page->page_id ?>'>
	<span><?php echo $page->title ?></span>
	</a>
    </li>
   <?php endforeach; ?>
</ul>
<!-- end menu -->

</header>

<div id="contents">
<section id="main">
	<div id="leftcontainer">
	<h2 class="mainheading">Latest from the blog</h2>
	<!-- loop for articles -->
	
	<?php $articles = new Post(); ?>
	<?php foreach ($articles->findAll() as $article) : ?>
	<article class="post">
	<header>
		<h3><?php echo $article->title ?></h3>
		<p class="postinfo">Published on <time><?php echo date("F j, Y", strtotime($article->date)) ?></time></p>
	</header>
	<p><?php echo $article->text ?></p>
	</article>
	<?php endforeach; ?>
	<!-- end loop article -->
	<div class="pagenavi">
		<span class="current">1</span>
		<a href="/page/2/" title="2">2</a>
		<a href="/page/3/" title="3">3</a>
		<a href="/page/4/" title="4">4</a>
		<a href="/page/5/" title="5">5</a>
		<a href="/page/6/" title="6">6</a>
		<a href="/page/7/" title="7">7</a>
		<a href="/page/8/" title="8">8</a>
		<a href="/page/2/">Next &raquo;</a>
		<span class="extend">...</span>
		<a href="/page/27/" title="Last &raquo;">Last &raquo;</a>
	</div>
	<!-- end paging -->
    <div class="clear"></div>
</div>
</section>
<!-- end content -->

<section id="sidebar">
<div id="sidebarwrap">
<h2>About</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum hendrerit magna in risus tincidunt rhoncus. Ut eu urna risus, at molestie tellus. Aenean vitae lobortis odio. <a href="#">Read More</a></p>

<h2>Random heading</h2>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum hendrerit magna in risus tincidunt rhoncus. Ut eu urna risus, at molestie tellus. Aenean vitae lobortis odio. <a href="#">Read More</a></p>

</div>
</section>
<!-- end sidebar -->


<div class="clear"></div>
</div>

</div>
<footer id="pagefooter">
	<div id="footerwrap">
	<div class="copyright">
	2012 &copy; ...</div>
	</div>
</footer>
<!-- end footer -->
</body>
</html>