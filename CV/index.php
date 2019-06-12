<?php
    $database_host = 'localhost';
    $database_port = '3306';
    $database_dbname = 'connectedCV';
    $database_user = 'root';
    $database_password = 'Yugioh2013*';
    $database_charset = 'UTF8';
    $database_options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    $pdo = new PDO(
        'mysql:host=' . $database_host . 
        ';port=' . $database_port . 
        ';dbname=' . $database_dbname . 
        ';charset=' . $database_charset, 
        $database_user,
        $database_password,
        $database_options
    );
?>


<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV FEYDIT Rémi</title>
    <meta name="description" content="Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skils and experience."/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/aos.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="styles/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body id="top">
    <header>
      <div class="profile-page sidebar-collapse">
        <nav class="navbar navbar-expand-lg fixed-top navbar-transparent bg-primary" color-on-scroll="400">
          <div class="container">
            <div class="navbar-translate"><a class="navbar-brand" href="#" rel="tooltip"><b>rfeydit</b>.com</a>
              <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-bar bar1"></span><span class="navbar-toggler-bar bar2"></span><span class="navbar-toggler-bar bar3"></span></button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
              <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#about">À propos de moi</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#skill">Compétences</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#experience">Expérience professionelle</a></li>
                <li class="nav-item"><a class="nav-link smooth-scroll" href="#contact">Contact</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <div class="page-content">
      <div>
<div class="profile-page">
    <?php
    $query = $pdo->prepare('SELECT * FROM Admin');
    $query->execute();
    $admins = $query->fetchAll();
    foreach ($admins as $admin)
    {
      $dateString= $admin['birthDate'];
      $age = round(((time()-strtotime($dateString))/(3600*24*365.25))-0.5)
    ?>
  <div class="wrapper">
    <div class="page-header page-header-small" filter-color="green">
      <div class="page-header-image" data-parallax="true" style="background-image: url('images/fondHeader.jpg');"></div>
      <div class="container">
        <div class="content-center">
          <div class="cc-profile-image"><a href="#"><img src="./images/photo.jpg" alt="Image"/></a></div>
          <div class="h2 title"><?php ?></div>
          <p class="category text-white">Développeur logiciel</p><a class="btn btn-primary smooth-scroll mr-2" href="#contact" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Contactez moi</a><a class="btn btn-primary" href="#" data-aos="zoom-in" data-aos-anchor="data-aos-anchor">Télécharger CV</a>
        </div>
      </div>
      <div class="section">
        <div class="container">
          <div class="button-container">
            <a class="btn btn-default btn-round btn-lg btn-icon" href="<?php echo $admin['gitLink']?>" target= _blank rel="tooltip" title="" data-original-title="Suivez moi sur GitHub !"><i class="fa fa-github"></i></a>
            <a class="btn btn-default btn-round btn-lg btn-icon" href="<?php echo $admin['linkedinLink']?>" target= _blank rel="tooltip" title="" data-original-title="Suivez moi sur LinkedIn !"><i class="fa fa-linkedin"></i></a>
          </div> 
        </div>
      </div>
    </div>
  </div>
</div>
<div class="section" id="about">
  <div class="container">
    <div class="card" data-aos="fade-up" data-aos-offset="10">
      <div class="row">
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">À propos de moi :</div>
            <p>Je suis un étudiant en informatique en 1er année chez Ynov Informatique</p>
          </div>
        </div>
        <div class="col-lg-6 col-md-12">
          <div class="card-body">
            <div class="h4 mt-0 title">Information Basique</div>
            <div class="row">
              <div class="col-sm-4"><strong class="text-uppercase">Âge :</strong></div>
              <div class="col-sm-8"><?php echo $age ?></div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Email :</strong></div>
              <div class="col-sm-8"><?php echo $admin['mail'] ?></div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Téléphone :</strong></div>
              <div class="col-sm-8"><?php echo $admin['telephoneNumber'] ?> </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Adresse :</strong></div>
              <div class="col-sm-8"><?php echo $admin['address']. ' ' . $admin['postalCode']. ' ' .$admin['city'] ?> </div>
            </div>
            <div class="row mt-3">
              <div class="col-sm-4"><strong class="text-uppercase">Langue :</strong></div>
              <div class="col-sm-8"><?php echo $admin['languages'] ?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <?php }?>
