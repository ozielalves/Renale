<?php
    $page_title = "Notícias";
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Renale</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'> -->
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,400i,500,500i,600" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
    
    <style>
        hr {
            margin-top: 0rem;
            margin-bottom: 2rem;
            border: 0;
            border-top: 1px solid #fbfbfb;
        }
    </style>
    
  </head>

  <body id="noticias">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="img/logos/logoRenale.png" class="img-fluid"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
           <li class="nav-item">
              <a class="nav-link js-scroll-trigger active" href="http://renalenefrologia-com.umbler.net/index.php">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://renalenefrologia-com.umbler.net/quemSomos.php">Quem Somos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://renalenefrologia-com.umbler.net/noticias.php">Notícas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="http://renalenefrologia-com.umbler.net/tratamentos.php">Tratamentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contato">Contato</a>
            </li>
            <!--<li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">PT</a>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- "Álbuns" de Notícias -->
    <section id="gradiente">

        <div class="container-fluid" >
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8"> <!-- id="rins-horizontal" -->
                    <!--<div class="row" >-->
                        <!-- PHP Code Here -->
                        <?php
                            echo "<div class='container-fluid' id='about'>";
                                echo "<div class='row'>";
                                    echo "<div></div>";
                                    echo "<div class='col-lg-1'>";
                                        echo "<h2>NOTÍCIAS</h2>";
                                    echo "</div>";
                                        echo "<div class='col-12'>";
                                            echo "<hr></hr>";
                                        echo "</div>";
                                echo "</div>";
                                echo "<div class='row align-items-center'>";
                            /*echo "<div class='col-lg-12'>";
                                echo "<h1 class='page-header'>{$page_title}</h1>";
                            echo "</div>";*/
                             
                            $access_token="EAAfdsSLw7TQBABQerXaLZAkU6u430ZAmsFtjvvyZBZAaK7ZAPErTymeZCIyEhHXZAypxuEZCiMvFS8D9uZCxaNfBcr32XfMpmJrzRZBo8NaZCCSSdWtbOQJ28xZAFNRHACJkx7xmkR4nz54dcz7rEWPk9b1ysI1pOZCacpq64CIAliZAJxzAZDZD";
                             
                            $fields="id,name,description,link,cover_photo,count";
                            $fb_page_id = "291918208110431";
                             
                            $json_link = "https://graph.facebook.com/v2.8/{$fb_page_id}/albums?fields={$fields}&access_token={$access_token}";
                           
                            $json = file_get_contents($json_link);
                             
                            $obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);
                             
                            $album_count = count($obj['data']);
                            
                                    echo "<div class='col-lg-12'>";
                                        echo "<div class='row'>";
            
                            for($x=0; $x<$album_count; $x++){
                                
                                $id = isset($obj['data'][$x]['id']) ? $obj['data'][$x]['id'] : "";
                                $name = isset($obj['data'][$x]['name']) ? $obj['data'][$x]['name'] : "";
                                $url_name=urlencode($name);
                                $description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";
                                $link = isset($obj['data'][$x]['link']) ? $obj['data'][$x]['link'] : ""; // Link para o album
                             
                                $cover_photo = isset($obj['data'][$x]['cover_photo']['id']) ? $obj['data'][$x]['cover_photo']['id'] : "";
                                $cover_photo_name = isset($obj['data'][$x]['cover_photo']['name']) ? $obj['data'][$x]['cover_photo']['name'] : "";
                                
                                // use this for older access tokens:
                                // $cover_photo = isset($obj['data'][$x]['cover_photo']) ? $obj['data'][$x]['cover_photo'] : "";
                                 
                                $count = isset($obj['data'][$x]['count']) ? $obj['data'][$x]['count'] : "";
                             
                                // if you want to exclude an album, just add the name on the if statement
                                if(
                                    $name!="Profile Pictures" &&
                                    $name!="Cover Photos" &&
                                    $name!="Timeline Photos"
                                ){
                             
                                    $show_pictures_link = "album.php?album_id={$id}&album_name={$name}";
                                    
                                    //Parte modificada
                                    $json_link_2 = "https://graph.facebook.com/v2.3/{$id}/photos?fields=source,images,link,name&access_token={$access_token}";
                                    $json_2 = file_get_contents($json_link_2);
                                    $obj_2 = json_decode($json_2, true, 512, JSON_BIGINT_AS_STRING);
                                    $photo_count = count($obj_2['data']);
                                        
                                    for($y=0; $y<$photo_count; $y++){
                                            
                                        $source = isset($obj_2['data'][$y]['images'][0]['source']) ? $obj_2['data'][$y]['images'][0]['source'] : ""; //hd image
                                        $name_2 = isset($obj_2['data'][$y]['name']) ? $obj_2['data'][$y]['name'] : ""; // Caption
                                        $image_id = isset($obj_2['data'][$y]['id']) ? $obj_2['data'][$y]['id'] : "";
                                        $link_2 = isset($obj_2['data'][$y]['link']) ? $obj_2['data'][$y]['link'] : ""; // Link direto p/foto
                                        
                                            
                                        echo "<div class='col-md-3 col-lg-3 col-sm-3 col-12'>";
                                            echo "<div class='card'>";
                                                echo "<a href='{$source}'>";
                                                    echo "<img class='card-img-top' src='https://graph.facebook.com/v2.3/{$image_id}/picture?access_token={$access_token}' alt=''>";
                                                echo "</a>";
                                                echo "<div class='card-body'>";
                                                    echo "<div style='height:41px; overflow-y: hidden;'>";
                                                        echo "<h3 style='font-size:19px;'>";
                                                            echo "<a class='card-title'style='color:#363636' href='{$show_pictures_link}'>{$name}</a>";
                                                        echo "</h3>";
                                                    echo "</div>";
                                                    echo "<p class='card-text'>";
                                                        echo "<div><a href='{$link_2}' style='color:#3C357C;' target='_blank'>Veja no Facebook</a></div>";
                                                        echo "<div style='height:70px; overflow-y: hidden;'>";
                                                            echo $name_2;
                                                        echo "</div>";
                                                    echo "</p>";                                        
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</div>";
                                    }    
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    
    <!-- Gradiente -->
    </section>
    <section id="equipe">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8"></div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </section>
    
    <!-- Contact Form -->
      <section  id="contato">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4 col-sm-12 col-12 ">
                <div class="row">
                  <div class="col-lg-12 col-12 col-contato">
                    <div class="jumbotron jumbotron-azul">
                          <h3 class="fale-conosco">FALE <br> CONOSCO!</h3>
                          <div class="row">
                            <div class="col-lg-1 col-1">
                              <img src="img/icones/localization.png" alt="">
                            </div>
                            <div class="col-lg-11 col-11">
                              <p>Av. Antônio Basílio, 4117 - Nova Descoberta, Natal - RN, 59056-425</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-1 col-1">
                              <img src="img/icones/localization.png" alt="">
                            </div>
                            <div class="col-lg-11 col-11">
                              <p>renale@gmail.com</p>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-1 col-1">
                              <img src="img/icones/localization.png" alt="">
                            </div>
                            <div class="col-lg-11 col-11">
                              <p>(84) 8374-3423</p>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 col-12 col-contato">
                    <div class="jumbotron">
                        <form id="contact-form" action="send_form.php" method="post">
                            <div class="input-group mb-3">
                                <label for="name"></label>
                                <input name="name" type="text" class="form-control"  placeholder="Nome"  aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
    
                            <div class="input-group mb-3">
                                <label for="email"></label>    
                                <input name="email" type="text" class="form-control"  placeholder="E-mail" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
    
                            <div class="input-group">
                                <label for="message"></label>
                                <div class="input-group-prepend">
                            </div>
                              <textarea name="message" class="form-control" placeholder="Escreva aqui sua mensagem" aria-label="With textarea" required></textarea>
                            </div>
                            <button id="submit" type="submit" class="btn btn-primary btn-lg btn-block">Enviar</button>
                          </div>
                        </form>
                    </div>
                  </div>
            </div>
            
            <!-- Mapa -->
            <div class="col-lg-8 col-sm-12 col-12 col-contato ">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3969.2705176174754!2d-35.20207974951936!3d-5.817418758966796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2ff2c0dbfff75%3A0x334153be2963e540!2sRenale!5e0!3m2!1spt-BR!2sbr!4v1543509683035" width="100%" height="100%" border="0px" frameborder="0" style="border:0px 0px" allowfullscreen></iframe>
            </div>

        </div>

    </section>


    <!-- Footer -->
    <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-2 footMargin"></div>
          <div class="col-lg-2 col-12 footMargin text-center">
            <img src="img/logos/logoFooter.png" class="img-fluid">
            <br>
            <br>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
          </div>
          <div class="col-lg-1 footMargin"></div>

          <div class="col-lg-2 col-12 footMargin">
            <ul>
              <a href="#"><li>Início</li></a>
              <a href="#"><li>Quem Somos</li></a>
              <a href="#"><li>Notícias</li></a>
              <a href="#"><li>Tratamentos</li></a>
              <br>
              <!--<a href="#"><li>Idioma PT</li></a>-->

            </ul>
          </div>
          <div class="col-lg-2 col-12 footMargin">
            <p>
              Av. Antônio Basílio, 4117  <br>Nova Descoberta, Natal RN, 59056-425
            </p>
            <p>renale@gmail.com</p>
            <p>(84) 3345-2600</p>
          </div>
          <div class="col-lg-3 col-12 footMargin">
            <ul>
              <p>Horário  de <br> Funcionameto</p>

              <li>seg:  06:00 – 20:00</li>
              <li>ter:  06:00 – 17:00</li>
              <li>qua:  06:00 – 20:00</li>
              <li>qui:  06:00 – 17:00</li>
              <li>sex:  06:00 – 20:00</li>
              <li>sab:  06:00 – 17:00</li>
              <!--<li>dom:  06:00 – 17:00</li>-->
            </ul>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

  </body>

</html>

