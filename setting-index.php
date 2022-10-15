<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $country = $_POST['country'];
  $website = $_POST['website'];
  $time = time();

  $logo_name = $_FILES['logo']['name'];
  $logo_tmp = $_FILES['logo']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  $sql = "UPDATE setting SET name='$name',email='$email',phone='$phone',address='$address',city='$city',country='$country',website='$website',logo='$logo_name',time='$time' WHERE id=1";
  $query = mysqli_query($conn,$sql);
  if($query){
   $msg = "Successfully Updated Setting!";
   header("location:setting-index.php?msg=$msg");
  }else{
   $msg = "Something is worng!";
  }
}


$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM setting WHERE id=1"));
?>
    <!-- Main Content -->
    <main class="main_content">
<!-- Side Navbar Links -->
<?php include("common/sidebar.php");?>
<!-- Side Navbar Links -->

      <!-- Page Content -->
      <section class="content_wrapper">

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">UPDATE COMPANY INFORMATIONS</h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
            <div>
              <label style="text-align:center">Requirement Size: 200*60</label>
            <?php if(!empty($row['logo'])){ ?>
              <img src="upload/<?php echo $row['logo']?>" alt="">
            <?php } ?>
              <input
                type="file" 
                name="logo"
                class="input"
              />
            </div>
            <div>
              <label>Company Name</label>
              <input
                type="text" 
                name="name"
                value="<?php echo $row['name']?>"
                class="input"
              />
            </div>
            <div>
              <label>Email</label>
              <input type="text" name="email" value="<?php echo $row['email']?>" class="input" />
            </div>
            <div>
              <label>Company Phone/Mobile</label>
              <input type="text" name="phone" value="<?php echo $row['phone']?>" class="input" />
            </div>

            <div>
              <label>Company Address</label>
              <input type="text" name="address" value="<?php echo $row['address']?>" class="input" />
            </div>

            <div>
              <label>City</label>
              <input type="text" name="city" value="<?php echo $row['city']?>" class="input" />
            </div>
            <div>
              <label>Country</label>
              <input type="text" name="country" value="<?php echo $row['country']?>" class="input" />
            </div>
            <div>
              <label>website</label>
              <input type="text" name="website" value="<?php echo $row['website']?>" class="input" />
            </div>
            
            <input class="btn submit_btn" name="submit" type="submit" value="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if(isset($_GET['msg'])){ ?><script>swal("Good job!", "<?php echo $_GET['msg'];?>", "success");</script><?php }?>