<div class="section" id="skill">
  <div class="container">
    <div class="h4 text-center mb-4 title">Compétences</div>
    <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
      <div class="card-body">
      <?php
        $query = $pdo->prepare('SELECT * FROM Skills');
        $query->execute();
        $skills = $query->fetchAll();
        $compteur=0;
        foreach ($skills as $skill)
        {?>
        <?php
        if($compteur%2 == 0){ ?>
            <div class="row">
              <div class="col-md-6">
                <div class="progress-container progress-primary">
                  <span class="progress-badge"><?php echo $skill['skillName']?></span>
                  <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill['level']?>%;"></div><span class="progress-value"><?php echo $skill['level']?>%</span>
              </div>
                </div>
              </div>
              <?php
            }
        if($compteur%2 == 1){?>
              <div class="col-md-6">
                <div class="progress-container progress-primary">
                    <span class="progress-badge"><?php echo $skill['skillName']?></span>
                    <div class="progress">
                <div class="progress-bar progress-bar-primary" data-aos="progress-full" data-aos-offset="10" data-aos-duration="2000" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $skill['level']?>%;"></div><span class="progress-value"><?php echo $skill['level']?>%</span>
              </div>
              </div>
            </div>
          </div>
          <?php }
          $compteur +=1;
        } ?>
<!-- End section skill--> 
        </div>
      </div>
    </div>
</div>

<!-- Start section experience -->
<div class="section" id="experience">
  <div class="container cc-experience">
    <div class="h4 text-center mb-4 title">Expérience professionelle</div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-experience-header">
            <p>March 2016 - Present</p>
            <div class="h5">CreativeM</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Front End Developer</div>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
<!-- End Section experience -->
    </div>
   </div>
  </div>
</div>
<div class="section">
  <div class="container cc-education">
    <div class="h4 text-center mb-4 title">Education</div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2013 - 2015</p>
            <div class="h5">Master's Degree</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Master of Information Technology</div>
            <p class="category">University of Computer Science</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2013 - 2015</p>
            <div class="h5">Master's Degree</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Master of Information Technology</div>
            <p class="category">University of Computer Science</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="card">
      <div class="row">
        <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body cc-education-header">
            <p>2009 - 2013</p>
            <div class="h5">Bachelor's Degree</div>
          </div>
        </div>
        <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
          <div class="card-body">
            <div class="h5">Bachelor of Computer Science</div>
            <p class="category">University of Computer Science</p>
            <p>Euismod massa scelerisque suspendisse fermentum habitant vitae ullamcorper magna quam iaculis, tristique sapien taciti mollis interdum sagittis libero nunc inceptos tellus, hendrerit vel eleifend primis lectus quisque cubilia sed mauris. Lacinia porta vestibulum diam integer quisque eros pulvinar curae, curabitur feugiat arcu vivamus parturient aliquet laoreet at, eu etiam pretium molestie ultricies sollicitudin dui.</p>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
<div class="section" id="contact">
  <div class="cc-contact-information" style="background-image: url('images/fondContact.jpg');">
    <div class="container">
      <div class="cc-contact">
        <div class="row">
          <div class="col-md-9">
            <div class="card mb-0" data-aos="zoom-in">
              <div class="h4 text-center title">Contact Me</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="card-body">
                    <form action="https://formspree.io/your@email.com" method="POST">
                      <div class="p pb-3"><strong>Feel free to contact me </strong></div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-user-circle"></i></span>
                            <input class="form-control" type="text" name="name" placeholder="Name" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-file-text"></i></span>
                            <input class="form-control" type="text" name="Subject" placeholder="Subject" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="input-group"><span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input class="form-control" type="email" name="_replyto" placeholder="E-mail" required="required"/>
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col">
                          <div class="form-group">
                            <textarea class="form-control" name="message" placeholder="Your Message" required="required"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col">
                          <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card-body">
                    <p class="mb-0"><strong>Address </strong></p>
                    <p class="pb-2">140, City Center, New York, U.S.A</p>
                    <p class="mb-0"><strong>Phone</strong></p>
                    <p class="pb-2">+1718-111-0011</p>
                    <p class="mb-0"><strong>Email</strong></p>
                    <p>anthony@company.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div></div>
    </div>
    <footer class="footer">
      <div class="container text-center">
        <a class="cc-twitter btn btn-link " href="#"><i class="fa fa-github fa-2x " aria-hidden="true"></i></a>
        <a class="cc-google-plus btn btn-link" href="#"><i class="fa fa-linkedin fa-2x" aria-hidden="true"></i></a>
      </div>
      <div class="h4 title text-center">Rémi Feydit</div>
      <div class="text-center text-muted">
        <p>&copy; Creative CV. All rights reserved.<br>Design - <a class="credit" href="https://templateflip.com" target="_blank">TemplateFlip</a></p>
      </div>
    </footer>
    <script src="js/core/jquery.3.2.1.min.js"></script>
    <script src="js/core/popper.min.js"></script>
    <script src="js/core/bootstrap.min.js"></script>
    <script src="js/now-ui-kit.js?v=1.1.0"></script>
    <script src="js/aos.js"></script>
    <script src="scripts/main.js"></script>
  </body>
</html>