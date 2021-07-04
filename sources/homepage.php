
		<!-- categorys -->
	    			<div class="bg_overlay">
						<div class="exchange_start">

						    <div class="container">
						        <div class="row" id="bit_exchange_box">
    					<div id="bit_exchange_results"></div>
    								<form id="bit_exchange_form">
    								<div class="col-md-6">
    									<div class="row">
    										<div class="col-md-3 hidden-xs hidden-sm">
    											<div style="margin-top:50px;">
    												<img src="assets/icons/Bitcoin.png" id="bit_image_send" width="72px" height="72px" class="img-circle img-bordered">
    											</div>
    										</div>
    										<div class="col-md-9">
    											<h3><i class="fa fa-arrow-down"></i> <?php echo $lang['send']; ?></h3>
    											<div class="form-group">
    												<select class="form-control form_style_1 input-lg" id="bit_gateway_send" name="bit_gateway_send" onchange="bit_refresh('1');">
    													<?php
    													$gateways = $db->query("SELECT * FROM bit_gateways WHERE allow_send='1' and status='1' ORDER BY id");
    													if($gateways->num_rows>0) {
    														while($g = $gateways->fetch_assoc()) {
    															if($g['default_send'] == "1") { $sel = 'selected'; } else { $sel = ''; }
    															echo '<option value="'.$g[id].'" '.$sel.'>'.$g[name].' '.$g[currency].'</option>';
    														}
    													} else {
    														echo '<option>'.$lang[no_have_gateways].'</option>';
    													}
    													?>
    												</select>
    											</div>
    											<div class="form-group">
    												<input type="text" class="form-control form_style_1 input-lg" id="bit_amount_send" name="bit_amount_send" value="0" onkeyup="bit_calculator();" onkeydown="bit_calculator();">
    											</div>
    											<div class="text pull-right exchange_rate_text" style="padding-bottom:10px;font-weight:bold;"><?php echo $lang['exchange_rate']; ?>: <span id="bit_exchange_rate">-</span></div>
    										</div>
    									</div>
    								</div>
    								<div class="col-md-6">
    									<div class="row">
    										<div class="col-md-9">
    											<h3><i class="fa fa-arrow-up"></i> <?php echo $lang['receive']; ?></h3>
    											<div class="form-group">
    												<select class="form-control form_style_1 input-lg" id="bit_gateway_receive" name="bit_gateway_receive"  onchange="bit_refresh('2');">
    													<?php
    											$gateways = $db->query("SELECT * FROM bit_gateways WHERE allow_receive='1' and status='1' ORDER BY id");
    											if($gateways->num_rows>0) {
    												while($g = $gateways->fetch_assoc()) {
    													if($g['default_receive'] == "1") { $sel = 'selected'; } else { $sel = ''; }
    													echo '<option value="'.$g[id].'" '.$sel.'>'.$g[name].' '.$g[currency].'</option>';
    												}
    											} else {
    												echo '<option>'.$lang[no_have_gateways].'</option>';
    											}
    											?>
    												</select>
    											</div>
    											<div class="form-group">
    												<input type="text" class="form-control form_style_1 input-lg" id="bit_amount_receive" name="bit_amount_receive" disabled value="0">
    											</div>
    											<div class="text exchange_rate_text" style="padding-bottom:10px;font-weight:bold;"><?php echo $lang['reserve']; ?>: <span id="bit_reserve">-</span></div>
    										</div>
    										<div class="col-md-3 hidden-xs hidden-sm">
    											<div style="margin-top:50px;">
    												<img src="assets/icons/Skrill.png" id="bit_image_receive" width="72px" height="72px" class="img-circle img-bordered">
    											</div>
    										</div>
    									</div>
    								</div>
								<div class="col-md-12">
									<input type="hidden" name="bit_amount_receive" id="bit_amount_receive2">
									<input type="hidden" name="bit_rate_from" id="bit_rate_from">
									<input type="hidden" name="bit_rate_to" id="bit_rate_to">
									<input type="hidden" name="bit_currency_from" id="bit_currency_from">
									<input type="hidden" name="bit_currency_to" id="bit_currency_to">
									<input type="hidden" id="bit_login_to_exchange" name="bit_login_to_exchange" value="<?php echo $settings['login_to_exchange']; ?>">
									<input type="hidden" id="bit_ses_uid" name="bit_ses_uid" value="<?php if(checkSession()) { echo $_SESSION['bit_uid']; } else { echo '0'; } ?>">
									
										<?php if(checkSession()) { ?>
										<center>
										<button type="button" class="btn btn-primary btn-lg"  onclick="bit_exchange_step_1();">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-refresh"></i> <?php echo $lang['btn_exchange']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
									</center>
									
									<?php } else { ?>
										<center>
										
										<li class="btn btn-primary btn-lg"><a href="<?php echo $settings['url']; ?>login">Exchange</a></li>
									</center>
									<?php } ?>
										
								
								</div>
							</form>			
						</div>

					 </div>
				 </div>
			</div><!-- category-ad -->
	
	
	<!-- main -->
	<section id="main" class="clearfix home-default">
	    						
					
		<div class="container">
			
			<!-- main-content -->
			<div class="main-content">
				<!-- row -->
				<div class="row">
					<!-- Start Main Body -->
					<div class="col-md-9">
	
						
						<!-- Exchange Rate -->	
						<div class="section trending-ads exchange_rate">
						    <div class="row">
								<div class="col-sm-12">
									<div class="section-title tab-menu">
										<h4><?php echo $lang['sales_info']; ?></h4>
									</div>
									<div class="">
									    
                                	<table bordercolor="#3b6a9e" border="1" class="table">
										<thead style="color:#3b6a9e;">
											<tr>
											<th>We Accept</th>
												<th style="text-align: center;">We Buy</th>
												<th style="text-align: center;">We Sell</th>
											</tr>
										</thead>
										<tbody>
							                <tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585589515_icon.png" width="20px" height="20px">  Skrill </td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>92 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>105 BDT</strong></td>
											</tr>
																
						                	<tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585991552_icon.png" width="20px" height="20px">  Neteller</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>92 BDT</strong></td>
											    <td style="color:green; text-align: center;font-size: 12px;"><strong>105 BDT</strong></td>
											</tr>
				
						                   	<tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585993844_icon.png" width="20px" height="20px">  AdvCash</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>85 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>95 BDT</strong></td>
                                         	</tr>
																		
							                <tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585993244_icon.png" width="20px" height="20px">  Perfect Money</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>83 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>94 BDT</strong></td>
											</tr>
								
										
							                <tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585992091_icon.jpg" width="20px" height="20px">  Payeer</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>83 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>96 BDT</strong></td>
											</tr>
										
							                <tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585994240_icon.png" width="20px" height="20px">  BTC, LTC, ETH</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>85 BDT </strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>95 BDT </strong></td>
											</tr>
									
											<tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/1585993989_icon.png" width="20px" height="20px">  WebMoney</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>85 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>95 BDT</strong></td>
											</tr>
											<tr>
												<td style="color:black; font-size: 12px;"><img src="https://exchangerbd.com/uploads/CNG.png" width="20px" height="20px">  Coinsbit CNB/CNG</td>
												<td style="color:red; text-align: center;font-size: 12px;"><strong>80 BDT</strong></td>
												<td style="color:green; text-align: center;font-size: 12px;"><strong>88 BDT</strong></td>
											</tr>
										</tbody>
									</table>
									</div>
								</div>
							</div>
						</div><!-- Exchange Rate -->	
						
						
						<!-- Pending Exchanges -->
						<div class="section trending-ads">
							<div class="section-title tab-manu">
								<h4><?php echo $lang['pending_exchanges']; ?></h4>
							</div>
							
							<div class="row">
								<div class="col-md-12 table-responsive">
									<table bordercolor="#3b6a9e" border="1" class="table">
										<thead style="color:#3b6a9e;">
											<tr>
											     <th>Date</th>
											    <th>Name</th>
												<th>Send</th>
												<th>Recived</th>
												<th><?php echo $lang['amount']; ?></th>
												<th><?php echo $lang['status']; ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = $db->query("SELECT * FROM bit_exchanges ORDER BY id DESC LIMIT 10"); 
											if($query->num_rows>0) {
												while($row = $query->fetch_assoc()) {
													?>
													
													<?php if($row['status'] == "3") { ?>
													<tr>
													      <td><?php echo $row['exchange_date']; ?></td>
													    <td><?php echo $row['u_field_2']; ?></td>
														<td><img src="<?php echo gatewayicon(gatewayinfo($row['gateway_send'],"name")); ?>" width="20px" height="20"> <?php echo gatewayinfo($row['gateway_send'],"name"); ?> <?php echo gatewayinfo($row['gateway_send'],"currency"); ?></td>
														<td><img src="<?php echo gatewayicon(gatewayinfo($row['gateway_receive'],"name")); ?>" width="20px" height="20"> <?php echo gatewayinfo($row['gateway_receive'],"name"); ?> <?php echo gatewayinfo($row['gateway_receive'],"currency"); ?></td>
														<td><?php echo $row['amount_send']; ?> <?php echo gatewayinfo($row['gateway_send'],"currency"); ?></td>
														<td>
											                <span class="label label-info"><i class="fa fa-clock-o"></i> <?php echo $lang[status_3]?></span>
										                </td>
													</tr> <?php }?>
													<?php
												}
											} else {
												echo '<tr><td colspan="5">'.$lang[still_no_exchanges].'</td></tr>';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div><!--Pending Exchanges -->	
						
						<!-- Completed Exchanges -->
						<div class="section trending-ads">
							<div class="section-title tab-manu">
								<h4><?php echo $lang['completed_exchanges']; ?></h4>
							</div>
							
							<div class="row">
								<div class="col-md-12 table-responsive">
									<table bordercolor="#3b6a9e" border="1" class="table">
										<thead style="color:#3b6a9e;">
											<tr>
											      <th>Date</th>
											    <th>Name</th>
												<th>Send</th>
												<th>Recived</th>
												<th><?php echo $lang['amount']; ?></th>
												<th><?php echo $lang['status']; ?></th>
											</tr>
										</thead>
										<tbody>
											<?php
											$query = $db->query("SELECT * FROM bit_exchanges ORDER BY id DESC LIMIT 10"); 
											if($query->num_rows>0) {
												while($row = $query->fetch_assoc()) {
													?>
													
													<?php if($row['status'] == "4") { ?>
													<tr>
													     <td><?php echo $row['exchange_date']; ?></td>
													    <td><?php echo $row['u_field_2']; ?></td>
														<td><img src="<?php echo gatewayicon(gatewayinfo($row['gateway_send'],"name")); ?>" width="20px" height="20"> <?php echo gatewayinfo($row['gateway_send'],"name"); ?> <?php echo gatewayinfo($row['gateway_send'],"currency"); ?></td>
														<td><img src="<?php echo gatewayicon(gatewayinfo($row['gateway_receive'],"name")); ?>" width="20px" height="20"> <?php echo gatewayinfo($row['gateway_receive'],"name"); ?> <?php echo gatewayinfo($row['gateway_receive'],"currency"); ?></td>
														<td><?php echo $row['amount_send']; ?> <?php echo gatewayinfo($row['gateway_send'],"currency"); ?></td>
														<td>
											                <span class="label label-success"><i class="fa fa-clock-o"></i> <?php echo $lang[status_4]?></span>
										                </td>
													</tr> <?php }?>
													<?php
												}
											} else {
												echo '<tr><td colspan="5">'.$lang[still_no_exchanges].'</td></tr>';
											}
											?>
										</tbody>
									</table>
								</div>
							</div>
						</div><!--Completed Exchanges -->
						
						
						
						<!-- Testimonisals Section -->
						<div class="section featureds">
							<div class="row">
								<div class="col-sm-12">
									<div class="section-title featured-top">
										<h4><?php echo $lang['awesome_testimonials']; ?></h4>
									</div>
								</div>
							</div>
							
							<!-- Testimonisals -->
							<div class="featured-slider">
								<div id="featured-slider" >
								<?php
							$query = $db->query("SELECT * FROM bit_testimonials WHERE status='1' ORDER BY RAND() LIMIT 5");
							if($query->num_rows>0) {
								while($row = $query->fetch_assoc()) {
								?>
									<!-- featured -->
									<div class="featured">
										<!-- ad-info -->
										<div class="ad-info">
											<?php if($row['type'] == "1") { ?>
											<h3 class="item-price"><span class="label label-success" style="color:#fff;"><i class="fa fa-smile-o"></i> <?php echo $lang['positive']; ?></span></h3>
											<?php } elseif($row['type'] == "2") { ?>
											<h3 class="item-price"><span class="label label-warning" style="color:#fff;"><i class="fa fa-meh-o"></i> <?php echo $lang['neutral']; ?></span></h3>
											
											<?php } elseif($row['type'] == "3") { ?>
											<h3 class="item-price"><span class="label label-danger" style="color:#fff;"><i class="fa fa-frown-o"></i> <?php echo $lang['negative']; ?></span></h3>
											
											<?php } else { ?>
											<h3 class="item-price"><span class="label label-default" style="color:#fff;"><i class="fa fa-meh-o"></i> Unknown</span></h3>
											
											<?php } ?>
											<h4 class="item-title"><?php echo $row['content']; ?></h4>
											<div class="item-cat">
												<span><?php echo idinfo($row['uid'],"username"); ?></span> 
											</div>
										</div><!-- ad-info -->
									</div><!-- featured -->
									<?php
									}
							} else {
								echo $lang['no_have_testimonials'];
							}
							?>
								</div><!-- featured-slider -->
							</div><!-- #featured-slider -->
						</div><!-- Testimonisals Section -->
	
					</div><!-- End Main Body -->

					
					
					<!-- Sidebar -->
					<div class="col-md-3">
						<div class="section">
							<div class="section-title tab-manu">
								<h4><?php echo $lang['track_exchange']; ?></h4>
							</div>
							<br/>
							<form action="<?php echo $settings['url']; ?>track" method="POST">
								<div class="form-group">
									<input type="text" class="form-control" name="order_id" placeholder="<?php echo $lang['type_here_exchange_id']; ?>">
								</div>
								<button type="submit" class="btn btn-primary btn-block" name="bit_track"><?php echo $lang['btn_track']; ?></button>
							</form>
						</div>
						
						<div class="section">
							<div class="section-title tab-manu">
								<h4><?php echo $lang['our_reserve']; ?></h4>
							</div>
							<br/>
								<div class="row">
								<?php
								$query2 = $db->query("SELECT * FROM bit_gateways ORDER BY id");
								if($query2->num_rows>0) {
									while($row = $query2->fetch_assoc()) {
									?>
									<div class="col-md-12" style="margin-bottom:10px;">
										<img src="<?php echo gatewayicon($row['name']); ?>" width="42px" height="42px" class="img-circle img-bordered pull-left">
										<span class="pull-left" style="margin-left:5px;">
											<span style="font-size:15px;font-weight:bold;"><?php echo $row['name']." ".$row['currency']; ?></span><br/>
											<span class="text text-muted"><?php echo $row['reserve']." ".$row['currency']; ?> </span>
										</span>
									</div>
									<br><br>
									<?php
									}
								} else {
									?>
									<div class="col-md-12">
										<?php echo $lang['no_have_gateways']; ?>
									</div>
									<?php
								}
								?>
								
								</div>

						</div>
						
						<!--Sidebar Ads-->
						<div class="section">
							<img src="https://www.inewsguyana.com/wp-content/uploads/2016/11/300x600-Half-Page-Display-Ad-Placeholder.jpg"/>
						</div><!--Sidebar Ads-->

						
						
					</div><!-- End Sidebar -->
				</div><!-- row -->
			</div><!-- main-content -->
		</div><!-- container -->
	</section><!-- main -->
