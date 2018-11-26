<?php
include("fun.php");
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Kabar dan Informasi Terkini">
    <meta name="author" content="bvqento">

    <title>TIMOER.Info</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/clean-blog.min.css" rel="stylesheet">

  </head>

  <body>

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2&appId=316279665647294&autoLogAppEvents=1';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand" href="index.php">TIMOER</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" target="_BLANK" href="https://www.facebook.com/TIMOERinfo-373759446502412/">Facebook Page</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('img/home-bg.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="site-heading">
              <h1>TIMOER</h1>
              <span class="subheading">Memberitakan Informasi Terkini</span>
            </div>
          </div>
        </div>
      </div>
    </header>

    <!-- Main Content -->
    <div class="container">
      <div class="row">

        <div class="col-lg-8 col-md-10 mx-auto">

            <?php
            $sql = "SELECT id, judul, deskripsi, foto_file, views, created_at FROM artikel ORDER BY created_at DESC LIMIT 5";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
                $id = $row['id'];
                $t = seo_title($row['judul']).'.html';
            ?>

              <div class="post-preview">

                <img src="http://dpm-ptsp-kabmbd.com/timoer-backend/web/images/<?= $row['foto_file'] ?>" class="img-fluid">

                <?php   
                  echo '<a href="berita/'.$id.'/'.$t.'">';
                    echo '<h2 class="post-title">';
                      echo $row['judul'];
                    echo '</h2>';
                    echo '<h3 class="post-subtitle">';
                    echo $row['deskripsi'];
                    echo '</h3>';
                  echo '</a>';
                ?>

                <p class="post-meta">Posted by
                  <a href="#">Admin</a>
                  on <?php echo tglIndo($row['created_at']); ?> &#183; <?php echo $row['views']; ?> views</p>

              </div>
              <hr>

            <?php } ?>


          <!-- Pager -->
          <div class="clearfix">
            <a class="btn btn-primary float-right" href="#">Lainnya &rarr;</a>
          </div>


        </div>


        <!-- <div class="col-lg-4 col-md-10 mx-auto"> -->

        <!-- </div> -->

      </div>
    </div>

    <hr>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">

          
          <div class="col-lg-6 col-md-10 mx-auto text-right">
            <div class="fb-page" data-href="https://www.facebook.com/timoer.info" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/timoer.info" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/timoer.info">TIMOER.info</a></blockquote></div>
          </div>
          <br>

          <div class="col-lg-6 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="nav-link" target="_BLANK" href="https://www.facebook.com/TIMOERinfo-373759446502412/">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; TIMOER.info 2018</p>
          </div>

        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/clean-blog.min.js"></script>

  </body>

</html>
