<?php

session_start();

if ($_SESSION['role'] !== 'admin') {
  header('Location: ../index.php');
}

 require 'includes/header.php';
 require 'includes/navconnected.php'; //require $nav;?>

 <div class="container-fluid product-page">
   <div class="container current-page">
      <nav>
        <div class="nav-wrapper">
          <div class="col s12">
            <a href="../index.php" class="breadcrumb">Smartshop</a>
            <a href="index.php" class="breadcrumb">Dashboard</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

<div class="container dashboard">
  <div class="row">
         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/pixel.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Products & Commands</p>
              </div>
               <div class="card-action">
                 <a href="infoproduct.php" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/cat.png" alt="" />
             </div>
             <div class="card-stacked">
        <div class="card-content">
          <p>Stock</p>
        </div>
             <div class="card-action">
               <a href="products.php" class="blue-text">Learn more</a>
             </div>
             </div>

           </div>
         </div>

         <div class="col s12 m4">
           <div class="card horizontal">
             <div class="card-image">
               <img src="src/img/user.png" alt="" />
             </div>
             <div class="card-stacked">
              <div class="card-content">
                <p>Users</p>
              </div>
               <div class="card-action">
                 <a href="allusers.php" class="blue-text">Learn more</a>
               </div>
             </div>
           </div>
         </div>
         <?php

            include '../db.php';
            //get total users
            $queryusers = "SELECT count(id) as total FROM users";
            $resultusers = pg_query($connection,$queryusers);

            if(pg_num_rows($resultusers) > 0) {
              while ($rowusers = pg_fetch_assoc($resultusers)) {
                $totalusers = $rowusers['total'];
              }
            }

            //get total ordered commands
            $queryorder = "SELECT count(id) as total, statut FROM command WHERE statut = 'ordered'";
            $resultorder = pg_query($connection,$queryorder);

            if(pg_num_rows($resultorder) > 0) {
              while ($roworder = pg_fetch_assoc($resultorder)) {
                $totalorder = $roworder['total'];
              }
            }

            //get total paid commands
            $querypaid = "SELECT count(id) as total, statut FROM command WHERE statut = 'paid'";
            $resultpaid = pg_query($connection,$querypaid);

            if(pg_num_rows($resultpaid) > 0) {
              while ($rowpaid = pg_fetch_assoc($resultpaid)) {
                $totalpaid = $rowpaid['total'];
              }
            }
          ?>
         <div class="col s12 m4">
           <div class="card horizontal red lighten-1">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">supervisor_account</i> Total Users</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalusers; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card blue lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Orders</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalorder; ?></h5>
               </div>
             </div>
           </div>
         </div>

         <div class="col s12 m4">
           <div class="card green lighten-1 horizontal">
             <div class="card-stacked">
              <div class="card-content">
                <h5 class="white-text"><i class="material-icons left">shopping_cart</i> Total Payments</h5>
              </div>
               <div class="card-action">
                 <h5 class="white-text"><?= $totalpaid; ?></h5>
               </div>
             </div>
           </div>
         </div>
       </div>
</div>
 <?php require 'includes/footer.php'; ?>
