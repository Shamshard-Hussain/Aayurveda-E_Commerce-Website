<!doctype html>
<html>
<head>
<meta charset="utf-8">
 
<link rel="stylesheet" href="./css/Home.css" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
 
<title>Aayurveda</title> 
</head>

<body>
    <!-- Navigation Section Start -->
        <div class="header">
            <a href="/" class="logo"></a><img class="logo_img" src="./img/shapes/Final_Logo_PNG.webp"/>
            <input class="menu-btn" type="checkbox" id="menu-btn" />
            <label class="menu-icon" for="menu-btn"><span class="nav-icon"></span></label>
            <ul class="menu">
                <li><a href="index.php#header">Home</a></li>
    <li><a href="#About">About</a></li>
    <li><a href="#Services">Services</a></li>
    <li><a href="product-list.php">Products</a></li>
    <li><a href="#Doctors">Doctors</a></li>
    <li><a href="#News">News</a></li>
    <li><a href="#Contact">Contact</a></li>
            </ul>
        </div>
    <!-- Navigation Section End -->
 <br><br><br><br><br>
     
     

 <div class="banner">
  <div class="banner_image">
    <img src="img/ayurveda-img.png" alt="Banner Image">
  </div>
  <div class="banner_content">
    <h1>Aayurveda Medicals</h1>
    <p>At our Ayurveda website, we believe that true health and wellness are achieved through a balance of body, mind, and spirit. Ayurveda offers a holistic approach to health that considers the unique needs of each individual. We understand that everyone is different, and our team of Ayurvedic experts is here to help you find the right balance for your body and lifestyle. We offer a range of services and resources, including personalized consultations, educational materials, and Ayurvedic products. Our goal is to empower you to take control of your health and well-being, and to help you live a more vibrant, fulfilling life.</p>
    <div class="banner_buttons">
      <button onClick="parent.location='login.html'">Sign In</button>
      <button onClick="parent.location='SignUp.html'">Sign Up</button>
    </div>
  </div>
