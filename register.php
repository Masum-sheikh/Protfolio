<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
 <style>
  .pass_div {
    position: relative;
  }
  .pass_div i {
    position: absolute;
    top:25px;
    right:0px;
    font-size:20px;
    color:white;
    height: 36px;
    width:36px;
    line-height:36px;
    text-align:center;
     background:green;
  cursor: pointer;
  }
 </style>
  </head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center"> user register</h3>
                    </div>
                    <div class="card-body">
                    
     <?php if(isset($_SESSION['success'])){
      echo $_SESSION['success'];
     } {?>
      <?php }unset($_SESSION['success'])?>

      <?php if(isset($_SESSION['exit'])){

        echo $_SESSION['exit'];
      
     } {?>
      <?php }unset($_SESSION['exit'])?>
 <form action="register_post.php" method="POST">
  <div class="mb-3">
    <labelclass="form-label">Name</label>
   
    <input  name="name" style="border-color:<?php echo (isset($_SESSION['name_err'])?'red':'')?>;" type=" text" class="form-control" placeholder="your name">
    
      <?php if(isset($_SESSION['name_err'])){?>
        <strong class="text-danger">
        <?php
    echo  $_SESSION['name_err'];
    ?>

        <?php }unset($_SESSION['name_err'])?>
   
    </strong>
  </div>
  <div class="mb-3">
    <labelclass="form-label">email</label>
    <input  name="email" style="border-color:<?php echo (isset($_SESSION['eml-err'])?'red':'')?>;" type="email" class="form-control" placeholder="your email">
    <?php if(isset($_SESSION['eml-err'])) {?>
    <strong class="text-danger">

<?php echo  $_SESSION['eml-err']; ?>    

  <?php }unset($_SESSION['eml-err'])?>
</strong>
    
  </div>
  <div class="mb-3 pass_div">
    <labelclass="form-label">password</label>
    <input id="pass" name="password" style="border-color:<?php echo (isset($_SESSION['pass-err'])?'red':'')?>;" type="password" class="form-control" placeholder="your email">
    <?php if(isset($_SESSION['pass-err'])) {?>
    <strong class="text-danger">

<?php echo  $_SESSION['pass-err']; ?>    

  <?php }unset($_SESSION['pass-err'])?>
</strong>
<i id="show_pass" class="fa fa-eye"></i>
  </div>
  
  <div class="mb-3 pass_div">
    <labelclass="form-label">selest jender</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" value="male" name="gender" id="gen1">
  <label class="form-check-label" for="gen1">
    male
  </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="gender" value="female" id="gen2" checked>
  <label class="form-check-label" for="gen2">
    famale
  </label>
</div>
<?php if(isset($_SESSION['gnd-err'])) {?>
    <strong class="text-danger">

<?php echo  $_SESSION['gnd-err']; ?>    

  <?php }unset($_SESSION['gnd-err'])?>
</strong>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
 <script>
  $('#show_pass').click(function(){
   var pass=document.getElementById('pass');
   if(pass.type=='password'){
     pass.type='text';
   }
  else{
    pass.type='password';
  }  })
 </script>
  </body>
</html>