
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Cycle2 Prev/Next</title>
		<link rel=stylesheet href="//fonts.googleapis.com/css?family=Acme">
		<link rel=stylesheet href="../css/home.css">
		<link rel=stylesheet href="../css/demo-slideshow.css">
		<style>.adsbygoogle { display: block; margin:auto }</style>
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.js"></script>
		<script src="//malsup.github.io/jquery.cycle2.js"></script>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<script>if (screen.width < 640)  document.write('<style>.adsbygoogle { display: none }</style>');</script>
	</head>
	<body>

		<div id="main">
			<style>
				#outside .cycle-slideshow { width: 300px }
				#prev, #next, .prevControl, .nextControl { cursor: pointer; font-size: 16px; color: #08C }
			</style>

			<!-- slideshow -->
			<div class="cycle-slideshow"
				  data-cycle-fx=scrollHorz
				  data-cycle-timeout=0
				>
				<!-- prev/next links -->
				<div class="cycle-prev"></div>
				<div class="cycle-next"></div>
				<img src="http://malsup.github.io/images/p1.jpg">
				<img src="http://malsup.github.io/images/p2.jpg">
				<img src="http://malsup.github.io/images/p3.jpg">
				<img src="http://malsup.github.io/images/p4.jpg">
			</div>
			<div class=center>(hover over left or right side of slideshow)</div>

						<div id=outside>
						 prev/next links
							<div class=center>
								<span id=prev>&lt;&lt;Prev </span>
								<span id=next> Next&gt;&gt;</span>
							</div>
						 slideshow
							<div class="cycle-slideshow"
								  data-cycle-fx=scrollHorz
								  data-cycle-timeout=0
								  data-cycle-prev="#prev"
								  data-cycle-next="#next"
								>
								<img src="http://malsup.github.io/images/p1.jpg">
								<img src="http://malsup.github.io/images/p2.jpg">
								<img src="http://malsup.github.io/images/p3.jpg">
								<img src="http://malsup.github.io/images/p4.jpg">
							</div>
						</div>

						<div id="multiple">
							prev/next links
							<div class=center>
								<span class=prevControl>&lt;&lt;Prev </span>
								<span class=nextControl> Next&gt;&gt;</span>
							</div>
						 slideshow
							<div class="cycle-slideshow"
								  data-cycle-fx=scrollHorz
								  data-cycle-timeout=0
								  data-cycle-prev=".prevControl"
								  data-cycle-next=".nextControl"
								>
								<img src="http://malsup.github.io/images/p1.jpg">
								<img src="http://malsup.github.io/images/p2.jpg">
								<img src="http://malsup.github.io/images/p3.jpg">
								<img src="http://malsup.github.io/images/p4.jpg">
							</div>
						 prev/next links
							<div class=center>
								<span class=prevControl>&lt;&lt;Prev </span>
								<span class=nextControl> Next&gt;&gt;</span>
							</div>

						</div>


					</div>


			<!-- google analytics -->
			<script src="http://www.google-analytics.com/urchin.js"></script>
			<script>_uacct = "UA-850242-2"; urchinTracker();</script>
	</body>
</html>

