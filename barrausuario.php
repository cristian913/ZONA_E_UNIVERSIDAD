<header class="conte_header"   method="POST">
  
     <nav class="conte_barra">
        
        <a href="index_session.php?id=<?php echo $id?>" class="ZONAE nav-link"><i class="fa-solid fa-house" style="color: #ffffff;
        margin-right: 10px;"></i>ZONA E</a>

        <button class="nav-toggle" aria-label="Abrir menú">
          <i class="fas fa-bars"></i>
        </button>
        <ul class="nav-menu">
          <li class="menu-item">
            <a href="arrienda.php" class="nav-menu-link nav-link">Arrienda</a>
          </li>
          <li class="menu-item">
            <a href="publicar.php?id=<?php echo $id?>" class="nav-menu-link nav-link">Publicar</a>
          </li>
            <li class="menu-item">
            <a href="ayuda.php" class="nav-menu-link nav-link">ayuda</a>
          </li>
          <li class="menu-item">
          

            <a href="perfil.php?id=<?php echo $id?>" class="nav-menu-link nav-link nav-menu-link_active"
              ><?php echo $usuario['nombre'];?>   <?php echo $usuario['apellido'];?></a
            >
          </li>
     
          

        </ul>
        
      </nav>
   
     
    </header>