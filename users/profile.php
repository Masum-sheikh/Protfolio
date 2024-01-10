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
                                <h2>Edit profile</h2>
                            </div>
                            <div class="card-body">
                            <form action="profile_update.php" method="POST">
                  <div class="form-group">
                   <label for="">name</label>
                 <input type="name" class="form-control" name="name"  placeholder="Enter email" value="<?=$after_assoc_user_info['name']?>">
                 </div>
               <div class="form-group">
              <label for="">Password</label>
             <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
           <input type="hidden" name="user_id" value="<?=$after_assoc_user_info['id']?>">
           <div class="ml-3">
           <button type="submit" class="btn btn-primary">update profile</button>
           </div>
           
          </form>
</div>
                            </div>
                        </div>
                    </div>
<!--
second file open
-->
<from action="image_update.php" method="POST" enctype="multipart/form-data">
<div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <h2>Edit profile</h2>
                            </div>
                            <div class="card-body">
                            <?php if(isset($_SESSION['update-imag'])){?>
            <div class="alert alert-success">
            <?=$_SESSION['update-imag']?>

            </div>
               
          
           <?php } unset($_SESSION['update-imag']) ?>
                            <form action="image_update.php" method="POST" enctype="multipart/form-data">
                 
            <div class="form-group">
              <label for="">image</label>
             <input type="file" class="form-control" name="image"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
           <div class="my-2">
           <img width="200" src="" id="blah" alt="">
           </div>
           <?php if(isset($_SESSION['exten'])){?>
            <strong class="text-danger">
                <?=$_SESSION['exten']?>

            </strong>
           <?php } unset($_SESSION['exten']) ?>
            </div>
            <button type="submit" class="btn btn-primary">update profile</button>
          </form>
</div>
                            </div>
                        </div>
                    </div>
<!--
second file end
-->
				</div>
            </div>
        </div>
<?php
require '../admin_foter.php';

?>
<?php if(isset($_SESSION['update'])) {?>
    <script>
        Swal.fire(
  'Complete!',
  '<?=$_SESSION['update']?>',
  'success'
)
    </script>

<?php }unset($_SESSION['update']) ?>