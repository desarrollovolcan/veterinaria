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
                            <span>Toastr</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Advanced</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Toastr</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->

                <!-- Toastr -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Toastr</h4>
                            </div>
                            <div class="card-body">
                                <button type="button" class="btn btn-dark mb-2 me-2" id="toastr-success-top-right">Top
                                    Right</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-bottom-right">Bottom Right</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-bottom-left">Bottom Left</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-top-left">Top
                                    Left</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-top-full-width">Top Full Width</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-bottom-full-width">Bottom Full Width</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-top-center">Top
                                    Center</button>
                                <button type="button" class="btn btn-dark mb-2  me-2" id="toastr-success-bottom-center">Bottom Center</button>
                                <button type="button" class="btn btn-info mb-2  me-2" id="toastr-info-top-right">Info</button>
                                <button type="button" class="btn btn-warning mb-2  me-2" id="toastr-warning-top-right">Warning</button>
                                <button type="button" class="btn btn-danger mb-2  me-2" id="toastr-danger-top-right">Error</button>
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