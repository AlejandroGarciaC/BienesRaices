<?php

    require 'includes/funciones.php';
    incluirTemplate('header')
    
?>


    <main class="contenedor seccion contenido-centrado">
        <h1>Entrada del Blog</h1>

        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img src="build/img/destacada2.jpg" alt="imagen propiedad">
        </picture>
        <p class="meta">Escrito el: <span>22/12/2022</span> por: <span>Admin</span></p>
        <div class="resumen-propiedad">
        

            <p>Lorem ipsum dolor, sit amet consectetur adipisi
                cing elit. Quasi sequi dolorem labore pariatur corrupti c
                rporis, aliquam, saepe tenetur eius nesciunt sed doloremq
                ue eveniet iure sunt doloribus fugiat vitae animi! Sint!
                Lorem ipsum dolor, sit amet consectetur adipisi
                cing elit. Quasi sequi dolorem labore pariatur corrupti c
                rporis, aliquam, saepe tenetur eius nesciunt sed doloremq
                ue eveniet iure sunt doloribus fugiat vitae animi! Sint!
                Lorem ipsum dolor, sit amet consectetur adipisi
                cing elit. Quasi sequi dolorem labore pariatur corrupti c
                rporis, aliquam, saepe tenetur eius nesciunt sed doloremq
                ue eveniet iure sunt doloribus fugiat vitae animi! Sint!</p>

                <p>Lorem ipsum dolor, sit amet consectetur adipisi
                    cing elit. Quasi sequi dolorem labore pariatur corrupti c
                    rporis, aliquam, saepe tenetur eius nesciunt sed doloremq
                    ue eveniet iure sunt doloribus fugiat vitae animi! Sint!</p>
        </div>
    </main>

    <?php
    incluirTemplate('footer');
    ?>