</div>
<main>
 

 
 
  <div class="aboutus" id="About">
    <div class="about-sec">
      <div class="intro">
        <h4><span>About</span> Us</h4>
        <h1><span>Aayurveda</span></h1>
        <p class="about-text">We are a team of passionate Aayurvedic practitioners who are dedicated to bringing the ancient wisdom of Aayurveda to modern times. Our journey started with a deep appreciation for the holistic healing power of Aayurveda and a desire to share this knowledge with others. We believe that everyone can benefit from Aayurveda and our mission is to make this ancient science accessible to all. Our website is a platform where you can learn about Aayurveda, find resources to improve your health and well-being, and connect with our community of Aayurvedic enthusiasts. We are committed to providing high-quality, evidence-based information and services that will help you achieve optimal health.</p>
      </div>
      <img class="about-img" src="img/about us.png"> </div>
  </div>
 
 
 
 <div class="service-section" id="Services">
      <div class="service-row">
        <h2 class="section-heading">Our Services</h2>
      </div>
      <div class="service-row">
       
        <div class="service-column">
          <div class="service-card">
            <div class="icon-wrapper">
              <img class="icon-img" src="img/Services/service-icon-1.png"/>
            </div>
            <h3>Panchakarma Therapy</h3>
            <p>
                  Complete cleansing of the body through five procedures, 
                   Promotes overall wellness and balance and
                   Reduces stress and improves immunity.
            </p>
          </div>
        </div>
       
        
        <div class="service-column">
          <div class="service-card">
            <div class="icon-wrapper">
              <img class="icon-img" src="img/Services/service-icon-2.png"/>
            </div>
            <h3>Ayurvedic Massage</h3>
            <p>
                  Relieves muscle tension and stiffness, 
                  Improves blood circulation and lymphatic flow and 
                  Rejuvenates the body and promotes relaxation
            </p>
          </div>
        </div>
        
       
        <div class="service-column">
          <div class="service-card">
            <div class="icon-wrapper">
              <img class="icon-img" src="img/Services/service-icon-3.png"/>
            </div>
            <h3>Ayurvedic Consultation</h3>
            <p>
                  Identifies individual constitution and imbalances, 
    Prescribes dietary and lifestyle modifications and 
    Improves overall health and prevents disease.
            </p>
          </div>
        </div>
       
        
      </div>
    </div>
 
 
 
 
 <div class = "Doctor_Panel_wrapper" id="Doctors">
        <div class = "Doctor_Panel">
            <div class = "Doctor_Panel_title">
                <h2><span>Our Doctor Panel</span></h2>
                <h3>Doctors</h3>
            </div>

            <div class = "Doctor_content">
                <div class = "Doctors-list">
                    <div class = "Doctors-tabs">
                        <!-- item -->
                     <?php 
                             include 'connect.php';
                             $sql ="SELECT * FROM doctor Limit 0,5";
                             $res=mysqli_query($connect,$sql);
                             $count=mysqli_num_rows($res);
      
      
     
      
                           if($count>0){
                           while($row=mysqli_fetch_assoc($res)){
                            
                           $First_Name= $row['First_Name'];
                           $Middle_Initials= $row['Middle_Initials'];
                           $Last_Name= $row['Last_Name'];
                           $Email=$row['Email'];
                           $Specialty_Type=$row['Specialty_Type'];
                           $Bio=$row['Bio'];
                           $image_name= $row['Image'];
        
        
                               ?>
                     
                     <div class = "Doctor-item">
                            <div class = "Doctor-thumbnail">
                                <img src = "img/Doctors/<?php echo $image_name; ?>" alt = "">
                            </div>
                            <div class = "Doctor-intro">
                                <h5 class = "Doctor-name"><?php echo $First_Name." ".$Middle_Initials." ".$Last_Name; ?></h5>
                                <small class = "Doctor-designation"><?php echo $Specialty_Type;?></small>
                                <p class = "Doctor-description"><?php echo $Bio; ?></p>
                            </div>
                        </div>
                        <!-- end of item  -->
                          <?php
                              }
       
                           }
                     ?>
                       

                        <!-- More-item -->
                        <div class = "Doctor-item-more" onClick="parent.location='Doctors-Page.php'">
                            <div class = "more-Doctor-thumbnail">
                                <img src = "img/doctors/profile-user.png" alt = "">
                            </div>
                            <div class = "more-Doctor-intro">
                                <h5 class = "more-Doctor-name"></h5>
                                <small class = "more-Doctor-designation">Show More Doctors</small>
                            </div>
                        </div>
                        <!-- end of item  -->
                     
                    </div>
                </div>

                <div class = "show-info">
                    <div class = "show-img">
                        <img src = "" width="300px" height="300px" alt = "Doctor image">
                    </div>

                    <div class = "show-text">
                        <div>
                            <h4 class = "show-name"><!--Erick Jones--></h4>
                            <small class = "show-designation"><!--Managing Director--></small>
                        </div>
                        <p class = "show-description"><!--Lorem ipsum dolor, sit amet consectetur adipisicing elit. Deserunt assumenda nostrum dignissimos et repellat illum omnis repudiandae atque, ducimus quo, est delectus tempore facilis odit ullam magnam accusantium cumque ipsa!--></p>
                        <a href = "Doctors-page.php">Contact Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
