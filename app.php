<?php
 session_start();
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['pass'];
 if (!empty($email)){
if (!empty($password)){
  include("db_conn.php");
if (mysqli_connect_error()){
die('Connect Error ('. mysqli_connect_errno() .') '
. mysqli_connect_error());
}
else{
$sql = "INSERT INTO logind (id, email,password)
values (NULL,'$email','$password')";
if ($conn->query($sql)){
  $_SESSION['email']=$email;
  header('location:app.php');

}
else{
echo "Error: ". $sql ."
". $conn->error;
}
$conn->close();
}
}
else{
echo "<script>alert('Password should not be empty!'); location.href='app.php';</script>";

die();
}
}
else{
echo "<script>alert('Email should not be empty!'); location.href='app.php';</script>";
die();
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/bf4451859d.js"></script>
    <link rel="stylesheet" href="css/index.css">
  

    <title>Movie website</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark " >
      <a class="navbar-brand" style="padding-left: 0px;" href="#" id="nav2">Weclom</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto" id="padd">
          <li class="nav-item active">
            <a class="nav-link" href="#Home" aria-eexpanded="true" aria-controls="Home" id="nav2">Home <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#latest" id="nav2" aria-eexpanded="true" aria-controls="latest" >latest Movie</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  id="nav2" href="#popular" aria-eexpanded="true" aria-controls="popular" >popular Movie</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link" id="nav2" href="#old" aria-eexpanded="true" aria-controls="old" >old Movie</a>
          </li>
          <li class="nav-item dropdown" >
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <h8 id="nav2">Dropdown</h8> 
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="Fun.php" id="nav2">Fun Movie</a>
              <a class="dropdown-item" href="Drama.html" id="nav2">Drama Movie</a>
              <a class="dropdown-item" href="Romantic.html" id="nav2">Romantic Movie</a>
              <a class="dropdown-item" href="Action.html" id="nav2">Action Movie</a>
              <a class="dropdown-item" href="Horrior.html" id="nav2">Horrior Movie</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" style="margin: auto;">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0 Mypadding" type="submit">Search</button>
        </form>
<!-- Button trigger modal -->
      <?php 
          if(isset($_SESSION['email'])){ ?>
          <form method="post" action="pro.php">
            <button type="submit" name="logout" data-toggle="modal" data-target="#exampleModal"><span class="fas fa-sign-in-alt"></span>
              logout
            </button> 
           </form> 
      <?php } else { ?>
       <button type="button"   data-toggle="modal" data-target="#exampleModal"><span class="fas fa-sign-in-alt"></span>
          login
        </button>
        <!-- Modal -->
          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          <div class="modal-body">
          <form action="app.php" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" placeholder="Enter email">
              <small id="emailHelp" class="form-text text-muted"> We will never share your email with anyone else.
              </small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Pssword</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="pass" placeholder="Password">
            </div>
            <button type="submit"  name="submit" class="btn btn-primary">Submit</button>
          </form>
                </div>
              </div>
            </div>
          </div> 
        }
         <?php  } ?>
</div>
</nav>





<div class="jumbotron" id="Home">
  <div class="container">
    <h1 class="display-4 textback" style="margin-right:70% ">Lets have fun!</h1>
    <p class="lead textback"  style="margin-right:50% ">This one of the biggest website that lets you contribut in posting your favoraite movie</p>
    <a class="btn btn-primary btn-lg " href="#" role="button">Learn more</a>
  </div> 
</div>


<div class="container" >
  <div class="row backh" id="latest">
    <div class="col" id="text2" > 
      <ol><br>
      <h1 class="font-weight-bold font-italic" > The latest three movies is :
        <li> Explosion </li>
        <li> The latest man in the earth</li>
        <li> Munna Michel </li>
      </h1>
      </ol>
    </div>
    <div class="col">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
           <img class="d-block w-100 h-20 " src="image3.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image4.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image5.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <div class="col">
      <ul><br>
        <li>1/ The Explosion :From somewhere in the Australian desert, the United Nations launches an atomic rocket on a manned moon mission, but one of the engines malfunctions. The pilot.</li>
        <li>
          2/The Last Man on Earth is Not Alone : After an attempt to wipe out cancer turned all wrong, the world has been affected by a catastrophic viral decimation. The lone survivor is Dr.
        </li>
        <li>
          3/Munna Michel :The atomic booster, however, continues on, eventually exploding in the Delta asteroid cluster. In the stress of the moment, McCleary and his wife have a breakup
        </li>
      </ul>
   </div>
  </div>
