<!doctype html>
<html class="no-js" lang="en">    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Alison portfolio template">
        <meta name="author" content="ThemeEaster">
        <title>Michael | Portfolio</title>
<style>

.project-section {
  padding: 60px 20px;
  background: #121212;
  font-family: 'Segoe UI', sans-serif;
  color: #e0e0e0;
}

.project-section h2 {
  text-align: center;
  font-size: 32px;
  margin-bottom: 16px;
  color: #fff;
}

.project-grid {
  display: flex;
  flex-wrap: wrap;
  gap: 25px;
  justify-content: center;
}

.project-card {
  flex: 1 1 calc(33.33% - 30px);
  max-width: 320px;
  background: #1e1e1e;
  border-left: 5px solid;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 8px 20px rgba(255, 255, 255, 0.05);
  transition: all 0.3s ease;
  cursor: pointer;
}

.project-card img {
  width: 100%;
  height: 180px;
  /* object-fit: cover; */
}

.project-card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 25px rgba(255, 255, 255, 0.1);
}

.project-card .card-content {
  padding: 20px;
}

.project-card h3 {
  margin: 0;
  font-size: 18px;
}

.project-card p {
  font-size: 14px;
  color: #bbb;
  margin: 10px 0;
}

.project-card a {
  text-decoration: none;
  font-weight: 500;
}

/* Tablet */
@media (max-width: 992px) {
  .project-card {
    flex: 1 1 calc(50% - 30px);
  }
}

/* Mobile */
@media (max-width: 600px) {
  .project-card {
    flex: 1 1 100%;
  }
}

.pagination {
  display: flex;
  justify-content: center;
  margin-top: 20px;
  gap: 8px;
}
.pagination button {
  padding: 6px 12px;
  border: none;
  background-color: #1e88e5;
  color: white;
  cursor: pointer;
  border-radius: 4px;
}
.pagination button.active {
  background-color: #0d47a1;
}
.pagination button:hover {
  background-color: #1565c0;
}
      

