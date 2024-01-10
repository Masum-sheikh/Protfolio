<?php
session_start();
require '../admin_header.php';

?>

<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>header logo update</h3>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['header_logo'])){?>
                             <div class="alert alert-success">
                              <?=$_SESSION['header_logo']?>

                             </div>
                          <?php } unset($_SESSION['header_logo']) ?>
                                <form action="header_logo_update.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                    <label for="">header logo</label>
                                    <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                                    <div calss="my-2"><img width="100" src="../uploads/logo/header_logo.png" id="blah" alt=""> </div>
                                </div>
                                <?php if(isset($_SESSION['exten'])){?>
                                 <strong class="text-danger">
                               <?=$_SESSION['exten']?>

                                     </strong>
                                 <?php } unset($_SESSION['exten']) ?>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h3>footer logo update</h3>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['footer_logo'])){?>
                             <div class="alert alert-success">
                              <?=$_SESSION['footer_logo']?>

                             </div>
                          <?php } unset($_SESSION['footer_logo']) ?>
                                <form action="footer_logo_update.php" method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                    <label for="">footer logo</label>
                                    <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                                    <div calss="my-2"><img width="100" src="../uploads/logo/footer_logo.png" id="blah2" alt=""> </div>
                                    </div>
                                    <?php if(isset($_SESSION['exten2'])){?>
                                 <strong class="text-danger">
                               <?=$_SESSION['exten2']?>

                                     </strong>
                                 <?php } unset($_SESSION['exten2']) ?>
                                    <div class="mb-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


				</div>
            </div>
        </div>


<?php
require '../admin_foter.php';

?>

