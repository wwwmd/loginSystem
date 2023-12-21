<?php
    include('includes/connection.php');
    include("includes/header.php");
    include("includes/navbar.php");

       

$per_page=5;
$start=0;
$current_page=1;
if(isset($_GET['start'])){
	$start=$_GET['start'];
	if($start<=0){
		$start=0;
		$current_page=1;
	}else{
		$current_page=$start;
		$start--;
		$start=$start*$per_page;
	}
}
$record=mysqli_num_rows(mysqli_query($conn,"select * from users"));
$pagi=ceil($record/$per_page);

$sql="select * from users limit $start,$per_page";
$res=mysqli_query($conn,$sql);
?>
 
<div id="admin-content">
      <div class="container">
          <div class="row border border-primary mt-2 card shadow">
         
              <div class="col-md-12 d-flex justify-content-end  bg-warning p-2 mb-2 justify-content-end px-3">
                  <div class="admin-heading col-6 fs-2">All Users</div>


              <div class="pt-1">
                <a href="#" class=" btn btn-primary text-white ">add user</a>
                <!-- <button class=" btn btn-primary text-white ">add user</button> -->
              </div>
                  
              </div>
              
              <div class="col-md-12">
                  <table class="table table-bordered border-primary table table-success text-center">

                      <thead card-head>
                        
                          
                          
                          <th>ID</th>
                          
                          <th>NAME</th>
                          <th>PHONE</th>
                          <th>EMAIL ID</th>
                          <th>STATUS</th>
                          <th>ACTION</th>
                         

                          
                      </thead>

                      <?php 
                      if(mysqli_num_rows($res)>0){
                      
                      while ($row = mysqli_fetch_assoc($res)) 
                      {?>
                       <tbody class="card-body">
                          <tr class="table-active text-center">
                              <td class='id'><?php echo $row['id'];?></td>
                              <td><?php echo $row['name'];?></td>
                              <td><?php echo $row['phone'];?></td>
                              <td><?php echo $row['email'];?></td>
                              <td><?php echo $row['status'];?></td>
                              <td class="gap-4 icon-link icon-link-hover text-danger">
                                <a href="#"class="text-decoration-none icon-link icon-link-hover text-danger">edit</a>
                                
                                <a href="#"class="text-decoration-none icon-link icon-link-hover text-danger">delete</a>
                              </td>
                              
                              <?php } } else {?>
	                            No found records
	                            <?php } ?>
                          </tr>
                         
                  </table>

                  <ul class="pagination mt-3 justify-content-center">
                    <?php 
                    for($i=1;$i<=$pagi;$i++){
                    $class='';
                    if($current_page==$i){
                      ?><li class="page-item active"><a class="page-link" href="javascript:void(0)"><?php echo $i?></a></li><?php
                    }else{
                    ?>
                      <li class="page-item"><a class="page-link" href="?start=<?php echo $i?>"><?php echo $i?></a></li>
                    <?php
                    }
                    ?>
                      
                    <?php } ?>
                    </ul>





                  
                  

              </div>
          </div>
      </div>
  </div>
  <script src="js/main.js"></script>
  <?php include('includes/footer.php');?>


