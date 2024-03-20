<?php 
	$CI =& get_instance();

	@$requests = $CI->count_unread_requests();

	@$unverifieds = $CI->get_unverifieds();
?>
<div class="app-main">

	<div class="app-sidebar sidebar-shadow">

		<div class="app-header__logo">

			<div class="logo-src"></div>

			<div class="header__pane ml-auto">

				<div>

					<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">

						<span class="hamburger-box">

							<span class="hamburger-inner"></span>

						</span>

					</button>

				</div>

			</div>

		</div>

		<div class="app-header__mobile-menu">

			<div>

				<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">

					<span class="hamburger-box">

						<span class="hamburger-inner"></span>

					</span>

				</button>

			</div>

		</div>

		<div class="app-header__menu">

			<span>

				<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">

					<span class="btn-icon-wrapper">

						<i class="fa fa-ellipsis-v fa-w-6"></i>

					</span>

				</button>

			</span>

		</div>    <div class="scrollbar-sidebar">

			<div class="app-sidebar__inner">

				<ul class="vertical-nav-menu">

					<li class="app-sidebar__heading">Navigation</li>

					<li>

						<a href="<?php echo base_url(); ?>admin/dashboard" class="mm-active">

							<i class="metismenu-icon pe-7s-display2"></i>

							Dashboard

						</a>

					</li>
					<li>

						<a href="" class="mm-active">

							<i class="metismenu-icon pe-7s-chat"></i>

							Notifications

						</a>
                        <ul>
							<li>

								<a href="<?php echo base_url(); ?>admin/all-notifications">

									<i class="metismenu-icon"></i>

									All Notifications

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/add-notification">

									<i class="metismenu-icon"></i>

									Add Notification

								</a>

							</li>
                        </ul>
					</li>

					<li>

						<a href="">

							<i class="metismenu-icon pe-7s-home"></i>

								RentSmallSmall Properties

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/new-rss-property">

									<i class="metismenu-icon"></i>

									New Property

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/view-properties">

									<i class="metismenu-icon"></i>

									All Properties

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/property-alert-list">

									<i class="metismenu-icon"></i>

									Property Alert List

								</a>

							</li>
							
							<li>

						</ul>

					</li>

					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-chat"></i>

								RSS Inspections <span class="counter-bubble"><?php echo @$requests; ?></span>

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/inspection">

									<i class="metismenu-icon"></i>

									RSS Inspections

								</a>

							</li>
                            <li>

								<a href="<?php echo base_url(); ?>admin/residential-inspections">

									<i class="metismenu-icon"></i>

									App Residential Inspections

								</a>

							</li>
							

						</ul>

					</li>
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-notebook"></i>

								Bookings

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/bookings">

									<i class="metismenu-icon"></i>

									All Bookings

								</a>

							</li>

							

						</ul>

					</li>
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-wallet"></i>

								Transactions

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/transactions/rss">

									<i class="metismenu-icon"></i>

									RentSmallSmall

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/transactions/furnisure">

									<i class="metismenu-icon"></i>

									Furnisure

								</a>

							</li>

						</ul>

					</li>
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-config"></i>

								Property Settings

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/amenities">

									<i class="metismenu-icon"></i>

									Amenities

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/neighborhood-distance">

									<i class="metismenu-icon"></i>

									Neighbourhood Distance

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/facility-category">

									<i class="metismenu-icon"></i>

									Facility Category

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/apt-type">

									<i class="metismenu-icon"></i>

									Apartment Type

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/rent-type">

									<i class="metismenu-icon"></i>

									Rent Type

								</a>

							</li>

						</ul>

					</li>
					
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-note2"></i>

								RentSmallSmall Pages

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/rss-about-us">

									<i class="metismenu-icon"></i>

									About Us

								</a>

							</li>


						</ul>

					</li>

					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-cart"></i>

								Furnisure

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/new-furniture">

									<i class="metismenu-icon"></i>

									Add Item

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/view-items">

									<i class="metismenu-icon"></i>

									View Items

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/furnisure-category">

									<i class="metismenu-icon"></i>

									Furnisure Categories

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/furnisure-type">

									<i class="metismenu-icon"></i>

									Furnisure Type

								</a>

							</li>

							

						</ul>

					</li>
                    <li>
						<a href="dashboard-boxes.html">
							<i class="metismenu-icon pe-7s-home"></i>
								Buy2let Properties
							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
						</a>
						<ul>
							<li>
								<a href="<?php echo base_url(); ?>admin/new-buytolet-property">
									<i class="metismenu-icon"></i>
									New Property
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>admin/all-buytolet-properties">
									<i class="metismenu-icon"></i>
									All Properties 
								</a>
							</li>
							
						</ul>
					</li>
					<li>
						<a href="dashboard-boxes.html">
							<i class="metismenu-icon pe-7s-home"></i>
								Stay SmallSmall 
							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
						</a>
						<ul>
							<li>
								<a href="<?php echo base_url(); ?>admin/new-apartment">
									<i class="metismenu-icon"></i>
									New Apartment
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>admin/all-apartments">
									<i class="metismenu-icon"></i>
									All Apartments 
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>admin/all-bookings">
									<i class="metismenu-icon"></i>
									All Bookings 
								</a>
							</li>
							
						</ul>
					</li>
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-chat"></i>

								BTL Inspections <span class="counter-bubble"><?php //echo @$requests; ?></span>

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/btl-inspections">

									<i class="metismenu-icon"></i>

									Requests

								</a>

							</li>

							

						</ul>

					</li>
					<li>
						<a href="dashboard-boxes.html">
							<i class="metismenu-icon pe-7s-look"></i>
								Verification <span class="counter-bubble"><?php echo @$unverifieds; ?></span>
							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
						</a>
						<ul>
							<li>
								<a href="<?php echo base_url(); ?>admin/verifications">
									<i class="metismenu-icon"></i>
									RSS Verification
								</a>
							</li>
							<li>
								<a href="<?php echo base_url(); ?>admin/app-verifications">
									<i class="metismenu-icon"></i>
									App Verification
								</a>
							</li>
						</ul>
					</li>
					<li>

						<a href="dashboard-boxes.html">

							<i class="metismenu-icon pe-7s-note2"></i>

								Buytolet Pages

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/buytolet-about-us">

									<i class="metismenu-icon"></i>

									About us

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/faq-page">

									<i class="metismenu-icon"></i>

									FAQ

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/btl-how-it-works">

									<i class="metismenu-icon"></i>

									How it works

								</a>

							</li>

						</ul>

					</li>
					<li>

						<a href="#">

							<i class="metismenu-icon pe-7s-news-paper"></i>

							Press News

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/add-news">

									<i class="metismenu-icon"></i>

									Add News

								</a>

							</li>

							<li>

								<a href="<?php echo base_url(); ?>admin/view-all-news">

									<i class="metismenu-icon"></i>

									View All

								</a>

							</li>

						</ul>

					</li>
					<li>

						<a href="#">

							<i class="metismenu-icon pe-7s-users"></i>

							Users

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/rss-users">

									<i class="metismenu-icon"></i>

									RSS Users

								</a>

							</li>
                            <li>

								<a href="<?php echo base_url(); ?>admin/rss-landlords">

									<i class="metismenu-icon"></i>

									RSS Landlords

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/btl-users">

									<i class="metismenu-icon"></i>

									Buytolet Users

								</a>

							</li>
							
							<li>

								<a href="<?php echo base_url(); ?>admin/app-users">

									<i class="metismenu-icon"></i>

									App Users

								</a>

							</li>
						</ul>

					</li>
					<li>

						<a href="#">

							<i class="metismenu-icon pe-7s-wallet"></i>

							Wallets

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>
                            <li>

								<a href="<?php echo base_url(); ?>admin/wallet-accounts">

									<i class="metismenu-icon"></i>

									Wallet accounts

								</a>

							</li>
							
						</ul>

					</li>
					<li>

						<a href="#">

							<i class="metismenu-icon pe-7s-users"></i>

							Admin

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/add-admin">

									<i class="metismenu-icon"></i>

									Add Admin

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/add-landlord">

									<i class="metismenu-icon"></i>

									Add Landlords

								</a>

							</li>

							

						</ul>

					</li>
					<li>

						<a href="#">

							<i class="metismenu-icon pe-7s-graph"></i>

							Website Statistics

							<i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>

						</a>

						<ul>

							<li>

								<a href="<?php echo base_url(); ?>admin/statistics">

									<i class="metismenu-icon"></i>

									RSS Statistics

								</a>

							</li>
							<li>

								<a href="<?php echo base_url(); ?>admin/btl-statistics">

									<i class="metismenu-icon"></i>

									Buy2let Statistics

								</a>

							</li>
						</ul>

					</li>

				</ul>

			</div>

		</div>

	</div> 