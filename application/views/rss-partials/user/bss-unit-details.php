                <div class="bss-button-container">
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a class="active" href="<?php echo base_url().''.$user_type.'/bss-unit/'.$unit['propertyID']; ?>">Property Portfolio</a></div>
                    </div>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a href="<?php echo base_url().''.$user_type.'/finance-details/'.$unit['propertyID']; ?>">Financing</a></div>
                    </div>
                    <div class="bss-mini-btn-container">
                        <div class="bss-top-btn tenant"><a href="<?php echo base_url().''.$user_type.'/payment-details/'.$unit['propertyID']; ?>">Payments</a></div>
                    </div>
                </div>
                <!----Transaction table ends here ---->
                    
                <div class="unit-details-container">
                    
                    <ul class="unit-details-bucket"> 
                        <li class="unit-details-item">
                            <span class="small-txt">Payment plan</span>
                            <span class="large-txt">
                                <?php 
                                    if($unit['plan'] == 'co-own')
                                        echo 'Co Own';
                                    elseif($unit['plan'] == 'financing')
                                        echo 'BuySmallSmall Financing';
                                    elseif($unit['plan'] == 'financing')
                                        echo 'BuySmallSmall Financing';
                                    else
                                        echo 'BuySmallSmall';
                                    //echo ucfirst($unit['plan']); 
                                ?>
                            </span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Current market price</span>
                            <span class="large-txt"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($unit['marketValue']); ?></span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Status</span>
                            <span class="large-txt"><?php echo ($unit['construction_lvl'])? $unit['construction_lvl'] : 'N/A'; ?></span>
                        </li>
                    </ul>
                    
                    
                    <ul class="unit-details-bucket"> 
                        
                        <li class="unit-details-item">
                            <span class="small-txt">Current market price</span>
                            <span class="large-txt"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($unit['marketValue']); ?></span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Status</span>
                            <span class="large-txt"><?php echo ($unit['construction_lvl'])? $unit['construction_lvl'] : 'N/A'; ?></span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Number of shares owned</span>
                            <span class="large-txt">
                                <?php 
                                    echo $unit['unit_amount']; 
                                ?>
                            </span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Shares certificate</span>
                            <span class="large-txt"><i class="fa fa-pdf"></i></span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Hold Period</span>
                            <span class="large-txt">3 Years</span>
                        </li>
                        <li class="unit-details-item">
                            <span class="small-txt">Maturity period</span>
                            <span class="large-txt">3 Years</span>
                        </li>
                    </ul>
                    
                    <ul class="appreciation-dets-container"> 
                        <li class="appreciation-dets-item">
                            <span class="small-txt" style="color:#138E3D">Rent appreciation</span>
                            <table width="100%">
                                <tr>
                                    <td class="td-dets">
                                        <span class="td-small">Year 0</span>
                                        <span class="td-large">0</span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 1</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format(@$unit['expected_rent']/1000000)."M"; ?></span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 5</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format((@$unit['expected_rent'] + ((@$unit['expected_rent'] * 0.18) * 5))/1000000)."M"; ?></span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 10</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format((@$unit['expected_rent'] + ((@$unit['expected_rent'] * 0.18) * 10))/1000000)."M"; ?></span>
                                    </td>
                                </tr>
                            </table>
                        </li>
                        <li class="appreciation-dets-item">
                            <span class="small-txt" style="color:#138E3D">Asset appreciation</span>
                            <table width="100%">
                                <tr>
                                    <td class="td-dets">
                                        <span class="td-small">Year 0</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php $asset_0 = (@$unit['marketValue']); echo number_format(@$asset_0/1000000)."M"; ?></span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 1</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php $asset_1 = (((@$unit['asset_appreciation_1'] / 100) * $asset_0) + @$unit['marketValue']); echo number_format($asset_1/1000000)."M"; ?></span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 5</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php $asset_2 = (((80 / 100) * $asset_1) + @$unit['marketValue']); echo number_format($asset_2/1000000)."M"; ?></span>
                                    </td>
                                    <td class="td-dets">
                                        <span class="td-small">Year 10</span>
                                        <span class="td-large"><span style="font-family:helvetica;">&#x20A6;</span><?php $asset_3 = (((100 / 100) * $asset_2) + @$unit['marketValue']); echo number_format($asset_3/1000000)."M"; ?></span>
                                    </td>
                                </tr>
                            </table>
                        </li>
                    </ul>
                </div>

            </div>
            <!---- Main pane ends here ---->
