<!-- TOP BAR -->
	<div id="top-bar">
<?php //var_dump($this->session->userdata);?>		
		<div class="page-full-width cf">

			<ul id="nav" class="fr">
	
        <li class="v-sep"></li>
        <li class="v-sep">
            <a href="#" class="round button dark menu-user image-left">
                  <strong><?=$this->session->userdata('username') ?></strong>
            </a>
					<ul>
				
						
						<li><?= anchor('login/logout', 'تسجيل خروج');?></li>
					</ul> 
				</li>
			
      <li><?= anchor('login/logout', 'تسجيل خروج', 'class="round button dark menu-logoff image-left"')?></li>
				
			</ul> <!-- end nav -->

					


		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