</style>
		<link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/themify-icons.css">
        <link rel="stylesheet" href="css/elegant-font-icons.css">
        <link rel="stylesheet" href="css/elegant-line-icons.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/venobox/venobox.css">
        <link rel="stylesheet" href="css/slicknav.min.css">
        <link rel="stylesheet" href="css/animate.min.css">
        <link rel="stylesheet" href="css/simpletextrotator.css">
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body data-spy="scroll" data-target="#navmenu" data-offset="70">
        <div class="site-preloader-wrap">
            <div class="spinner"></div>
        </div>
        <header id="header" class="header-section">
            <div class="container">
                <nav class="navbar">
                    <!-- <a href="#" class="navbar-brand"><img src="img/logo.png" alt="Brandberry"></a> -->
                     <a href="https://github.com/SmartDevPK" class="navbar-brand">SmartDevPK</a>
                     <style>
                     .navbar-brand {
                     font-size: 24px;
                     font-weight: bold;
                     color: #ff4c4c!important;
                     text-decoration: none;
                     .navbar-brand:hover {
                      text-decoration: none!important;
                      color: #ff4c4c!important;  
                    } 
                    }
                    </style>
                    <div class="d-flex menu-wrap">
                       <div id="navmenu" class="mainmenu">
                           <ul class="nav">
                                <li ><a data-scroll class="nav-link active" href="#home">Home <span class="sr-only">(current)</span></a></li>
                                <li><a data-scroll class="nav-link" href="#about">About</a></li>
                                <li><a data-scroll class="nav-link" href="#services">Services</a></li>
                                <li><a data-scroll class="nav-link" href="#project-section">Works</a></li>
                                <li><a data-scroll class="nav-link" href="#contact">Contact</a></li>
                                <li><a data-scroll class="nav-link"  href="login.php"><span style="color:red">Admin</span></a></li>

                            </ul>
                       </div>
                    </div>
                </nav>
            </div>
		</header> 
		
        <section id="home" class="section hero-section d-flex align-items-center">
            <div class="container">
                <div class="hero-content text-center">
                    <h5>I AM WEB DEVELOPER</h5>
                    <h1><span class="rotate">Creat<span style="color: darkred;">ivity</span>,Designing, Developing</span></h1>
                    <p>I’m a Creative Web Devolper.<br> Turning your dreams into reality.</p>
                    <ul class="social-link">
                        <li><a href="https://web.facebook.com/?_rdc=1&_rdr#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://x.com/Emmanuelpk67"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://www.instagram.com/michaelemmanuelpk/"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <!-- <div class="down-arrow">
                <a data-scroll href="#about" class="arrow-animated">Scroll Down <i class="ti-arrow-down"></i></a>
            </div> -->
        </section><!-- hero-section -->
        
        <section id="about" class="about-section bg-dark">
            <div class="container-fluid">
                <div class="row about-wrap">
                    <div class="col-md-6">
                        <div class="about-content pdl-80">
                            <div class="section-heading mb-20">
                               <h2>About Me</h2>
                            </div>
                            <p>I’m a passionate backend developer dedicated to crafting robust, scalable, and high-performing web applications that deliver seamless user experiences. With a strong foundation in server-side logic, I specialize in designing efficient APIs (REST), optimizing databases (SQL and NoSQL), and implementing real-time features using technologies like WebSockets and serverless architectures. My approach blends clean, maintainable code with modern backend frameworks such as Node.js, Django, or FastAPI, ensuring performance and security at scale. By collaborating closely with frontend frameworks like React and Vue, I create responsive, real-time applications that feel fluid and intuitive. I thrive on solving complex challenges, from architecting scalable systems to optimizing database queries, all while keeping the user experience at the forefront.</p>
                            <a href="#project-section" class="default-btn">See My Works</a>
                        </div>
                    </div>
                    <div class="col-md-6 d-none d-md-block">
                        <img src="img/pk.jpeg" alt="image">
                    </div>
                </div>
            </div>
        </section><!-- about-section -->
        
        <section id="services" class="service-section padding">
            <div class="container-fluid">
                <div class="row service-area d-flex align-items-center">
                    <div class="col-lg-4 col-md-4 xs-padding">
                        <div class="section-heading pdl-80">
                            <h2 class="mb-20">Services</h2>
                            <p class="mb-20">I’m a Web Developer and I build smart solutions.<br> Turning your dreams into reality.</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-8 xs-padding">
                        <div class="row service-wrap">
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                    <i class="icon-layers"></i>
                                    <h3> Custom Web Development</h3>
                                    <p>Tailored websites built with clean, scalable code.</p>
                                </div>
                            </div><!-- Service-1 -->
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                    <i class="icon-tools"></i>
                                    <h3>Themes Development</h3>
                                    <p>Custom themes built to match your brand style.</p>
                                </div>
                            </div><!-- Service-2 -->
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                    <i class="icon-bargraph"></i>
                                    <h3>Frontend Development</h3>
                                    <p>Modern, responsive UI with HTML, CSS, and JS.</p>
                                </div>
                            </div><!-- Service-3 -->
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                 <i class="fa fa-database"></i>
                                    <h3>Backend Development</h3>
                                    <p>Build secure APIs with Nodejs, PHP, Python</p>
                                </div>
                            </div><!-- Service-4 -->
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                    <i class="fa fa-cogs"></i>   
                                    <h3>CMS Integration</h3>
                                    <p>Seamless CMS setup for easy content updates.</p>
                                </div>
                            </div><!-- Service-6 -->
                            <div class="col-lg-4 col-sm-6 pd-15">
                                <div class="service-content">
                                    <i class="icon-bike"></i>
                                    <h3>Responsive Design</h3>
                                    <p>Designs that adapt to every screen and device.</p>
                                </div>
                            </div><!-- Service-5 -->
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- service-section -->
            
