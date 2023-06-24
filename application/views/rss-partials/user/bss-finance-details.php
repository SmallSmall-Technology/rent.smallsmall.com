                <div class="bss-button-container">
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a href="<?php echo base_url().''.$user_type.'/bss-unit/'.$unit['propertyID']; ?>">Property Portfolio</a></div>
                    </div>
                    <?php if($unit['plan'] == 'finance'){ ?>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a class="active" href="<?php echo base_url().''.$user_type.'/finance-details/'.$unit['propertyID']; ?>">Financing</a></div>
                    </div>
                    <?php } ?>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a href="<?php echo base_url().''.$user_type.'/payment-details/'.$unit['propertyID']; ?>">Payments</a></div>
                    </div>
                </div>
                

                <div class="finance-details-container">
                    <div class="financing-snippets finance-snippet">
                        <div class="dash-bt-header">Financing information</div>
                        <table width="100%">
                            <tr>
                                <td width="30%">
                                    <span class="small-txt">Approved</span>
                                    <span class="large-txt">N<?php echo number_format($unit['finance_balance']); ?></span>
                                </td>
                                <td width="30%">
                                    <span class="small-txt">Originating fee</span>
                                    <span class="large-txt">N<?php echo number_format($unit['price'] * 0.04); ?></span>
                                </td>
                                <td width="30%">
                                    <span class="small-txt">Balance</span>
                                    <span class="large-txt">N<?php echo number_format($unit['finance_balance']); ?></span>
                                </td>
                                <td width="10%">
                                    <!---<div class="bss-finance-btn"><a href="#">Pay now</a></div>--->
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td>
                                    <a class="review-contract" href="#">Review & Sign contract</a>
                                </td>
                                <td>
                                    <div class="bss-finance-btn tenant schedule-btn"><a href="#">Payment schedule</a></div>
                                </td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>
                    </div>
                    <div class="financing-snippets property-snippet">
                        <div class="dash-bt-header">Property information</div>
                        <span class="finance-prop-title"><?php echo $unit['property_name']; ?></span>
                        <span class="finance-prop-location"><?php echo $unit['city']; ?></span>
                        <span class="finance-prop-location"><?php echo $unit['name']; ?></span>
                        <span class="finance-prop-cost">N<?php echo number_format($unit['price']); ?></span>
                    </div>
                </div>
                <div class="payment-schedule-pane tenant">
                    
                    <div class="dash-bt-header">Property Payment Schedule</div>
                    <div class="schedule-top">
                        <table class="payment-schedule-tbl">
                            <tr>
                                <!---<td width="30%">
                                    <span class="small-txt">Approved</span>
                                    <span class="large-txt">N<?php //echo number_format($unit['finance_balance']); ?></span>
                                </td>--->
                                <td>
                                    <span class="small-txt">Property value</span>
                                    <span class="large-txt">N<?php echo number_format($unit['price']); ?></span>
                                </td>
                                <td>
                                    <span class="small-txt">Equity</span>
                                    <span class="large-txt">N<?php echo number_format($unit['payable']); ?></span>
                                </td>
                                <td>
                                    <span class="small-txt">Principal</span>
                                    <span class="large-txt">N<?php echo number_format($unit['finance_balance']); ?></span>
                                </td>
                                <td width="30%">
                                    <span class="small-txt">Transaction fee (4%)</span>
                                    <span class="large-txt">N<?php echo number_format($unit['price'] * 0.04); ?></span>
                                </td>
                                <td>
                                    <span class="small-txt">Interest</span>
                                    <span class="large-txt">0.0%</span>
                                </td>
                                <td>
                                    <span class="small-txt">Tenor (Years)</span>
                                    <span class="large-txt"><?php echo $unit['payment_period'].' ('.($unit['payment_period'] * 12).' Mths)'; ?></span>
                                </td>
                                <td>
                                    <span class="small-txt">Initial payment</span>
                                    <span class="large-txt">N<?php echo number_format($unit['payable'] + ($unit['price'] * 0.04)); ?></span>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                    <div class="schedule-container">
                        <?php
                            $year_one = 0;
                            $year_one_months = 0;
                            $year_two = 0;
                            $year_two_months = 0;
                            $year_three = 0;
                            $year_three_months = 0;
                            $year_four = 0;
                            $year_four_months = 0;
                            $year_five = 0;
                            $year_five_months = 0;
                            $year_six = 0;
                            $year_six_months = 0;
                            
                            if($unit['payment_period'] == 1){
                                
                                $year_one = $unit['finance_balance'];
                                
                                $year_one_months = $year_one / 12;
                                
                            }else if($unit['payment_period'] == 2){
                                
                                $year_one = $unit['finance_balance'] * 0.6;
                                
                                $year_one_months = $year_one / 12;
                                
                                $year_two = $unit['finance_balance'] * 0.4;
                                
                                $year_two_months = $year_two / 12;
                                
                            }else if($unit['payment_period'] == 3){
                                
                                $year_one = $unit['finance_balance'] * 0.45;
                                
                                $year_one_months = $year_one / 12;
                                
                                $year_two = $unit['finance_balance'] * 0.35;
                                
                                $year_two_months = $year_two/ 12;
                                
                                $year_three = $unit['finance_balance'] * 0.2;
                                
                                $year_three_months = $year_three / 12;
                                
                            }else if($unit['payment_period'] == 4){
                                
                                $year_one = $unit['finance_balance'] * 0.4;
                                
                                $year_one_months = $year_one / 12;
                                
                                $year_two = $unit['finance_balance'] * 0.3;
                                
                                $year_two_months = $year_two / 12;
                                
                                $year_three = $unit['finance_balance'] * 0.2;
                                
                                $year_three_months = $year_three / 12;
                                
                                $year_four = $unit['finance_balance'] * 0.1;
                                
                                $year_four_months = $year_four / 12;
                                
                            }else if($unit['payment_period'] == 5){
                                
                                $year_one = $unit['finance_balance'] * 0.4;
                                
                                $year_one_months = $year_one / 12;
                                
                                $year_two = $unit['finance_balance'] * 0.25;
                                
                                $year_two_months = $year_two / 12;
                                
                                $year_three = $unit['finance_balance'] * 0.2;
                                
                                $year_three_months = $year_three / 12;
                                
                                $year_four = $unit['finance_balance'] * 0.1;
                                
                                $year_four_months = $year_four / 12;
                                
                                $year_five = $unit['finance_balance'] * 0.05;
                                
                                $year_five_months = $year_five / 12;
                                
                            }else if($unit['payment_period'] == 6){
                                
                                $year_one = $unit['finance_balance'] * 0.35;
                                
                                $year_one_months = $year_one / 12;
                                
                                $year_two = $unit['finance_balance'] * 0.25;
                                
                                $year_two_months = $year_two / 12;
                                
                                $year_three = $unit['finance_balance'] * 0.20;
                                
                                $year_three_months = $year_three / 12;
                                
                                $year_four = $unit['finance_balance'] * 0.1;
                                
                                $year_four_months = $year_four / 12;
                                
                                $year_five = $unit['finance_balance'] * 0.05;
                                
                                $year_five_months = $year_five / 12;
                                
                                $year_six = $unit['finance_balance'] * 0.05;
                                
                                $year_six_months = $year_six / 12;
                                
                            }
                        ?>
                        <table class="schedule-planner">
                            <tr>
                                <th></th>
                                <?php if($year_one > 0){ ?>
                                        <th>Year 1</th>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                        <th>Year 2</th>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                        <th>Year 3</th>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                        <th>Year 4</th>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                        <th>Year 5</th>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                        <th>Year 6</th>
                                <?php } ?>
                            </tr>
                            <tr>
                                
                                <th>Month 1</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th>Month 2</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr>
                            <tr>
                                <th>Month 3</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 4</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 5</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 6</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center" style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 7</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center" style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 8</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center" style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 9</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center" style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 10</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 11</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr><tr>
                                <th>Month 12</th>
                                <?php if($year_one > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_one_months); ?></td>
                                <?php } ?>
                                <?php if($year_two > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_two_months); ?></td>
                                <?php } ?>
                                <?php if($year_three > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_three_months); ?></td>
                                <?php } ?>
                                <?php if($year_four > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_four_months); ?></td>
                                <?php } ?>
                                <?php if($year_five > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_five_months); ?></td>
                                <?php } ?>
                                <?php if($year_six > 0){ ?>
                                    <td style="text-align:center">N<?php echo number_format($year_six_months); ?></td>
                                <?php } ?>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
            <!---- Main pane ends here ---->
