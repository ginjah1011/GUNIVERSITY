<?php

class Template{
	
	private $pdo;
		
	public function __construct(){
    	$this->pdo = new MyDB;
	}
	
	/**
	** FONCTIONS BACK- AND FRONT-END
	**/
	public function getItems($cat,$level){
		$items=$this->pdo->queryParam('SELECT * FROM tpl_item_menu WHERE cat_menu=? AND level_menu=?', array($cat, $level));
		if(!empty($items)){
			return $items;
		}
		else
			return NULL;
	}
	
	
	/**
	** FONCTIONS BACK-END
	**/
	public function getSubItems($cat,$level,$parent){
		$subItems=$this->pdo->queryParam('SELECT * FROM tpl_item_menu WHERE cat_menu=? AND level_menu=? AND parent_menu=?', array($cat, $level, $parent));
		if(!empty($subItems)){
			return $subItems;
		}
		else
			return NULL;
	}
	
	public function initTopNav(){
		$mainItems=	$this->getItems(3,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur){
				//var_dump($valeur->link_menu);
				?>
					<li><a href="<?= $valeur->link_menu ?>"><?= $valeur->nom_item_menu_fr ?></a></li>
				<?php
			}	
		}
	}
	
	public function initRmNav($page){
		$mainItems=	$this->getItems(1,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur1){
			?>
				<li class="panel">
					<a  href="<?= $valeur1->link_menu ?>" data-parent="#side" data-toggle="collapse" class="accordion-toggle <?php if($page==$valeur1->page_active) echo 'active'; ?>" data-target="#rm<?= $valeur1->id_item_menu ?>">
						<i class="fa fa-<?= $valeur1->icon ?>"></i> <?= $valeur1->nom_item_menu_fr ?>
						<?php 
							$itemLevel_2=$this->getSubItems(1,2,$valeur1->id_item_menu);
							if(!empty($itemLevel_2)){?>
								<span class="fa arrow"></span>
								</a><!-- end a level 1 -->
								<ul class="collapse nav" id="rm<?= $valeur1->id_item_menu ?>">
									<?php
									foreach($itemLevel_2 as $valeur2){
										$itemLevel_3=$this->getSubItems(1,3,$valeur2->id_item_menu);
										?>
										<li>
											<a href="<?= $valeur2->link_menu ?>" class="accordion-toggle" data-toggle="collapse"  data-target="#rm<?= $valeur2->id_item_menu ?>">
												<i class="fa fa-angle-double-right"></i> <?= $valeur2->nom_item_menu_fr ?> 
												<?php 
													if(!empty($itemLevel_3)){?>
														<span class="fa arrow"></span>							
														</a>
														<ul class="collapse nav" id="rm<?= $valeur2->id_item_menu ?>">
															<?php
															foreach($itemLevel_3 as $valeur3){ ?>
																<li>
																	<a href="<?= $valeur3->link_menu ?>" class="accordion-toggle" data-toggle="collapse"  data-target="#rm<?= $valeur3->id_item_menu ?>">
																		<i class="fa fa-angle-double-right"></i> <?= $valeur3->nom_item_menu_fr ?> 
																	</a>
																</li>	
															<?php } ?>
														</ul>
													<?php }
													else{?>
														</a>
													<?php }	
												?>
										</li>
										<?php
									}//end foreach $itemLevel_2
									?>
								</ul>
								<?php //level 3
									
								//end level 3?>
							<?php }//end if $itemLevel_2 not empty
							else { ?>
								</a><!-- end a level 1 whitout submenu-->
							<?php }
						?>
				</li>
			<?php
			}//end foreach $mainItems	
		}//end if $mainItems empty
	}
	
	public function initUserBox(){
		$mainItems=	$this->getItems(2,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur){
				?>
				<li>
					<a href="<?= $valeur->link_menu ?>">
						<i class="fa fa-<?= $valeur->icon ?>"></i> <?= $valeur->nom_item_menu_fr ?>
					</a>
				</li>	
				<?php 
			}	
		}
	}
	
	/**
	** FONCTIONS FRONT-END
	**/
	public function initFrontTopMenu($lang){
		$mainItems=	$this->getItems(4,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur){
				//var_dump($valeur->link_menu);
				?>
					<li>
						<a href="<?= $valeur->link_menu ?>"><?php if($lang=='fr') echo $valeur->nom_item_menu_fr; if($lang=='en') echo $valeur->nom_item_menu_en; ?></a>
							<?php
								$subItems=$this->getSubItems(4,2,$valeur->id_item_menu);
								if(!empty($subItems)){
									?>
									<div class="dropdown">
									<ul class="bg-7"><?php
									foreach($subItems as $subVal){?>
										<li><a href="<?= $subVal->link_menu ?>"><?php if($lang=='fr') echo $subVal->nom_item_menu_fr; if($lang=='en') echo $subVal->nom_item_menu_en; ?></a></li>
								
								 	<?php }//end foreach subItems ?>
									</ul>
									</div>
								<?php }//end if subItems not empty
							?>
						</li>
				<?php
			}	
		}
	}	
		
	public function initFrontSubTopMenu($lang){
		$mainItems=	$this->getItems(5,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur){
				//var_dump($valeur->link_menu);
				?>
					<li>
						<a href="<?= $valeur->link_menu ?>"><?php if($valeur->icon!=NULL) echo '<i class="'.$valeur->icon.'"></i>'; ?><?php if($lang=='fr') echo $valeur->nom_item_menu_fr; if($lang=='en') echo $valeur->nom_item_menu_en; ?></a>
					</li>
				<?php
			}	
		}
	}
	
	public function initXSFrontTopMenu($lang){
		$mainItems=	$this->getItems(4,1);
		if(!empty($mainItems)){
			foreach($mainItems as $valeur){
				//var_dump($valeur->link_menu);
				?>
					<li>
						<a href="<?= $valeur->link_menu ?>"><?php if($lang=='fr') echo $valeur->nom_item_menu_fr; if($lang=='en') echo $valeur->nom_item_menu_en; ?></a>
							<?php
								$subItems=$this->getSubItems(4,2,$valeur->id_item_menu);
								if(!empty($subItems)){
									?>
									<div class="dropdown">
									<ul ><?php
									foreach($subItems as $subVal){?>
										<li><a href="<?= $subVal->link_menu ?>"><?php if($lang=='fr') echo $subVal->nom_item_menu_fr; if($lang=='en') echo $subVal->nom_item_menu_en; ?></a></li>
								
								 	<?php }//end foreach subItems ?>
									</ul>
									</div>
								<?php }//end if subItems not empty
							?>
						</li>
				<?php
			}	
		}
	}
	
	public function loadSlideshow($lang){
		$slides = $this->pdo->query('SELECT * FROM con_homeslideshow WHERE statut=1');
		if(!empty($slides)){
			foreach($slides as $valeur){
				?>
					<div class="slide">
						<img class="img-responsive" src="images/slide_img/slider_small_<?= $valeur->id_slideshow ?>.jpg" alt="demo">
						<div class="description">
							<div class="inner">
								<p class="title"><?php if($lang=='fr') echo $valeur->title_slideshow_fr; if($lang=='en') echo $valeur->title_slideshow_en; ?></p>
								<p><?php if($lang=='fr') echo $valeur->text_slideshow_fr; if($lang=='en') echo $valeur->text_slideshow_en; ?></p>
								<a href="<?= $valeur->link_slideshow ?>" class="custom-btn"><?php if($lang=='fr') echo 'Plus d\'infos'; if($lang=='en') echo 'Learn more'; ?></a>
							</div>
						</div>
					</div>
				<?php
			}	
		}
	}
	
	public function loadSocialNetIcon(){
		$social = $this->pdo->query('SELECT * FROM con_socialNet WHERE statut=1');
		if(!empty($social)){
			foreach($social as $valeur){
				?>
					<a class="<?= $valeur->class_socialNet ?>" href="<?= $valeur->link_socialNet ?>"></a>
				<?php
			}	
		}
	}
	
	public function loadNextEvent($lang){
		$event = $this->pdo->query("SELECT * FROM con_event WHERE active=1 AND begin_date >= CURDATE() ORDER BY begin_date DESC LIMIT 1");
		if(!empty($event)){
			//return $event;
			foreach($event as $valeur){
				$date = date_create($valeur->begin_date);
				$day = date_format($date, 'd');
				
				
				$monthArray=array('fr' => array(1=>'Janvier', 2=>'Février', 3=>'Mars', 4=>'Avril', 5=>'Mai', 6=>'Juin', 7=>'Juillet', 8=>'Août', 9=>'Septembre', 10=>'Octobre', 11=>'Novembre', 12=>'Decembre'), 
							 'en' => array(1=>'January', 2=>'February', 3=>'March', 4=>'April', 5=>'May', 6=>'June', 7=>'July', 8=>'August', 9=>'September', 10=>'October', 11=>'November', 12=>'December')); 
				$month=$monthArray[$lang][date_format($date, 'm')];
				?>
				
				<div class="description">
					<div class="inner">
						<p class="title"><?php echo ($lang=='en') ? 'Upcoming event' : 'Prochain évènement'; ?></p>
						<div class="date">
							<span class="first number"><?php echo substr($day, -2, 1); ?></span>

							<span class="second number"><?php echo substr($day, -1); ?></span>
								<span class="month"><?= $month ?></span>
						</div>
						<div class="text">
							<p><?php echo ($lang=='en') ? $valeur->title_event_en : $valeur->title_event_fr; ?></p>
							<a href="<?= $valeur->link_event ?>" class="custom-btn" target="_blank"><?php echo ($lang=='en') ? 'Learn more' : 'Plus d\'infos'; ?></a>
						</div>
					</div>
				</div>	
				<?php 
			}	
		}
	}
	
	//ARTICLES
	function trunc($phrase, $max_words){
	   $phrase_array = explode('.',$phrase);
	   if(count($phrase_array) > $max_words && $max_words > 0)
		  $phrase = implode('.',array_slice($phrase_array, 0, $max_words)).'.'; 
	   return $phrase;
	}
	
	function getArticle($id){
		$article=$this->pdo->queryParam('SELECT * FROM con_articles WHERE id_articles=? ', array($id));
		if(!empty($article)){
			return $article;
		}
		else
			return NULL;
	}
	
	function initArticleVedette($lang){
		$articleVedette=$this->pdo->queryParam('SELECT * FROM con_homemodules WHERE active_homeModule=? AND cat_homeModule=?', array(1, 1));
		if(!empty($articleVedette)){
			foreach($articleVedette as $valeur){
				$article=$this->getArticle($valeur->article_id);
				foreach($article as $valeur2){
					if($valeur->type_homeModule==1){?>
						<div class="col-xs-12 col-md-6">
							<div class="text-block box P30 bg-0">
								<p class="title h1"><?php echo ($lang=='en') ? $valeur2->title_article_en : $valeur2->title_article_fr; ?></p>

								<div class="text">
									<p>
										<?php echo ($lang=='en') ? $this->trunc($valeur2->text_article_en,2) : $this->trunc($valeur2->text_article_fr,2); ?>
									</p>
								</div>

								<a href="<?= $valeur->link_article ?>" class="more-link colored"><i class="arrow"></i><?php echo ($lang=='en') ? 'Learn more' : 'Lire la suite'; ?></a>
							</div>
						</div>
					<?php }//end if (type == 1)
					//Article vedette avec video type 2
					if($valeur->type_homeModule==2){ ?>
						<div class="col-xs-12 col-md-6">
							<div class="video-block box">
								<div class="row">
									<div class="col-xs-12 col-sm-3 col-md-5 col-lg-4">
										<div class="column-description P30 bg-2 corner">
											<h5><?php echo ($lang=='en') ? $valeur2->title_article_en : $valeur2->title_article_fr; ?></h5>

											<div class="text">
												<p>
													<?php echo ($lang=='en') ? $this->trunc($valeur2->text_article_en,1) : $this->trunc($valeur2->text_article_fr,1); ?>
												</p>
											</div>

											<a href="<?= $valeur->link_article ?>" class="more-link"><i class="arrow"></i><?php echo ($lang=='en')?('Learn more'):('Lire la suite'); ?></a>
										</div>
									</div>

									<div class="col-xs-12 col-sm-9 col-md-7 col-lg-8 bg-2">
										<div class="video box" style="background-image: url(images/video_bg.jpg); opacity:0.9;">
											
										</div><a class="video-btn" href="<?= $valeur->link_video ?>" data-gallery="portfolio"><?php echo ($lang=='en') ? $valeur->video_title_en : $valeur->video_title_fr; ?></a>
									</div>
								</div>
							</div>
						</div>
					
					<?php } 
					//
				}//END FOREACH ARTICLES
			}
		}
	}
	
	function initBlocInfos($lang){
		$articleInfo=$this->pdo->queryParam('SELECT * FROM con_infobox WHERE active_infoBox=?', array(1));
		if(!empty($articleInfo)){
			foreach($articleInfo as $valeur){ ?>
				<div class="col-xs-12 col-md-4">
					<div class="info-item P30 bg-<?= $valeur->back_gr ?>">
						<h3 class="icon-<?= $valeur->icon ?>"><span><?php echo ($lang=='en')? $valeur->title_infoBox_en : $valeur->title_infoBox_fr ; ?></span></h3>
						<p><?php echo ($lang=='en')? $valeur->intro_text_en : $valeur->intro_text_fr ; ?></p>	
						<a href="<?= $valeur->link_infoBox ?>" class="more-link"><i class="arrow"></i><?php echo ($lang=='en')?('Learn more'):('Lire la suite'); ?></a>
					</div>
				</div>
			<?php }//End foreach 
		}//End if articleInfo not empty
	}
	
}

?>