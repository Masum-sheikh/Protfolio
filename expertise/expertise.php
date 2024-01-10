<?php
session_start();
require '../admin_header.php';
require '../db.php';
$expertise="SELECT * FROM expertise";
$expertise_res=mysqli_query($db_connect, $expertise);


?>


<div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="row">
               <div class="col-lg-8">
                  <div class="card">
                     <div class="card-header">
                        <h3>Expertise</h3>
                     </div>
                     <div class="card-body">
                     <?php if(isset($_SESSION['delete'])){?>
                             <div class="alert alert-success">
                              <?=$_SESSION['delete']?>

                             </div>
                          <?php } unset($_SESSION['delete']) ?>
                        <table class="table table-bordered">
                           <tr>
                              <th>sl</th>
                              <th>topic</th>
                              <th>persentage</th>
                              <th>stutas</th>
                              <th>action</th>
                             
                           </tr>
                           <?php foreach($expertise_res as $sl=>$skill){ ?>
                           <tr>
                              <td><?= $sl+1?></td>
                              <td><?= $skill['topic_name'] ?></td>
                              <td><?= $skill['persentage'] ?></td>
                              <td>
                                 <a href="stutas_change.php?id=<?= $skill['id']?>" class="btn btn-<?= ($skill['stutas']==1?'success':'light')?>"><?= ($skill['stutas']==1?'active':'deactive')?></a>
                              </td>
                              <td> <a href="delete_expertise.php?id=<?= $skill['id']?>" class="btn btn-danger del">dellete</a></td>
                           </tr>
                      <?php }?>
                        </table>
                     </div>
                  </div>
               </div>
				<div class="col-lg-4">
                 <div class="card">
                    <div class="card-header">
                        <h3>add new Expertise</h3>
                    </div>
                    <div class="card-body">
                    <?php if(isset($_SESSION['success'])){?>
                             <div class="alert alert-success">
                              <?=$_SESSION['success']?>

                             </div>
                          <?php } unset($_SESSION['success']) ?>
                        <form action="expertise_post.php" method="POST" enctype="multipart/form-data">
                          <div class="mb-3">
                             <label for="" class="form-label">topic name</label>
                             <input type="text" class="form-control" name="topic_name">
                            
                          </div>
                          <div class="mb-3">
                             <label for="" class="form-label">persentage</label>
                             <input type="number" class="form-control" name="persentage">
                          </div>
                         
                          <?php if(isset($_SESSION['exten2'])){?>
                                 <strong class="text-danger">
                               <?=$_SESSION['exten2']?>

                                     </strong>
                                 <?php } unset($_SESSION['exten2']) ?>
                          <div class="mb-3">
                             <button type="submit" class="btn btn-primary">Add</button>
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