<!---Document-->
    <div class="dialog" id="Documents">
      <h1 class="heading">Documents</h1>
      <div class="box-dialog">
       
        <div class="box"> <img src="img/shapes/icons8-checklist-100.png" alt="">
          <h3>The Ayurveda Encyclopedia</h3>
          <p>Treatment and drug therapy</p>
          <a href="Documents/Ayurveda the divine science of life ( PDFDrive ).pdf" class="btn">View</a> </div>
       
           <div class="box"> <img src="img/shapes/icons8-checklist-100.png" alt="">
          <h3>A history and philosophy of Ayurveda</h3>
          <p>Fundamental Principles of Ayurveda</p>
          <a href="Documents/Textbook of Ayurveda. A history and philosophy of Ayurveda ( PDFDrive ).pdf" class="btn">View</a> </div>
       
           <div class="box"> <img src="img/shapes/icons8-checklist-100.png" alt="">
          <h3>Ayurveda and Marma Therapy</h3>
          <p>Energy Points of Yoga and Ayurveda </p>
          <a href="Documents/Ayurveda and Marma Therapy Energy Points in Yogic Healing ( PDFDrive ).pdf" class="btn">View</a> </div>
      
      </div>
    </div>


 <!--News_cards-->
 <div class="news_title"><h2>News</h2></div>
  
 <div class="news_card_body" id="News">
      <div class="news_container">
        <div class="card">
            <div class="news_icon">
                <img src="img/shapes/ayurveda(1).png" alt="">
            </div>
            <div class="news_content">
                <h3>Ayurvedic Medicine Shows Promise in Treating COVID-19 Symptoms</h3>
                <p>A study published in the Journal of Ayurveda and Integrative Medicine found that Ayurvedic remedies such as ashwagandha and guduchi may help alleviate symptoms of COVID-19, including fever, cough, and fatigue. Researchers suggest that further investigation is needed to fully understand the potential benefits of Ayurvedic medicine in the fight against the pandemic.</p>
            </div>
                     <br>
            <a class="more"></a>


        </div>
       
       <div class="card">
            <div class="news_icon">
                <img src="img/shapes/ayurveda(3).png" alt="">
            </div>
            <div class="news_content">
                <h3>Indian Government Launches Ayurveda-based Immunity-Boosting Campaign</h3>
                <p>Indian Government Launches Ayurveda-based Immunity-Boosting Campaign in response to the COVID-19 pandemic, the Indian government has launched a campaign promoting the use of Ayurvedic remedies to boost immunity. The campaign includes a mobile app with information on Ayurvedic practices and remedies, as well as a series of webinars and workshops to educate the public on the benefits of Ayurveda</p>
            </div>
                     <br>
            <a class="more"></a>


        </div>
       
       <div class="card">
            <div class="news_icon">
                <img src="img/shapes/lavender.png" alt="">
            </div>
            <div class="news_content">
                <h3>New Research Highlights Anti-inflammatory Effects of Turmeric</h3>
                <p>A study published in the Journal of Ethnopharmacology found that curcumin, the active ingredient in turmeric, has potent anti-inflammatory effects. The study suggests that curcumin may be a useful treatment for inflammatory conditions such as arthritis and asthma. However, researchers caution that more research is needed to fully understand the potential benefits of curcumin and turmeric in the context of Ayurvedic medicine.</p>
            </div>
                     <br>
            <a class="more"></a>


        </div>
  </div>
 </div>
<footer id="Contact">
      <div class="main-Footer_content">
        <div class="left box">
          <h2>About us</h2>
          <div class="Footer_content">
            <p>Aayurveda is a traditional Hindu system of medicine (incorporated in Atharva Veda, the last of the four Vedas), which is based on the idea of balance in bodily systems and uses diet, herbal treatment, and yogic breathing.</p>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="Footer_content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Colombo 7, Sri Lanka</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">01124562145</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">Aayurveda@email.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="Footer_content">
            <form action="feedback.php" method="post">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" name="email" required>
              </div>
              <div class="msg">
                <div class="text">Message *</div>
                <textarea rows="2" cols="25" name="msg" required></textarea>
              </div>
              <div class="footer_btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="bottom">
        <center>
          <span class="credit">Created By <a href="#">Aayurveda.lk</a> | </span>
          <span class="far fa-copyright"></span><span> 2023 All rights reserved.</span>
        </center>
      </div>
    </footer>
 
 <script>
        let more = document.querySelectorAll('.more');
        for (let i = 0; i < more.length; i++) {
            more[i].addEventListener('click', function () {
                more[i].parentNode.classList.toggle('active')
            })
        }
</script>
     <script src = "js/Doctor_Panel.js"></script>
</main>

</body>
</html>
