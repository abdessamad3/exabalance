<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <a class="navbar-brand" href="#">
    <img src="asset/siof_logo.png" width="70" height="60" alt="">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item <?= ($_GET['action'] == null || $_GET['action'] == 'list_pesse') ? 'active' : ''?>">
        <a class="nav-link " href=".">Pesse</a>
      </li>
      <!--li class="nav-item <?= ($_GET['action'] == 'list_utilisateur' ) ? 'active' : ''  ?>">
         <a class="nav-link " href=".?action=list_utilisateur">utilisateur</a>
      </li-->
      <li class="nav-item <?= ($_GET['action'] == 'list_client' ) ? 'active' : ''  ?>">
        <a class="nav-link " href=".?action=list_client">client</a>
      </li>
      <li class="nav-item <?= ($_GET['action'] == 'list_produit' ) ? 'active' : ''  ?>">
          <a class="nav-link " href=".?action=list_article">produit</a>
      </li>
      <li class="nav-item <?= ($_GET['action'] == 'list_fournisseur' ) ? 'active' : ''  ?>">
        <a class="nav-link " href=".?action=list_fournisseur">fournisseur</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link"  href=".?action=logout">logout</a>
      </li>
    </ul>
  </div>
</nav>
</div>



