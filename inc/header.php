
<script src="js\voice.js"></script>
<header>
<nav class="navbar navbar-expand-lg bg-info  ">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Sois Mes Yeux</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              
             
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" onmouseenter="verif(this)">
                    Menu
                </a>
                
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <?php
                  foreach($categories as $categorie){
                    print'<li><a class="dropdown-item" href="shop.php">'.$categorie['nom'].'</a></li>';
                  }
                  ?>
                  
                  </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="shop.php" id="Boutique" onmouseenter="verif(this)">Boutique</a>
                  </li>
                <?php
                if (isset($_SESSION['nom'])){
                     print
                      '<li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="profile.php"> 
                    </svg>Profile</a>';
                    if (isset($_SESSION['panier'])&& is_array($_SESSION ['panier'][3])){
                      print'
                      <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="panier.php" id="Panier" onmouseenter="verif(this)">Panier<spam class="text-danger" >('.count($_SESSION ['panier'][3]).')</spam></a>
                  </li>
                      
                      ';
                    }
                     }else
                  {
                    print' <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="inscrir.php" id="SeConnecter" onmouseenter="verif(this)">Se Connecter</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="register.php" id="Register" onmouseenter="verif(this)">Register</a>
                  </li>';
                  }
                

                ?>
                
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" >
              <button class="btn btn-outline-success" type="submit" id="Rechercher" onmouseenter="verif(this)" >Rechercher</button>
            </form>
            <?php
                if (isset($_SESSION['nom'])){
                  print
                  '<a href="deconnexion.php "class="btn btn-primary">Déconnexion</a>';
                }
           ?>
          </div>
        </div>
      </nav>
              </header>
              </html>