</div>
<div class="container " >
  <div class="row backh2" id="popular">
    <div class="col" id="text2" > 
      <ol><br>
      <h1 class="font-weight-bold font-italic" > The popular three movies is :
        <li> Explosion </li>
        <li> The latest man in the earth</li>
        <li> Munna Michel </li></h1></ol>
    </div>
    <div class="col">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
           <img class="d-block w-100 h-20 " src="image9.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image10.jpg" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image11.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <div class="col">
      <ul><br>
        <li>1/ The Explosion :From somewhere in the Australian desert, the United Nations launches an atomic rocket on a manned moon mission, but one of the engines malfunctions. The pilot.</li>
        <li>
          2/The Last Man on Earth is Not Alone : After an attempt to wipe out cancer turned all wrong, the world has been affected by a catastrophic viral decimation. The lone survivor is Dr.
        <li>
          3/Munna Michel :The atomic booster, however, continues on, eventually exploding in the Delta asteroid cluster. In the stress of the moment, McCleary and his wife have a breakup
        </li>
        </li>
      </ul>
   </div>
  </div>
</div>





<div class="container " >
  <div class="row backh3" id="old">
    <div class="col" id="text2" > 
      <ol><br>
      <h1 class="font-weight-bold font-italic" > The oldest three movies is :
        <li> Explosion </li>
        <li> The latest man in the earth</li>
        <li> Munna Michel </h1></li></ol>
    </div>
    <div class="col">
      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
           <img class="d-block w-100 h-20 " src="image6.jpg" alt="First slide">
         </div>
         <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image7.png" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100 h-20" src="image8.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    </div>
    <div class="col">
      <ul><br>
        <li>1/ The Explosion :From somewhere in the Australian desert, the United Nations launches an atomic rocket on a manned moon mission, but one of the engines malfunctions. The pilot.</li>
        <li>
          2/The Last Man on Earth is Not Alone : After an attempt to wipe out cancer turned all wrong, the world has been affected by a catastrophic viral decimation. The lone survivor is Dr.
        <li>
          3/Munna Michel :The atomic booster, however, continues on, eventually exploding in the Delta asteroid cluster. In the stress of the moment, McCleary and his wife have a breakup
        </li>
        </li>
      </ul>
   </div>
  </div>
</div>
<div class="container " >
  <div class="row" id="card1">
    <div class="col" >
      <h1> Our developers </h1>
    </div>
  </div>
</div>


<div class="card-deck">
  <div class="card" id="card1">
    <img class="card-img-top" src="image15.jpg" alt="Asma">
    <div class="card-body">
      <h5 class="card-title">Asma Alghamdi</h5>
      <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card" id="card1">
    <img class="card-img-top" src="imsge13.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Emma.</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
  <div class="card" id="card1">
    <img class="card-img-top" src="image14.jpg" alt="Card image cap">
    <div class="card-body">
      <h5 class="card-title">Charlotte</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
      <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
    </div>
  </div>
</div>


<div class="container " >
  <div class="row" id="card1">
    <div class="col" id="card2" >
      <!--Section: Contact v.2-->
<section class="mb-4">
    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>
    <div class="row">
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="mail.php" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="subject" class="form-control">
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Your message</label>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>
        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>San Francisco, CA 33344, USA</p>
                </li>
                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 1223456</p>
                </li>
                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>Asmaal775@gmail.com</p>
                </li>
            </ul>
        </div>
    </div>
</section>
    <div/>
  <div/>
<div/>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>