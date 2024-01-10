<?php
session_start();
require '../db_connect.php';
$select = "SELECT * FROM masum";
$select_rest=mysqli_query($db_connect,$select);

?>
<?php require '../admin_header.php';?>
<div class="content-body">



<div class="container-fluid">

				<div class="row">
        <div class="col-lg-8 m-auto">
           <div class="card">
             
           <div class="card-header bg-success">
                <h1 class="text-white">user list</h1>
            </div>
            <div class="card-body">
                   <table class="table table-striped">
                    <tr>
                        <th>sl</th>
                        <th>name</th>
                        <th>email</th>
                        <th>gender</th>
                        <th>action</th>
                    </tr>
                    <?php foreach($select_rest as $key=> $masum) {?>
                    <tr>
                        <td><?=$key+1?></td>
                        <td><?=$masum['name']?></td>
                        <td><?=$masum['email']?></td>
                        <td><?=$masum['gender']?></td>
                        <td>
                            <a data-link="user_dellete.php?id=<?=$masum['id']?>" class="btn btn-danger del">dellete</a>
                        </td>
                    </tr>
                    <?php  }?>
                   </table> 
                </div>
           </div>

        </div>
				</div>
            </div>

            </div>
        <?php require '../admin_foter.php';?>
        <script>
            $('.del').click(function(){
                var link=$(this).attr('data-link');
                Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
   window.location.href=link;
  }
})
 
            })
        </script>
        <?php if(isset($_SESSION['delet'])) {?>
      <script>
       Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
      </script>

            <?php } unset($_SESSION['delet'])?>
   