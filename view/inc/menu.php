	<nav class="navbar navbar-default navbar-trans navbar-expand-lg fixed-top">
    <div class="container">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <a   href="index.php?page=ctrl_home&op=list" class="navbar-brand text-brand">EGO<span class="color-b">CARS</span></a>
      <button type="button" class="btn btn-link nav-search navbar-toggle-box-collapse d-md-none" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button>
     
      <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=ctrl_home&op=list">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=ctrl_shop&op=list_shop">Shop</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" href="index.php?page=controller_cars&op=list">Cars</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=property-grid">Property</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=blog">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=aboutus">About Us</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Pages
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?page=property">Property Single</a>
              <a class="dropdown-item" href="index.php?page=blog-single">Blog Single</a>
              <a class="dropdown-item active" href="index.php?page=agents-grid">Agents Grid</a>
              <a class="dropdown-item" href="index.php?page=agent-single">Agent Single</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=contact">Contact</a>
          </li>
        </ul>
      </div>
      <!-- <button type="button" class="btn btn-b-n navbar-toggle-box-collapse d-none d-md-block" data-toggle="collapse"
        data-target="#navbarTogglerDemo01" aria-expanded="false">
        <span class="fa fa-search" aria-hidden="true"></span>
      </button> -->
    </div>
    
    <div class="div_search" style="display: inline; width: 40%; height: 5%;">
            <select class="search_brand" placeholder="City"></select>
            <select class="search_category"></select>
            <input type="text" id="autocom" autocomplete="off" placeholder="City" style="width: 30%;"/>
            <div id="search_auto"></div>
            <input type="button" value="search" id="search-btn" class="btna third" style="display: inline;"/>
            
    </div>
    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
        <ul class="navbar-nav">
        <li class="nav-item">
            <div class="login-item">
            <a class="nav-link" href="index.php?page=ctrl_login&op=list">Login</a>
            </div>
          </li>
          <li class="nav-item">
            <div class="logout-button nav-link"></div>  
          </li>
          <li class="nav-item">
            <div class="log-icon"></div>  <!--esto es la foto -->
          </li>
          <li class="nav-item">
            <div id="des_inf_user"></div>
          </li>
          <li></li>
          <li class="nav-item">
            <div class="cart-shop"></div>
          </li>
        </ul>
    </div>
    <div class="navbar-collapse collapse justify-content-center" id="navbarDefault">
    
  </div>
  </nav>
