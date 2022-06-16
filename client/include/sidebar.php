<aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">
          <span class="brand-text font-weight-light">AGREERENT</span>
      </a>
      <?php 
      $name=$_SESSION['name'];
      $id=$_SESSION['id'];
      $sql="SELECT * FROM agent_details WHERE user_id='".$_SESSION['id']."'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
      ?>
      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="dist/img/profile/<?php echo $row['image']; ?>" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="" class="d-block"><?php echo $name; ?></a>
              </div>
          </div>

          <!-- SidebarSearch Form -->


          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="index" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
          <li class="nav-item">
                      <a href="paidleads" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Paid Leads
                             
                          </p>
                      </a>
                      
                  </li>
                  <li class="nav-header">Rent Agreement</li>
                  <li class="nav-item">
                      <a href="case" class="nav-link">
                          <i class="nav-icon fas fa-edit"></i>
                          <p>
                              Rent Agreement
                          </p>
                      </a>
                      
                  </li>
           
          
        
          

                          </p>
                      </a>
                  </li>
                  
                




                  <li class="nav-header">Police Noc</li>
                  <li class="nav-item">
                      <a href="policenoc" class="nav-link">
                          <i class="nav-icon fas fa-book"></i>
                          <p>
                              Police NOC
                          </p>
                      </a>
                  </li>

                  <li class="nav-header">Other</li>
                  <li class="nav-item">
                      <a href="todolist" class="nav-link">
                          <i class="nav-icon fas fa-columns"></i>
                          <p>
                              To Do
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="enquiry" class="nav-link">
                          <i class="nav-icon fas fa-person-booth"></i>
                          <p>
                              Enquiry
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="complaintform" class="nav-link">
                      <i class="nav-icon fa fa-clipboard-list"></i>
                          <p>
                              Complaint
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="profile" class="nav-link">
                          <i class="nav-icon fas fa-user"></i>
                          <p>
                              Profile
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="logout" class="nav-link">
                          <i class=" nav-icon fas fa-sign-out-alt"></i>
                          <p>
                              Logout
                          </p>
                      </a>

                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>