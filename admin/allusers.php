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
            <a href="index.php" class="breadcrumb">Dashboard</a>
            <a href="users.php" class="breadcrumb">Users</a>
          </div>
        </div>
      </nav>
    </div>
   </div>

   <div class="container scroll">
     <table class="highlight striped">
        <thead>
          <tr>
              <th data-field="lastname">Full name</th>
              <th data-field="email">email</th>
              <th data-field="city">city</th>
              <th data-field="country">country</th>
              <th data-field="address">address</th>
              <th data-field="delete">Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../db.php';

                  //get users
                  $queryuser = "SELECT id, email, firstname, lastname, address, city, country  FROM users WHERE role = 'client'";
                  $resultuser = pg_query($connection,$queryuser);
                  if (pg_num_rows($resultuser) > 0) {
                    // output data of each row
                    while($rowuser = pg_fetch_assoc($resultuser)) {
                      $id_user = $rowuser['id'];
                      $firstname = $rowuser['firstname'];
                      $lasttname = $rowuser['lastname'];
                      $email = $rowuser['email'];
                      $city = $rowuser['city'];
                      $country = $rowuser['country'];
                      $address = $rowuser['address'];
              ?>
              <tr>
                <td><?php echo" $firstname "." $lasttname"; ?></td>
                <td><?= $email; ?></td>
                <td><?= $country; ?></td>
                <td><?= $country; ?></td>
                <td><?= $address; ?></td>
                <td><a href="deleteuser.php?id=<?= $id_user; ?>"><i class="material-icons red-text">close</i></a></td>
              </tr>
              <?php }}  ?>
            </tbody>
          </table>
          </div>

   <?php require 'includes/footer.php'; ?>
