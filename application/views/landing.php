<!-- <!doctype html> -->
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Social Media and Marketplace</title>
    <meta name="description" content="Social Media and Marketplace">
    <meta name="keywords" content="Social Media and Marketplace">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'> -->
    <link rel="stylesheet" href="<?= assets_url('css/bootstrap.min.css'); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= assets_url('css/font-awesome.min.css'); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= assets_url('css/font-lineicons.css'); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= assets_url('css/animate.css'); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= assets_url('css/toastr.min.css'); ?>" type="text/css" media="all" />
    <link rel="stylesheet" href="<?= assets_url('css/index.css'); ?>" type="text/css" media="all" />
    
</head>

<body id="landing-page">

    <!-- Preloader -->
        
    <header>
        <nav class="navigation navigation-header">
            <div class="container">
                <div class="navigation-brand">
                    <div class="brand-logo">
						<a href="<?= base_url(); ?>" class="logo">Social media and Marketplace</a>
						<span class="sr-only"></span>
                    </div>
                    <button class="navigation-toggle visible-xs" type="button" data-toggle="dropdown" data-target=".navigation-navbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navigation-navbar">
                    <ul class="navigation-bar navigation-bar-right">
                        <li><a href="<?= base_url('social/outfit'); ?>">Social Media</a></li>
                        <li><a href="#">Marketplace</a></li>
                        <li><a href="<?= base_url('social/auth'); ?>">Sign up</a></li>
                        <li><a href="<?= base_url('social/auth'); ?>">Sign in</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
	<div id="hero" class="static-header register-version light clearfix">

        <div class="text-heading">
            <h1 class="animated hiding" data-animation="bounceInDown" data-delay="0">Do not wait &mdash; <span class="highlight">Join us</span> today!</h1>
            <p class="animated hiding" data-animation="fadeInDown" data-delay="500">Social media and marketplace</p>
        </div>
		
		<div class="container">
			<div class="signup-wrapper animated hiding" data-animation="bounceInUp" data-delay="0">
				<div class="row">
						<form class="form-inline form-register form-register-small" method="post" action="">
						
							<div class="form-group">
								<input size="30" type="text" class="form-control" name="fullname" placeholder="Full name">
							</div>
							
							<div class="form-group">
								<input size="25" type="email" class="form-control" name="email" placeholder="Email">
							</div>
							<div class="form-group password-wrapper">
								<input type="password" class="form-control" name="password" placeholder="Password">
							</div>
							<div class="form-group submit-wrap">
								<input type="submit" class="btn btn-primary btn-md" value="Join now">
							</div>
						</form>
				</div>
			</div>
		</div>
		
    </div>
    
    <a id="showHere"></a>
    
	<section id="about" class="section dark">
        <div class="container">
		
            <ul class="nav nav-tabs alt">
                <li class="active"><a href="#first-tab-alt" data-toggle="tab">Social Media</a></li>
                <li><a href="#second-tab-alt" data-toggle="tab">Marketplace</a></li>
            </ul>
                    
            <div class="tab-content alt">
				<div class="tab-pane active" id="first-tab-alt">
					<div class="section-content row">        
						<div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
							<img src="<?= base_url('assets/img/socialmedia.jpg'); ?>" class="img-responsive" alt="process 3" />
						</div>
						<div class="col-sm-6 animated hiding" data-animation="fadeInRight">
							<br/>
							<article class="center">
								<h3>SOCIAL MEDIA <span class="highlight">FEATURE</span></h3>
								<div class="sub-title">Lorem ipsum dolor sit atmet sit dolor greand fdanrh<br/> sdfs sit atmet sit dolor greand fdanrh sdfs</div>
								<p>In his igitur partibus duabus nihil erat, quod Zeno commuta rest gestiret. Sed virtutem ipsam inchoavit, nihil ampliusuma. Scien tiam pollicentur, quam non erat mirum sapientiae lorem cupido patria esse cariorem. Quae qui non vident, nihilamane umquam magnum ac cognitione.</p>
								<br/>
								<a href="#" class="btn btn-secondary animated hiding" data-animation="bounceIn" data-delay="700">Get template</a>
								<a href="#" class="btn btn-secondary animated hiding" data-animation="bounceIn" data-delay="700">See elements</a>
							</article>
						</div>
					</div>
                </div>
					
                <div class="tab-pane" id="second-tab-alt">
                    <div class="section-content row">                
						<div class="col-sm-6 pull-right animated hiding" data-animation="fadeInRight">
							<img src="<?= base_url('assets/img/marketplace.jpg'); ?>" class="img-responsive pull-right" alt="process 2" />
						</div>
						<div class="col-sm-6 animated hiding" data-animation="fadeInLeft">
							<br/><br/>
							<article class="center">
								<h3>MARKETPLACE <span class="highlight">FEATURE</span></h3>
								<div class="sub-title">Lorem ipsum dolor sit atmet sit dolor greand fdanrh<br/> sdfs sit atmet sit dolor greand fdanrh sdfs</div>
								<p>In his igitur partibus duabus nihil erat, quod Zeno commuta rest gestiret. Sed virtutem ipsam inchoavit, nihil ampliusuma. Scien tiam pollicentur, quam non erat mirum sapientiae lorem cupido patria esse cariorem. Quae qui non vident, nihilamane umquam magnum ac cognitione.</p>
							</article>
						</div>
					</div>
                </div>
			</div>
        </div>
    </section>
    <hr class="no-margin" />

    <section id="guarantee" class="long-block light">
        <div class="container">
            <div class="col-md-12 col-lg-9">
				<i class="fa fa-sign-in pull-left sign-up-logo"></i>
                <article class="pull-left">
                    <h2><strong>JOIN US</strong> NOW!</h2>
                    <p class="thin">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </article>
            </div>
			
            <div class="col-md-12 col-lg-3">
                <a href="<?= base_url('social/auth'); ?>" class="btn btn-default">Sign up</a>
            </div>
        </div>
    </section>
    
    <footer id="footer" class="footer light">
        <div class="container">
            <div class="footer-content row">
                <div class="col-sm-4">
                    <div class="logo-wrapper">
                        <img src="<?= base_url('assets/img/logo.jpg'); ?>" alt="logo" />
                    </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga fugit iure saepe perspiciatis incidunt ipsum porro non. Aperiam ullam voluptates fuga nisi, reiciendis obcaecati, nostrum magnam commodi, quaerat modi ratione.</p>
                    <p><strong>Julius Kencana, Founder</strong>.</p>
                </div>
                
                <div class="col-sm-3">
                    <div class="footer-title">Our Contacts</div>
                    <ul class="list-unstyled">
                        <li>
                            <a href="mailto:info@startup.ly">admin@gmail.com</a>
                        </li>
                        <li>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        </li>
                        <li>
                            1 - 234-456-7980
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">All rights reserved.</div>
    </footer>
    
    <div class="back-to-top"><i class="fa fa-angle-up fa-3x"></i></div>
    
	<script src="<?= assets_url('js/jquery-1.11.1.min.js'); ?>"></script>
    
    <script type="text/javascript" src="<?= assets_url('js/bootstrap.min.js'); ?>"></script>
	<script type="text/javascript" src="<?= assets_url('js/jquery.flexslider-min.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/jquery.nav.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/jquery.appear.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/jquery.plugin.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/jquery.countdown.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/waypoints.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/waypoints-sticky.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/jquery.validate.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/toastr.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/headhesive.min.js'); ?>"></script>
    <script type="text/javascript" src="<?= assets_url('js/scripts.js'); ?>"></script>
</body>
</html>