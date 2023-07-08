<?php
session_start();
if ($_SESSION['Admin_log'] == '')
{
    header("location:../Login.html");
}?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
 
  <script src="../js/Search-function.js"></script>   
  <link rel="stylesheet" href="../Css/Admin.css" />
 
</head>
<body>
   <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>A<span>yurweda</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../img/icons/icons8-system-administrator-male-80.png)"></div>
                <h4>Admin Panel</h4>
               <!-- <small>Admin Name</small>-->
            </div>

            <div class="side-menu">
                <ul>
                    <li>
                       <a href="Admin-Home-Page.php" >
                            <span ><img src="../img/icons/icons8-home-30.png"/></span>
                            <small>Home</small>
                        </a>
                    </li>
                    <li>
                       <a href="Admin-Doctors-list-Page.php">
                            <span><img src="../img/icons/icons8-doctors-30 (1).png"/></span>
                            <small>Doctors</small>
                        </a>
                    </li>
                    
                     <li>
                       <a href="Admin-View-user-list-Page.php" class="active">
                            <span><img src="../img/icons/icons8-people-30.png"/></span>
                            <small>customers</small>
                        </a>
                    </li>
                    <li>
                       <a href="Admin-View-product-list-Page.php">
                            <span><img src="../img/icons/icons8-packing-30.png"/></span>
                            <small>Products</small>
                        </a>
                    </li>
                    <li>
                       <a href="Orders.php">
                            <span ><img src="../img/icons/icons8-shopping-cart-30.png"/></span>
                            <small>Orders</small>
                        </a>
                    </li>
                     <li>
                       <a href="admin-feedback-view.php">
                            <span><img src="../img/icons/icons8-documents-30.png"/></span>
                            <small>F&Q</small>
                        </a>
                    </li>
                    

                </ul>
            </div>
        </div>
    </div>
    
    <div class="main-content">
        
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span><img src="../img/icons/icons8-menu-25.png"/></span>
                </label>
                
                <div class="header-menu" title="Search">
        <label for=""> 
          <!--<span ><img src="../img/icons/icons8-search-20.png"/></span>--> 
        </label>
        <div class="notify-icon" title="Email"> 
          <!-- <span><img src="../img/icons/icons8-secured-letter-20.png"/></span>
                        <span class="notify">4</span>--> 
        </div>
        <!--<div class="notify-icon"> <span><img src="../img/icons/icons8-doorbell-20.png"/></span> <span class="notify">3</span> </div>-->
        <div class="user" title="Logout" onclick="if (confirm('Log Out?')){window.location.href = 'Admin-logout.php';}
                else{event.stopPropagation(); event.preventDefault();};"> 
          <!--  <div class="bg-img" style="background-image: url(../img/Doctors/profile-user.png)"></div>--> 
          
          <span><img src="../img/icons/icons8-logout-rounded-up-20.png"/></span> <span>Logout</span> </div>
      </div>
            </div>
        </header>
        
        
        <main>
            
            <div class="page-header">
                <h1>Customers</h1>
                <small> View Informations</small>
            </div>
            
            <div class="page-content">
            
                


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                            
                        </div>

                        <form action="User-search.php" method="post" enctype="multipart/form-data">
                        <div class="browse">
                           <input type="search" name="search" id="search" placeholder="Search" class="record-search" required>
                            <div class="add">
                            <button type="submit">Search</button>
                        </div>
                        </div>
                     </form>
                    </div>

                    <div class="admin_table">
                        <table width="100%" >
                            <thead>
                                <tr>
                                    <th>User id</th>
                                    <th><span class="las la-sort"></span>Users </th>
                                    <th><span class="las la-sort"></span> Phone Number </th>
                                    <th><span class="las la-sort"></span>Dob </th>
                                    <th><span class="las la-sort"></span>Gender </th>
                                    <th><span class="las la-sort"></span>Address </th>
                                 <th><span class="las la-sort"></span>Joined_on</th>
                                </tr>
                            </thead>
                            <tbody id="employee_table">
                                                             <?php 

                             include '../connect.php';
                             $sql ="SELECT * FROM customers";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
                           if($count>0){
                           while($row=mysqli_fetch_assoc($res)){
                           $Customer_ID=$row['Customer_ID'];
                           $First_Name= $row['First_Name'];
                           $Last_Name= $row['Last_Name'];
                           $Email=$row['Email'];
                           $Phone=$row['Phone'];
                           $Dob=$row['Dob'];
                           $Gender=$row['Gender'];
                           $Home_No=$row['Home_No'];
                           $Street_name=$row['Street_name'];
                           $City=$row['City'];
                            $Joined_on=$row['Joined_on'];
                            
                        $img=$row['img'];
        
                               ?>
                                 <tr>
                                    <td>#<?php echo $Customer_ID;?></td>
                                     <td>
                                        <div class="client">
                                           
                                          
                                          
                                           
                                         <div class="client-img bg-img" style="background-image: url(../img/profile-pic/<?php echo $img ?>)"></div>
                                           
                                          
                                         
                                            <div class="client-info">
                                                <h4><?php echo $First_Name." ". $Last_Name;?></h4>
                                                <small><?php echo $Email;?></small>
                                            </div>
                                        </div>
                                    </td>
       
       
       
       
                                   <td>
                                        <?php echo $Phone;?>
                                    </td>
                                    <td>
                                        <?php echo $Dob;?>
                                    </td>
                                    <td>
                                        <?php echo $Gender;?>
                                    </td>
                                    <td>
                                       <?php echo $Home_No. ", ".$Street_name.", ".$City;?>
                                    </td>
                                  <td>
                                        <?php echo $Joined_on;?>
                                    </td>
                               </tr>
                             <?php
                              }
       
                           }else{
                            ?><td colspan="6 "><div class="error">No details found!</div></td><?php
                           }
                           ?>
                             
                                
                            </tbody>
                        </table>
                    </div>

                </div>
            
            </div>
            
        </main>
        
    </div>
</body>
</html>

 <script>  
      $(document).ready(function(){  
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#employee_table tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  

                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
 </script> 