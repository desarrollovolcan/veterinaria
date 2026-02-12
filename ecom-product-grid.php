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
				<!-- Add Project -->
				<div class="modal fade" id="addProjectSidebar">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title">Create Project</h5>
								<button type="button" class="close" data-dismiss="modal"><span>&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form>
									<div class="form-group">
										<label class="text-black font-w500">Project Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Deadline</label>
										<input type="date" class="form-control">
									</div>
									<div class="form-group">
										<label class="text-black font-w500">Client Name</label>
										<input type="text" class="form-control">
									</div>
									<div class="form-group">
										<button type="button" class="btn btn-primary">CREATE</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
                <div class="row page-titles mx-0">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Hi, welcome back!</h4>
                            <p class="mb-0">Your business dashboard template</p>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/1.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Bonorum et Malorum</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$761.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/2.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Striped Dress</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$159.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/3.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">BBow polka-dot</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$357.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/4.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Z Product 360</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$654.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/5.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Chair Grey</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$369.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/6.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">fox sake withe</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$245.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/7.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Back Bag</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$364.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/1.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">FLARE DRESS</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$548.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/4.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Z Product 360</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$654.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/7.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Back Bag</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                        </ul>
                                        <span class="price">$364.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					 <div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/4.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">Z Product 360</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$654.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-xl-2 col-xxl-3 col-md-4 col-sm-6">
                        <div class="card product-grid-card">
                            <div class="card-body">
                                <div class="new-arrival-product">
                                    <div class="new-arrivals-img-contnent">
                                        <img class="img-fluid" src="assets/images/product/1.jpg" alt="">
                                    </div>
                                    <div class="new-arrival-content text-center mt-3">
                                        <h4><a href="ecom-product-detail.php">FLARE DRESS</a></h4>
                                        <ul class="star-rating">
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                            <li><i class="fa fa-star-half-empty"></i></li>
                                        </ul>
                                        <span class="price">$548.00</span>
                                    </div>
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