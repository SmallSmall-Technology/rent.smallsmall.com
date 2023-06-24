	<div class="app-main__outer">

	<div class="app-main__inner">

		<div class="app-page-title">

			<div class="page-title-wrapper">

				<div class="page-title-heading">

					<div class="page-title-icon">

						<i class="pe-7s-graph text-success">

						</i>

					</div>

					<div>

						Buy2let Statistics	

					</div>

				</div>
				<div class="page-title-actions">
									
                </div>
			</div>

		</div> 
		
		<div class="row">
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Summary</h5>
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>&nbsp;</th>
                                                    <th>Visitors</th>
                                                    <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th width="200px" scope="row">Today</th>
                                                    <td><?php echo number_format($todayVisitors); ?></td>
                                                    <td><?php echo number_format($rvt); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Yesterday</th>
                                                    <td><?php echo number_format($visitorsYesterday); ?></td>
                                                    <td><?php echo number_format($visitsYesterday); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Last 7 Days</th>
                                                    <td><?php echo number_format($lsd); ?></td>
                                                    <td><?php echo number_format($visitslsd); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Last 30 Days</th>
                                                    <td><?php echo number_format($visitorsThirty); ?></td>
                                                    <td><?php echo number_format($visitsThirty); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Last One Year</th>
                                                    <td><?php echo number_format($visitorsYear); ?></td>
                                                    <td><?php echo number_format($visitsYear); ?></td>
                                                </tr>												
                                                <tr>
                                                    <th scope="row">Total</th>
                                                    <td><?php echo number_format($totalVisitors); ?></td>
                                                    <td><?php echo number_format($totalVisits); ?></td>
                                                </tr>
                                                <tr>
                                                    <th scope="row">&nbsp;</th>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
							<div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Top Browser Types</h5>
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>Browser</th>
                                                    <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($browsers) && !empty($browsers)){ ?>
                                                    <?php foreach($browsers as $browser => $b_val){ ?>
                                                    <tr>
                                                        <td><?php echo $b_val['browser_type']; ?></td>
                                                        <td><?php echo $b_val['hits']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Top Country Visits</h5>
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>Country</th>
                                                    <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($countries) && !empty($countries)){ ?>
                                                    <?php foreach($countries as $country => $country_val){ ?>
                                                    <tr>
                                                        <td><?php echo $country_val['country']; ?></td>
                                                        <td><?php echo $country_val['hits']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Top City Visits</h5>
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>City</th>
                                                    <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($cities) && !empty($cities)){ ?>
                                                    <?php foreach($cities as $city => $city_val){ ?>
                                                    <tr>
                                                        <td><?php if( $city_val['city'] == ''){ echo "Unknown"; }else{ echo $city_val['city']; } ?></td>
                                                        <td><?php echo $city_val['hits']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
		
						 <div class="col-lg-6">
                                <div class="main-card mb-3 card">
                                    <div class="card-body"><h5 class="card-title">Referrer Website</h5>
                                        <table class="mb-0 table">
                                            <thead>
                                                <tr>
                                                    <th>Referrer Website</th>
                                                    <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if(isset($referrers) && !empty($referrers)){ ?>
                                                    <?php foreach($referrers as $referrer => $ref_val){ ?>
                                                    <tr>
                                                        <td><?php if( $ref_val['referrer'] == ''){ echo "Unknown"; }else{ echo $ref_val['referrer']; } ?></td>
                                                        <td><?php echo $ref_val['hits']; ?></td>
                                                    </tr>
                                                    <?php } ?>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

		

				</div>

			</div>

		</div>

	</div>