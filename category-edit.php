<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_GET['id'])){
  $id = $_GET['id'];
}

$category = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM category WHERE id='$id'"));

if(isset($_POST['submit'])){
  $category = $_POST['category'];

  $sql = "UPDATE category SET category='$category' WHERE id='$id'";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "Successfully Updated Category!";
    header("location:category-all.php?msg=$msg");
  }else{
    $msg = "Something is worng!";
  }
}

?>
    <!-- Main Content -->
    <main class="main_content">
<!-- Side Navbar Links -->
<?php include("common/sidebar.php");?>
<!-- Side Navbar Links -->

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Details Title -->
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">Edit Category</h1>
          <form id="new_category_form" action="" method="POST">
          <?php if(isset($msg)){ ?><div class="alert_success"><?php echo $msg; ?></div><?php }?>
            <div>
              <label>Category Name</label>
              <input type="text" name="category" value="<?php echo $category['category']?>" class="input" />
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="Submit" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->