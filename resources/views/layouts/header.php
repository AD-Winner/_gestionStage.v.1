<h1>
    <img src="../../public/img/logo.gif" alt="logo" class="" height="100px">
  </h1>
<nav class="navbar navbar-expand-lg bg-light text-white">
  <div class="container d-flex justify-content-evenly items-center">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">Menu</span>
    </button> 
    <div class="collapse navbar-collapse" id="navbarColor03">
      <ul class="navbar-nav mx-auto d-flex">
        <li class="nav-item">
          <a class="nav-link " href="?action=home"><i class="fas fa-home"></i> Accueil
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'profil')){ echo "active"; } ?>" href="?action=profil"><i class="fas fa-user"></i> Mon Profil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'depot')){ echo "active"; } ?>"  href="?action=depot"> <i class="fas fa-file-upload"></i> Dêpot</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'telechargement')){ echo "active"; } ?>" href="?action=telechargement"><i class="fas fa-file-download"></i> Téléchargement</a>
        </li>
        <li class="nav-item"> 
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'Stage.php')){ echo "active"; } ?>" href="?action=stage"><i class="fas fa-share-square"></i> Offre de Stage </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'Tableau')){ echo "active"; } ?>" href="?action=tableau"><i class="fas fa-tachometer-alt"></i> Tableau de Bord</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strstr($_SERVER['PHP_SELF'],'Contact')){ echo "active"; } ?>" href="?action=contact"><i class="fas fa-address-book"></i> Contacts</a>
        </li>
     
      </ul>
    </div>
    <style>
      ul li{
        margin-right: 25px;
      }
      .active{
        background: #007396;
        color: white;
        border-radius:10px;
      }
    </style>
  </div>
</nav>