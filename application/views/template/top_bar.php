<!-- TOP BAR -->
	<div id="top-bar">
<?php //var_dump($this->session->userdata);?>		
		<div class="page-full-width cf">

			<ul id="nav" class="fr">

        <li class="v-sep">
            <a class="round button dark menu-user image-left">
                  <strong><?=$this->session->userdata('username') ?></strong>
            </a>
					 
				</li>
			
      <li><?= anchor('login/logout', 'تسجيل خروج', 'class="round button dark menu-logoff image-left"')?></li>
				
			</ul> <!-- end nav -->

<div id='clock' class='fl'></div>
					


		</div> <!-- end full-width -->	
	
	</div> <!-- end top-bar -->
