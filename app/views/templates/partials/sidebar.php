<div class="left-side-bar">
		<div class="brand-logo">
			<a href="index.html">
				<img src="vendors/images/deskapp-logo.svg" alt="" class="dark-logo">
				<img src="vendors/images/deskapp-logo-white.svg" alt="" class="light-logo">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
					<li>
						<a href="/" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext"><?php echo $_SESSION['user']->username ?></span>
						</a>
					</li>
					<li>
						<div class="dropdown-divider"></div>
					</li>
					<li>
						<div class="sitemap">
							<ul class="text-white">
                                <?php
                                    foreach ($finder as $file) {
                                        $is_folder = $file->isDir();
                                        
                                        $type = $is_folder?'folder':$file->getFileTypeLogo();
                                        echo '<li><a href="#"><i class="fa-regular fa-'.$type.'"></i>  '.$file->getFileName().'</a></li>';
                                    }
                                ?>
								
								<!-- <li><i class="fa-regular fa-folder"></i> <a href="#">Level 1</a></li>
								<li class="child">
									<h5 class="h5">Level 2</h5>
									<ul>
										<li><a href="#">Level 2</a></li>
										<li><a href="#">Level 2</a></li>
										<li class="child">
											<h5 class="h5">Level 3</h5>
											<ul>
												<li><a href="#">Level 3</a></li>
												<li><a href="#">Level 3</a></li>
											</ul>
										</li>
									</ul>
								</li> -->
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>