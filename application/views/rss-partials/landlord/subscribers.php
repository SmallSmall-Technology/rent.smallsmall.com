                    <div class="page-det-container">
                        <div class="page-icn my-subscriber-icn"></div>
                        <div class="page-name">My Subscribers (<?php echo $total_count; ?>)</div>
                    </div>
                    <div class="my-prop-container">
                        <div class="filter-container">
                            <table width="100%">
                                <tr>
                                    <td class="filter-td">
                                        <select class="pyment-plan" id="customSelect">
                                            <option value="">Select property</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Quarterly">Quarterly</option>
                                            <option value="Bi-annually">Bi-annually</option>
                                            <option value="Annually">Annually</option>
                                        </select>
                                    </td>
                                    <td class="filter-td-btn">
                                        <div class="filter-btns lemon-bg">Filter</div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php if(isset($rented_props) && !empty($rented_props)){ ?>
						    <?php foreach($rented_props as $rented_prop => $value){ ?>
						    <?php
						    
                              $birthdate = date("d-m-Y", strtotime($value['dob']));
                              
                              $birthDate = explode("-", $birthdate);
                              
                              //get age from date or birthdate
                              $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
                                ? ((date("Y") - $birthDate[2]) - 1)
                                : (date("Y") - $birthDate[2]));
                              
						    ?>
                                <div class="my-prop-item">
                                    <div class="subscriber-name"><?php if(@$value['userID']){ echo $value['firstName'].' '.$value['lastName']; }else{ echo "No tenant"; } ?></div>
                                    <table cellpadding="10" width="100%">
                                        <tr>
                                            <td width="66.6%" valign="top">
                                                <div class="prop-table-title">Property name</div>
                                                <div class="my-prop-name"><?php echo $value['propertyTitle']; ?></div>
                                            </td>
                                            <td valign="top">
                                                <div class="prop-table-title">Occupation</div>
                                                <div class="prop-table-note"><?php echo $value['occupation']; ?></div>
                                            </td>
                                        </tr>
                                    </table>
                                    <table cellpadding="10" width="100%">
                                        <tr>
                                            <td width="40%">
                                                <div class="prop-table-title">Tenant rating</div>
                                                <div class="prop-table-note">8.5</div>
                                            </td>
                                            <td width="30%" valign="top">
                                                <div class="prop-table-title">Gender</div>
                                                <div class="prop-table-note"><?php echo ucfirst($value['gender']); ?></div>
                                            </td>
                                            <td width="30%" valign="top">
                                                <div class="prop-table-title">Plan</div>
                                                <div class="prop-table-note"><?php echo ucfirst($value['paymentPlan']); ?></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="40%">
                                                <div class="prop-table-title">Marital status</div>
                                                <div class="prop-table-note"><?php echo ucfirst($value['marital_status']); ?></div>
                                            </td>
                                            <td width="30%" valign="top"></td>
                                            <td width="30%" valign="top"></td>
                                        </tr>
                                    </table>
                                </div>
                            <?php } ?>
                        <?php } ?>
                        <div class="ll-pagination">
            				<?php echo $this->pagination->create_links(); ?>
            			</div>
                    </div>
                </div>