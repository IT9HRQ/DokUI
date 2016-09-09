<?php
/**
 * DokUI v0.2.0 - (c) 2014 Francesco Bianco
 *
 * @link     https://sourceforge.net/p/dokui/
 * @author   Francesco Bianco <bianco@javnaile.org> 
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die();
?><!DOCTYPE html>
<html lang="en-gb" dir="ltr" class="uk-notouch"><head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php tpl_pagetitle() ?> | <?php echo strip_tags($conf['title']) ?></title>	
<link rel="shortcut icon" href="<?=DOKU_TPL?>images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400">
<?php tpl_metaheaders() ?>
</head>

<body class="tm-background">
	<?php include(__DIR__.'/analytics.php') ?>
	
	<nav class="tm-navbar uk-navbar uk-navbar-attached">
		<div class="uk-container uk-container-center">

			<a class="uk-navbar-brand dw-navbar-brand uk-hidden-small" href="<?=DOKU_URL?>">
				<i class="uk-icon-coffee"></i> 
				<?=$conf['title']?>
			</a>

			<ul id="dw-navbar-menu" class="uk-navbar-nav uk-hidden-small">
				<?php  
					$html = strip_tags(tpl_include_page('menu',0,0),'<li><a>');
					echo $html;
					if(!$html){echo '<li class="level1">'.strip_tags(html_wikilink('menu','Create main menu'),'<a>').'</li>'; }
				?>                    
			</ul>

			<a href="#tm-offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>

			<div class="uk-navbar-brand uk-navbar-center uk-visible-small">				
				<a href="<?=DOKU_URL?>" class="dw-navbar-brand">
					<i class="uk-icon-wrench"></i> <?=$conf['title']?>
				</a>
			</div>
			
			<?php if (!empty($_SERVER['REMOTE_USER'])) { ?>					
				<div class="uk-navbar-flip uk-hidden-small">
					<ul class="uk-navbar-nav">
						<li data-uk-dropdown>
							<a href=""><?=userlink()?> <i class="uk-icon-caret-down"></i></a>
							<div class="uk-dropdown uk-dropdown-navbar">
								<ul class="uk-nav uk-nav-navbar">															
									<?php tpl_action('profile', 1, 'li') ?>
									<?php tpl_action('login', 1, 'li') ?>
								</ul>
							</div>
						</li>						
					</ul>
				</div>
			<?php } ?>
			
		</div>
				
	</nav>
	
	<div class="tm-middle">
		<div class="uk-container uk-container-center">

			<div class="uk-grid" data-uk-grid-margin="">

				<div class="tm-sidebar uk-width-medium-1-4 uk-hidden-small">
					<ul class="tm-nav uk-nav" data-uk-nav="">
						<?php
							$page = explode(':',tpl_pagetitle(NULL,true));
							array_pop($page);
							$page = count($page)>0 ? implode(':',$page).':navigation' : 'navigation';
							$html = strip_tags(tpl_include_page($page,0,0),'<li><a>');
							echo $html;
							if (!$html) { echo '<li>'.strip_tags(html_wikilink($page,'Create navigation menu'),'<a>').'</li>'; }														
						?>					
					</ul>
				</div>

				<div class="tm-main uk-width-medium-3-4">
					<article class="uk-article dw-article">

						<?php tpl_content() ?>
						<?php echo tpl_action('edit',1,'li',1,'<span>','</span>'); ?>

					</article>
				</div>
			</div>

		</div>
	</div>

	<div class="tm-footer">
		<div class="uk-container uk-container-center uk-text-center">

			<ul class="uk-subnav uk-subnav-line">
				<?php echo strip_tags(tpl_include_page('link',0,0),'<li><a>'); ?>             
				<?php
					tpl_action('admin', 1, 'li');
					tpl_action('register', 1, 'li');
					tpl_action('login', 1, 'li');
				?>
			</ul>

			<div class="uk-panel">
				<?php echo tpl_include_page('footer',0,0) ?>
				<a href="<?=DOKU_URL?>" class="dw-brand">					
					<i class="uk-icon-wrench"></i> <?=$conf['title']?>
				</a>
			</div>

		</div>
	</div>

	<div id="tm-offcanvas" class="uk-offcanvas">

		<div class="uk-offcanvas-bar uk-offcanvas-bar-show">

			<ul class="uk-nav uk-nav-offcanvas">				
				<?php
					$nav = explode(':',tpl_pagetitle(NULL,true));
					array_pop($nav);
					$nav = count($nav)>0 ? implode(':',$nav).':navigation' : 'navigation';
					echo strip_tags(tpl_include_page($nav,0,0),'<li><a>');
					if ($nav) {echo '';}
				?>				
			</ul>
			
		</div>

	</div>
	
	<div class="uk-tooltip"></div>

	<form action="#">
		<input class="fixjs" type="hidden" name="title" value="<?=tpl_pagetitle(NULL,true)?>">
		<?php tpl_indexerWebBug(); ?>
	</form>
	
</body>
</html>