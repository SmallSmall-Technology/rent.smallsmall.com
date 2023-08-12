<div class="app-main__outer">
    <?php

    $CI = &get_instance();

    //$prop_dets = $CI->get_ver_prop($details['propertyID']); 
    ?>

    <div class="app-main__inner">

        <div class="app-page-title">

            <div class="page-title-wrapper">

                <div class="page-title-heading">

                    <div class="page-title-icon">

                        <i class="pe-7s-user text-success">

                        </i>

                    </div>

                    <div>

                        User Profile

                    </div>

                </div>
                <div class="page-title-actions">

                    <?php if ($details['verified'] == 'received') { ?>
                        <button type="button" id="<?php echo $details['user_id']; ?>" class="start-processing btn-shadow mr-3 btn btn-info">Start processing </button>
                    <?php } ?>

                    <?php if ($details['verified'] != 'yes') { ?>
                        <button type="button" id="<?php echo $details['user_id']; ?>" class="verify-user btn-shadow mr-3 btn btn-info">
                            Approve <i class="fa fa-star"></i>
                        </button>
                    <?php } else { ?>
                        <button type="button" id="<?php echo $details['user_id']; ?>" class="unverify-user btn-shadow mr-3 btn btn-danger">
                            Unapprove <i class="fa fa-star"></i>
                        </button>
                    <?php } ?>
                    <?php if ($details['verified'] != 'failed') { ?>
                        <button type="button" id="<?php echo $details['user_id']; ?>" class="unverify-user btn-shadow mr-3 btn btn-danger">
                            Refuse <i class="fa fa-trash"></i>
                        </button>
                    <?php } ?>
                    <div class="d-inline-block dropdown">
                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
                            <span class="btn-icon-wrapper pr-2 opacity-7">
                                <i class="fa fa-download fa-w-20"></i>
                            </span>
                            Documents
                        </button>
                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                            <ul class="nav flex-column">

                                <li class="nav-item">
                                    <a target="_blank" href="<?php echo base_url() . "uploads/verification/" . $details['valid_id_file_path']; ?>" class="nav-link" rel=”nofollow”>
                                        <i class="nav-link-icon lnr-book"></i>
                                        <span>
                                            Valid Identification
                                        </span>
                                        <div class="ml-auto badge badge-pill badge-danger"><i class="fa fa-download"></i></div>
                                    </a>
                                </li>


                                <li class="nav-item">
                                    <?php

                                    require 'vendor/autoload.php';

                                    // Create an S3 client
                                    $s3 = new Aws\S3\S3Client([
                                        'version' => 'latest',
                                        'region'  => 'eu-west-1'
                                    ]);

                                    $bucket = 'dev-rss-uploads'; // Your bucket name

                                    $folder = 'uploads/verification/' . $details['user_id'] . '/'; // Specify the folder path in S3

                                    try {

                                        // List objects in the specified S3 folder

                                        $objects = $s3->listObjects([

                                            'Bucket' => $bucket,

                                            'Prefix' => $folder,

                                        ]);

                                         // Initialize the count
                                            $count = 1;

                                        // Loop through the list of objects

                                        foreach ($objects['Contents'] as $object) {

                                            $objectKey = $object['Key'];

                                            $objectUrl = $s3->getObjectUrl($bucket, $objectKey);

                                            // $objectUrl = 'https://' . $bucket . '.s3.eu-west-1.amazonaws.com/' . $objectKey; // This works for downloading the document

                                            // Extract file name from object key
                                            $fileName = basename($objectKey);

                                            // Display the link for each object
                                            echo '<a target="_blank" href="' . $objectUrl . '" class="nav-link" rel="nofollow">';
                                            echo '<i class="nav-link-icon lnr-inbox"></i>';
                                            echo '<span>';
                                            echo 'Bank Statement (' . ($count - 3) . ')';
                                            echo '</span>';
                                            echo '<div class="ml-auto badge badge-pill badge-secondary"><i class="fa fa-download"></i></div>';
                                            echo '</a>';

                                            // Increment the count
                                            $count++;
                                        }


                                    } catch (Aws\S3\Exception\S3Exception $e) {
                                        // Handle S3 error
                                        echo 'S3 Error: ' . $e->getMessage() . PHP_EOL;
                                    }
                                    ?>
                                </li>

                                <!--<li class="nav-item">
                                    <a href="javascript:void(0);" class="nav-link">
                                        <i class="nav-link-icon lnr-picture"></i>
                                        <span>
                                            Picture
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a disabled href="javascript:void(0);" class="nav-link disabled">
                                        <i class="nav-link-icon lnr-file-empty"></i>
                                        <span>
                                            File Disabled
                                        </span>
                                    </a>
                                </li>-->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Basic Profile</h5>
                        <table class="mb-0 table">
                            <!--<thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                            </thead>-->
                            <tbody>
                                <tr>
                                    <th width="200px" scope="row">First Name</th>
                                    <td><?php echo $details['firstName']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Last Name</th>
                                    <td><?php echo $details['lastName']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Marital Status</th>
                                    <td><?php echo $details['marital_status']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Income</th>
                                    <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details['gross_annual_income']); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Date Of Birth</th>
                                    <td><?php echo date("Y M d", strtotime($details['dob'])); ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Disability?</th>
                                    <td><?php echo $details['disability']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pets?</th>
                                    <td><?php echo $details['pets']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Employment Profile</h5>
                        <table class="mb-0 table">

                            <tbody>
                                <tr>
                                    <th width="200px" scope="row">Employment Status</th>
                                    <td><?php echo $details['employment_status']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Occupation</th>
                                    <td><?php echo $details['occupation']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Company Name</th>
                                    <td><?php echo $details['company_name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Company Address</th>
                                    <td><?php echo $details['company_address']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">HR Name</th>
                                    <td><?php echo $details['hr_manager_name']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">HR Email</th>
                                    <td><?php echo $details['hr_manager_email']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Office Phone</th>
                                    <td><?php echo $details['office_phone']; ?></td>
                                </tr>
                                <?php if ($details['linkedin_url']) { ?>
                                    <tr>
                                        <th scope="row">Linkedin</th>
                                        <td><a target="_blank" href="<?php echo $details['linkedin_url']; ?>">Linkedin Profile</a></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Renting Profile</h5>
                        <table class="mb-0 table table-bordered">
                            <!--<thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Username</th>
                                            </tr>
                                            </thead>-->
                            <tbody>
                                <tr>
                                    <th width="200px" scope="row">Renting Status</th>
                                    <td><?php echo $details['current_renting_status']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Present Landlord</th>
                                    <td><?php echo $details['present_landlord']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Landlord Email</th>
                                    <td><?php echo $details['landlord_email']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Landlord Phone</th>
                                    <td><?php echo $details['landlord_phone']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Landlord Address</th>
                                    <td><?php echo $details['landlord_address']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Reason For Leaving</th>
                                    <td><?php echo $details['reason_for_living']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Guarantor Details</h5>
                        <table class="mb-0 table">
                            <tbody>
                                <tr>
                                    <th width="200px" scope="row">Guarantor Name</th>
                                    <td><?php echo $details['guarantor_name']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Guarantor Email</th>
                                    <td><?php echo $details['guarantor_email']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Guarantor Phone</th>
                                    <td><?php echo $details['guarantor_phone']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Guarantor Occupation</th>
                                    <td><?php echo $details['guarantor_occupation']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Guarantor Address</th>
                                    <td><?php echo $details['guarantor_address']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
        <?php if ($details['propID']) { ?>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Property Description</h5>
                        <table class="mb-0 table">
                            <tbody>
                                <tr>
                                    <th width="200px" scope="row">Property Name</th>
                                    <td><?php echo '<a target="_blank" href="' . base_url() . 'property/' . $details['propID'] . '">' . $details['propertyTitle'] . '</a>'; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Property Type </th>
                                    <td><?php echo $details['type']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Property Location</th>
                                    <td><?php echo $details['city'] . ", " . $details['name']; ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Property Rent </th>
                                    <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details['price']); ?></td>
                                </tr>
                                <tr>
                                    <th width="200px" scope="row">Security Deposit</th>
                                    <td><span style="font-family:helvetica;">&#x20A6;</span> <?php echo number_format($details['securityDeposit']); ?></td>
                                </tr>
                            </tbody>
                            <input type="hidden" id="propID" value="<?php echo $details['propID']; ?>" />
                        </table>
                    </div>
                </div>
            </div>
        <?php } else { ?>
            <div class="col-lg-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Furnisure Details</h5>
                        <table class="mb-0 table">
                            <tbody> <?php $furnisure = $CI->get_ver_furniture($details['vID']); ?>
                                <?php //print_r($furnisure); 
                                ?>
                                <?php //echo $details['vID']; 
                                ?>

                                <?php $count = 1;
                                $total_cost = 0; ?>
                                <?php foreach ($furnisure as $furniture) { ?>
                                    <tr>
                                        <th width="200px" scope="row">Furniture <?php echo "#" . $count; ?></th>
                                        <td><?php echo '<a target="_blank" href="' . base_url() . 'furnisure/item/' . $furniture['productID'] . '">' . $furniture['applianceName'] . '</a>'; ?></td>
                                    </tr>
                                    <?php $total_cost = $total_cost + $furniture['price']; ?>
                                    <?php $count++; ?>
                                <?php } ?>
                                <tr>
                                    <th width="200px" scope="row">Total Cost</th>
                                    <td><span style="font-family:helvetica;">&#x20A6;</span><?php echo number_format($total_cost); ?></td>
                                </tr>
                        </table>
                    </div>
                </div>
            </div>

        <?php } ?>
    </div>



</div>

</div>

</div>

</div>