<section id="project-section" class="project-section">
  <h2>Portfolio</h2>
  <h3 style="text-align: center; margin-bottom: 36px;">
    Creative Web Developer building modern websites with impactful results.
  </h3>

  <!-- Project Grid -->
  <div class="project-grid" id="project-grid">

    <!-- Hospital Website -->
    <div class="project-card" style="border-left-color: #1e88e5;">
      <img src="img/microExpress.png" alt="Micro Express">
      <div class="card-content">
        <h3 style="color: #1e88e5;">Micro Express Transportaion</h3>
        <p>MicsonExpress Transportation is a platform that allows customers to reserve and book vehicles for personal or business travel, with easy scheduling and secure payments.</p>
        <a href="https://micsonexpress.com/" style="color: #1e88e5;">View Project</a>
      </div>
    </div>

    <!-- Donation Website -->
    <div class="project-card" style="border-left-color: #43a047;">
      <img src="img/ecwa.png" alt="Levy EcwaEducational">
      <div class="card-content">
        <h3 style="color: #43a047;">ecwaeducation</h3>
        <p>The Levy ECWA Education website enables the ECWA Headquarters in Jos to collect receipts from the organisation’s branches across the federation in order to maintain accurate records</p>
        <a href="https://levy.ecwaeducation.org/" style="color: #43a047;">View Project</a>
      </div>
    </div>

    <!-- Quran Academy -->
    <div class="project-card" style="border-left-color: #fbc02d;">
      <img src="img/pastor.png" alt="Quran Academy">
      <div class="card-content">
        <h3 style="color: #fbc02d;">theanchordevotional</h3>
        <p>The Anchor Devotional is a platform where church members can view daily and past devotionals, request prayers, add comments, and share testimonials.</p>
        <a href="https://theanchordevotional.com/" style="color: #fbc02d;">View Project</a>
      </div>
    </div>

    <!-- Login And Register -->
    <div class="project-card" style="border-left-color: #e53935;">
      <img src="img/Login&Register.png" alt="Authentication">
      <div class="card-content">
        <h3 style="color: #e53935;">Authentication</h3>
        <p>Developed an authentication system for a U.S.-based client, enabling user registration, login, and password reset.</p>
        <a href="#" style="color: #e53935;">View Project</a>
      </div>
    </div>

    <!-- TransUnion -->
    <div class="project-card" style="border-left-color: #e53935;">
      <img src="img/TranUnion.png" alt="TransUnion">
      <div class="card-content">
        <h3 style="color: #e53935;">TransUnion</h3>
        <p>Developed a website for a client in Pastiani that allows users to create accounts, add personal information, and verify payments through an integrated payment gateway.</p>
        <a href="#" style="color: #e53935;">View Project</a>
      </div>
    </div>

    <!-- Library Management System -->
    <div class="project-card" style="border-left-color: #e53935;">
      <img src="img/Librarys.png" alt="Library Management System">
      <div class="card-content">
        <h3 style="color: #e53935;">Library Management System</h3>
        <p>Developed an authentication system for a U.S.-based client, enabling user registration, login, and password reset.</p>
        <a href="#" style="color: #e53935;">View Project</a>
      </div>
    </div>

  </div>

  <!-- Pagination Controls -->
  <div class="pagination" id="pagination"></div>
