<div class="app-main__outer">

<div class="app-main__inner">

    <div class="app-page-title">

        <div class="page-title-wrapper">

            <div class="page-title-heading">

                <div class="page-title-icon">

                    <i class="pe-7s-mail-open-file icon-gradient bg-mean-fruit">

                    </i>

                </div>

                <div>Inspection Requests</div>

            </div>

        </div>

    </div>            

    

    <div class="row">

        <div class="col-md-12">

            <div class="main-card mb-3 card">

                <div class="card-header">
                    <form action="<?php echo base_url('admin/search-inspection'); ?>" method="POST">
                        <div class="search-wrapper active">
                            <div class="input-holder">
                                <input name="search-input" type="text" class="search-input" placeholder="Type to search">
                                <button class="search-icon"><span></span></button>
                            </div>
                            <!---<button class="close"></button>--->
                        </div>
                    </form>

                    <div class="btn-actions-pane-right">

                        <!--<ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">

                            <li class="nav-item">

                                <a role="tab" class="nav-link active" data-toggle="modal" data-target="#exampleModalLong">

                                    <span>Add Amenity <i style="font-size:14px;marginleft:5px;" class="fa fa-plus"></i></span>

                                </a>

                            </li> 	

                        </ul>-->

                    </div>

                </div>

                <div class="table-responsive">

                    <table class="align-middle mb-0 table table-borderless table-striped table-hover">

                        <thead>

                        <tr>
                            <th class="text-left">&nbsp;</th>

                            <th class="text-left">Referral</th>

                            <th class="text-left">Leads</th>
<!-- 
                            <th class="text-left">Inspection Date</th>

                            <th class="text-left">Status</th>

                            <th class="text-left">Entry Date</th>

                            <th class="text-left">Actions</th> -->

                        </tr>

                        </thead>

                        <tbody>rs

                        <?php

                            if (isset($rssDistLeads) && !empty($rssDistLeads)) {

                                foreach($rssDistLeads as $rssDistLeads => $value) {

                                $rssLeads = $this->admin_model->fetchrssLeads($value['referral']);

                                foreach($rssLeads as $rssLead => $value)
                                {

                        ?>	

                        <tr>
                            <td class="text-left">
                                <input type="checkbox" class="action-item" id="<?php echo $value['userID'] ?>" />
                            </td>

                            <td class="text-left">

                                <?php 
                                    echo $value['referral'];
                                ?>

                            </td>

                            <td class="text-left">

                                <?php 
                                    echo $value['total'];
                                ?>

                            </td>

                        </tr>

                        <?php 

                                }

                            }

                        }
                    
                        ?>
  
                        </tbody>

                    </table>

                </div>

                <div class="d-block text-center card-footer">

                    <div class="paginated"><?php echo $this->pagination->create_links(); ?></div>

                </div>

            </div>

        </div>

    </div>

</div>