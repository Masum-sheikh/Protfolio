<?php
session_start();
require '../admin_header.php';
require '../db.php';
$about="SELECT * FROM mabouts";
$about_res=mysqli_query($db_connect, $about);
$after_assoc_about=mysqli_fetch_assoc($about_res);

?>


<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
				<div class="col-lg-8 m-auto">
                 <div class="card">
                    <div class="card-header">
                        <h3>update information</h3>
                    </div>
                    <div class="card-body">
                    <?php if(isset($_SESSION['about'])){?>
                             <div class="alert alert-success">
                              <?=$_SESSION['about']?>

                             </div>
                          <?php } unset($_SESSION['about']) ?>
                        <form action="about_post.php" method="POST" enctype="multipart/form-data">
                          <div class="mb-3">
                             <label for="" class="form-label">nick name</label>
                             <input type="text" class="form-control" name="nick_name" value="<?=$after_assoc_about['nick_name']?>">
                            
                          </div>
                          <div class="mb-3">
                             <label for="" class="form-label">name</label>
                             <input type="text" class="form-control" name="name" value="<?=$after_assoc_about['name']?>">
                          </div>
                          <div class="mb-3">
                             <label for="" class="form-label">designaton</label>
                             <input type="text" class="form-control" name="designaton" value="<?=$after_assoc_about['designaton']?>">
                          </div>
                          <div class="mb-3">
                             <label for="" class="form-label">short discription</label>
                             <textarea name="short_desp" class="form-control" cols="20" rows="5"><?=$after_assoc_about['short_desp']?></textarea>
                          </div>
                          <div class="mb-3">
                             <label for="" class="form-label">image uplode</label>
                             <input type="file" name="image" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                             <div class="my-2">
                              <img width="100" id="blah2" src="../uploads/about/<?=$after_assoc_about['image']?>" alt="">
                             </div>
                          </div>
                          <?php if(isset($_SESSION['exten2'])){?>
                                 <strong class="text-danger">
                               <?=$_SESSION['exten2']?>

                                     </strong>
                                 <?php } unset($_SESSION['exten2']) ?>
                          <div class="mb-3">
                             <button type="submit" class="btn btn-primary">update</button>
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