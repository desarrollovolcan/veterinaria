<?php 
	 require_once __DIR__ . '/config/dz.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- PAGE TITLE HERE -->
    <title><?php echo $DexignZoneSettings['site_level']['site_title'] ?></title>
    <?php include 'elements/meta.php'; ?>
    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $DexignZoneSettings['site_level']['favicon'] ?>">

    <?php include 'elements/page-css.php'; ?>
</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <?php include 'elements/pre-loader.php'; ?>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <?php include 'elements/nav-header.php'; ?>
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		<?php include 'elements/chatbox.php'; ?>
		<!--**********************************
            Chat box End
        ***********************************-->


		
		
        <!--**********************************
            Header start
        ***********************************-->
       <?php include 'elements/header.php'; ?>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php include 'elements/sidebar.php'; ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <div class="container-fluid">

                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Media Object</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Media Object</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="me-3 img-fluid rounded" width="60"  src="./assets/images/avatar/1.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Media heading</h5>
                                            <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                    <div class="media mt-4">
                                        <img class="me-3 img-fluid rounded" width="60"  src="./assets/images/avatar/7.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Media heading</h5>
											<p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Nesting</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="me-3 rounded" width="60"  src="./assets/images/avatar/2.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Media heading</h5>
                                            <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>

                                            <div class="media mt-4">
                                                <a class="pe-3" href="#">
                                                    <img class="rounded" width="60" src="./assets/images/avatar/3.jpg" alt="DexignZone">
                                                </a>
                                                <div class="media-body">
                                                    <h5 class="mt-0">Media heading</h5>
                                                    <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Align Top</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="align-self-start me-3 rounded" width="60"  src="./assets/images/avatar/4.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Top-aligned media</h5>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Align Center</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="align-self-center me-3 rounded" width="60"  src="./assets/images/avatar/5.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Center-aligned media</h5>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Align Bottom</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <img class="align-self-end me-3 rounded" width="60"  src="./assets/images/avatar/6.jpg" alt="DexignZone">
                                        <div class="media-body">
                                            <h5 class="mt-0">Bottom-aligned media</h5>
                                            <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            <p class="mb-0">Donec sed odio dui. Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <div class="media">
                                        <div class="media-body">
                                            <h5 class="mt-0">Media object</h5>
                                            <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                        </div>
                                        <img class="ms-3 rounded" width="60"  src="./assets/images/avatar/7.jpg" alt="DexignZone">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Media list</h4>
                            </div>
                            <div class="card-body">
                                <div class="bootstrap-media">
                                    <ul class="list-unstyled">
                                        <li class="media">
                                            <img class="me-3 rounded" width="60"  src="./assets/images/avatar/8.jpg" alt="DexignZone">
                                            <div class="media-body">
                                                <h5 class="mt-0">List-based media object</h5>
                                                <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            </div>
                                        </li>
                                        <li class="media my-4">
                                            <img class="me-3 rounded" width="60"  src="./assets/images/avatar/1.jpg" alt="DexignZone">
                                            <div class="media-body">
                                                <h5 class="mt-0">List-based media object</h5>
                                                <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <img class="me-3 rounded" width="60"  src="./assets/images/avatar/2.jpg" alt="DexignZone">
                                            <div class="media-body">
                                                <h5 class="mt-0">List-based media object</h5>
                                                <p class="mb-0">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus. vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <?php include 'elements/footer.php'; ?>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->

        
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <?php include 'elements/page-js.php'; ?>
    
</body>
</html>