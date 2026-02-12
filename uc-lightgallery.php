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
                            <span>lightGallery</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Advanced</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">lightGallery</a></li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
							<div class="card-header">
								<h4 class="card-title">Light Gallery</h4>
							</div>
							<div class="card-body pb-1">
								<div id="lightgallery" class="row">
									<a href="assets/images/big/img1.jpg" data-exthumbimage="assets/images/big/img1.jpg" data-src="assets/images/big/img1.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img1.jpg" alt="" style="width:100%;"/>
									</a>
									<a href="assets/images/big/img2.jpg" data-exthumbimage="assets/images/big/img2.jpg" data-src="assets/images/big/img2.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img2.jpg" alt="" style="width:100%;" />
									</a>
									<a href="assets/images/big/img3.jpg" data-exthumbimage="assets/images/big/img3.jpg" data-src="assets/images/big/img3.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img3.jpg" alt="" style="width:100%;" />
									</a>
									<a href="assets/images/big/img4.jpg" data-exthumbimage="assets/images/big/img4.jpg" data-src="assets/images/big/img4.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img4.jpg" alt="" style="width:100%;" />
									</a>
									<a href="assets/images/big/img5.jpg" data-exthumbimage="assets/images/big/img5.jpg" data-src="assets/images/big/img5.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img5.jpg" alt="" style="width:100%;"/>
									</a>
									<a href="assets/images/big/img6.jpg" data-exthumbimage="assets/images/big/img6.jpg" data-src="assets/images/big/img6.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img6.jpg" alt="" style="width:100%;" />
									</a>
									<a href="assets/images/big/img7.jpg" data-exthumbimage="assets/images/big/img7.jpg" data-src="assets/images/big/img7.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img7.jpg" alt="" style="width:100%;" />
									</a>
									<a href="assets/images/big/img8.jpg" data-exthumbimage="assets/images/big/img8.jpg" data-src="assets/images/big/img8.jpg" class="col-lg-3 col-md-6 mb-4">
										<img src="assets/images/big/img8.jpg" alt="" style="width:100%;" />
									</a>
								</div>
							</div>
                        </div>
                        <!-- /# card -->
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