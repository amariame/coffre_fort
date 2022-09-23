<?php (new Util\View)->render('templates/partials/header'); ?>

	<?php (new Util\View)->render('templates/partials/sidebar',compact('finder')); ?>
	
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>joel</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dossier</a></li>
									<li class="breadcrumb-item active" aria-current="page">sous dossier</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="mb-30">
					<div class="row">
                    <?= $content ?>                        
					</div>
				</div>
			</div>
			<div class="footer-wrap pd-20 mb-20 card-box">
				COFFRE FORT <a href="javascript:;">&copy;M1 MIAGE</a>
			</div>
		</div>
	</div>

	
<?php (new Util\View)->render('templates/partials/footer'); ?>