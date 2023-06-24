	<div class="pane">

		<div style="text-align:center" class="pane-inner">

			<h1><?php echo $content['title']; ?></h1>

		</div>

	</div>

	<div class="item-pane">

		<div class="item-pane-inner">

			<div class="txt-content">
				<?php echo nl2br(html_entity_decode($content['content'])); ?>
			</div>

			<div>

				<div class="about-grid-img">

					<div class="about-img">

						<img src="<?php echo base_url('assets/images/about-us-1.jpg'); ?>" />

					</div>

				</div>

				<div class="about-grid-img">

					<div class="about-img">

						<img src="<?php echo base_url('assets/images/about-us-3.jpeg'); ?>" />					

					</div>

				</div>

				<div class="about-grid-img">

					<div class="about-img">

						<img src="<?php echo base_url('assets/images/about-us-2.jpg'); ?>" />					

					</div>

				</div>

			</div>

			<div class="txt-content">				

				<div class="story-txt floatLeft">

					<div class="heading">

						Our Story

					</div>
					<?php echo nl2br(htmlentities($content['story_1'])); ?>					

				</div>

				<div class="story-img floatRight">				

					<img src="<?php echo base_url('assets/images/about-us-3.jpeg'); ?>" />

				</div>

			</div>

			<!--<div class="txt-content">				

				<div class="story-txt floatRight">

					<div class="heading">

						Our Story

					</div>
					<?php //echo nl2br(htmlentities($content['story_2'])); ?>

				</div>

				<div class="story-img floatLeft">

					<img src="<?php //echo base_url('assets/images/about-us-1.jpg'); ?>" />				

				</div>

			</div>-->
			<div class="txt-content">
				<div class="heading floatMiddle">
					Our Team
					<h5>Meet our dynamic team that keeps the wheel rolling.</h5>
				</div>
				<ul class="team-container teamProps">
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/tunde.jpg'); ?>" />
						<div class="member-name">Tunde Balogun</div>
						<div class="member-designation">Co Founder/CEO</div>
					</li>
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/naomi.png'); ?>" />
						<div class="member-name">Naomi Olaghere</div>
						<div class="member-designation">Co Founder/VP Operations</div>
					</li>
					
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/pidah.png'); ?>" />
						<div class="member-name">Pidah Tnadah</div>
						<div class="member-designation">Co Founder/VP Product & Tech</div>
					</li>
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/james-otache.jpg'); ?>" />
						<div class="member-name">James Otache</div>
						<div class="member-designation">Accountant</div>
					</li>
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/seun.png'); ?>" />
						<div class="member-name">Oluwaseun Crowther</div>
						<div class="member-designation">Lead Backend Engineer</div>
					</li>
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/chioma.png'); ?>" />
						<div class="member-name">Chioma Boms</div>
						<div class="member-designation">Customer Experience Supervisor</div>
					</li>
					<!---<li class="team-item">
						<img src="<?php //echo base_url('assets/images/team/onyeka.jpg'); ?>" />
						<div class="member-name">Onyeka Akumah</div>
						<div class="member-designation">Co Founder</div>
					</li>
					<li class="team-item">
						<img src="<?php //echo base_url('assets/images/team/blessing.png'); ?>" />
						<div class="member-name">Blessing C. Macaulay</div>
						<div class="member-designation">Marketing Manager</div>
					</li>--->
					
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/fisayo-sowemimo.jpg'); ?>" />
						<div class="member-name">Olufisayo Sowemimo </div>
						<div class="member-designation">Human Resource Manager</div>
					</li>
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/fortune.png'); ?>" />
						<div class="member-name">Fortune Omo-Iyare</div>
						<div class="member-designation">Customer Experience</div>
					</li>
					
					<li class="team-item">
						<img src="<?php echo base_url('assets/images/team/kelvin.png'); ?>" />
						<div class="member-name">Kelvin Yakubu</div>
						<div class="member-designation">Field Experience</div>
					</li>
				
				</ul>
				<div class="nav-controls nav-mob">
					<span class="nav-buts right-but" id="right-button"><i class="fa fa-angle-right"></i></span>
					<span class="nav-buts left-but" id="left-button"><i class="fa fa-angle-left"></i></span>
				</div>
			</div>
		</div>
		<div class="core-containter">
		    <div class="core-inner">
		        <div class="core-heading">Our Core Values</div>
    		    <div class="core-item">
    		        <div class="core-icn shield">
    		            
    		        </div>
    		        <div class="core-title">We are trustworthy</div>
    		        <div class="core-note">
    		            Renting is possible with no hidden charges. With us, what you see is what you get.
    		        </div>
    		    </div>
    		    <div class="core-item">
    		        <div class="core-icn handshake">
    		            
    		        </div>
    		        <div class="core-title">We are making social impact</div>
    		        <div class="core-note">
    		            We believe that everyone has a right to living comfortably no matter their budget, gender, tribe or marital status. We bring affordable living without discrimination.
    		        </div>
    		    </div>
    		    <div class="core-item">
    		        <div class="core-icn friendship">
    		            
    		        </div>
    		        <div class="core-title">Building communities</div>
    		        <div class="core-note">
    		            The RentSmallsmall community comprises of individuals from various works of life, united for the purpose of making a better, impactful society through their commitment and contributions.
    		        </div>
    		    </div>
    		</div>
		</div>

			

	</div>
	<script src="<?php echo base_url('assets/js/team-scroller.js'); ?>"></script>