<header>
    <div>
        <div>

            <?php
            session_start();
            if (isset($_SESSION['nom'])) {
                if ($_SESSION['perfil'] == 'admin') { ?>

                    <nav>
                        <ul>

                            <li> <a href="index.php?action=nosotros"> Admin</a> </li>
                            <li><a href="models/logout.php"> Cerrar Sesión</a></li>
                        </ul>
                    </nav>

                <?php } else { ?>
                    <nav>
                        <ul>

                            <li> <a href="index.php?action=nosotros"> Admin</a> </li>
                            <li> <a href="index.php?action=servicios"> Productos</a> </li>
                            <li> <a href="index.php?action=contacto">Sucursales</a> </li>
                            <li><a href="models/logout.php"> Cerrar Sesión</a></li>
                        </ul>
                    </nav>
                <?php } ?>
            <?php
            } else {
            ?>

                <nav class="navegacion">
                    <ul>
                        <li> <a href="index.php?action=inicio"> Inicio</a> </li>
                        <li> <a href="index.php?action=nosotros"> Admin</a> </li>
                        <li> <a href="index.php?action=servicios"> Productos</a> </li>
                        <li> <a href="index.php?action=contacto">Sucursales</a> </li>
                    </ul>
                </nav>
            <?php } ?>
        </div>

    </div>
</header>