</section>
        <section class="cta-section padding">
            <div class="container">
                <div class="cta-wrap text-center">
                    <div class="cta-content">
                    <h2>
                    A Web Development agency in Nigeria, <br>
                    building digital solutions with code, logic and <br>
                    creativity, since 2022.
                    </h2>
        </div>
                        <a href="#contact" class="default-btn">Contact With Us</a>
                    </div>
                </div>
            </div>
        </section><!-- cta-section -->
        
       <section id="contact" class="contact-section bg-dark">
  <div class="container-fluid">
    <div class="row contact-wrap">
    
      <!-- Contact Form (Left Side) -->
      <div class="col-lg-6 col-md-12 pdl-80">
        <div class="contact-info mb-30">
          <h2>let's work together projects <br> just send me email here</h2>
        </div>
        <div class="contact-form">
          <form action="https://html.dynamiclayers.net/it/alison/contact.php" method="post" id="ajax_form" class="form-horizontal">
            <div class="form-group colum-row row">
              <div class="col-sm-6">
                <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
              </div>
              <div class="col-sm-6">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <textarea id="message" name="message" cols="30" rows="5" class="form-control message" placeholder="Message" required></textarea>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-md-12">
                <button id="submit" class="default-btn submit-button" type="submit">Send Message</button>
              </div>
            </div>
            <div id="form-messages" class="alert" role="alert"></div>
          </form>
        </div>
      </div>

  
      <div class="col-lg-6 col-md-12 p-0">
        <div style="height: 400px;">
        <iframe 
           src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125769.92383032141!2d8.795032466448228!3d9.908108505941488!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1053724e68ec1c83%3A0x21ebe700fbd5381d!2sJos%2C%20Plateau!5e0!3m2!1sen!2sng!4v1758597634941!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
          width="100%" 
          height="100%" 
          style="border:0; min-height: 100%; height: 100%;" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
       </div>
    </div>
  </div>
</section>
<!-- contat-section -->
	<a href="https://wa.me/2349056941102" 
   target="_blank" 
   title="Chat on WhatsApp"
   style="position: fixed;
          bottom: 20px;
          right: 20px;
          z-index: 999;
          background-color: #25D366;
          border-radius: 50%;
          padding: 10px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.2);
          transition: transform 0.3s ease;">
    <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" 
         alt="WhatsApp" 
         style="width: 40px; height: 40px; display: block;">
</a>


		<footer class="footer-section align-center">
			<div class="container">
            <p>&copy; 2022 <span style="color:#ff4c4c;">DevPK.</span> All rights reserved.</p>
			</div>
		</footer>
		<!-- <a data-scroll href="#header" id="scroll-to-top"><i class="arrow_carrot-up"></i></a> -->
		<script src="js/vendor/jquery-1.12.4.min.js"></script>
		<script src="js/vendor/bootstrap.min.js"></script>
		<script src="js/vendor/tether.min.js"></script>
		<script src="js/vendor/jquery.slicknav.min.js"></script>
		<script src="js/vendor/owl.carousel.min.js"></script>
		<script src="js/vendor/smooth-scroll.min.js"></script>
		<script src="js/vendor/venobox.min.js"></script>
		<script src="js/vendor/jquery.simple-text-rotator.js"></script>
		<script src="js/vendor/wow.min.js"></script>
        <script src="js/contact.js"></script>
		<script src="js/main.js"></script>
    </body>

    <script>
const projectsPerPage = 3;
const projectGrid = document.getElementById("project-grid");
const projectCards = Array.from(projectGrid.children);
const pagination = document.getElementById("pagination");
const totalPages = Math.ceil(projectCards.length / projectsPerPage);
let currentPage = 1;

function showPage(page) {
  const start = (page - 1) * projectsPerPage;
  const end = start + projectsPerPage;

  projectCards.forEach((card, index) => {
    card.style.display = index >= start && index < end ? "block" : "none";
  });

  renderPagination(page);
}

function renderPagination(page) {
  pagination.innerHTML = "";

  // Previous Button
  const prevBtn = document.createElement("button");
  prevBtn.textContent = "Prev";
  prevBtn.disabled = page === 1;
  prevBtn.addEventListener("click", () => showPage(currentPage - 1));
  pagination.appendChild(prevBtn);

  // Page Numbers
  for (let i = 1; i <= totalPages; i++) {
    const btn = document.createElement("button");
    btn.textContent = i;
    btn.classList.toggle("active", i === page);
    btn.addEventListener("click", () => {
      currentPage = i;
      showPage(currentPage);
    });
    pagination.appendChild(btn);
  }

  // Next Button
  const nextBtn = document.createElement("button");
  nextBtn.textContent = "Next";
  nextBtn.disabled = page === totalPages;
  nextBtn.addEventListener("click", () => showPage(currentPage + 1));
  pagination.appendChild(nextBtn);

  currentPage = page;
}

// Initialize
showPage(currentPage);
</script>
</html>