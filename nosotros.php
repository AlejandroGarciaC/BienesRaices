<?php

    require 'includes/funciones.php';
    incluirTemplate('header')
    
?>


    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>
        <div class="contenedor contenedor-nosotros">
            <div class="imagen-nosotros">
                <pictures>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="sobre nosotros">
                </pictures>
            </div>
            <div class="nosotros-contenido">
                <h3>25 Años de Experiencia</h3>
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

        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="icono seguridad" loading="lazy">
                <h3>seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipis
                    icing elit. Vel temporibus repellendus, est, labore sed
                    </p>
            </div>
            <div class="icono">
                <img src="build/img/icono2.svg" alt="icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipis
                    icing elit. Vel temporibus repellendus, est, labore sed
                    </p>
            </div>
            <div class="icono">
                <img src="build/img/icono3.svg" alt="icono Tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur, adipis
                    icing elit. Vel temporibus repellendus, est, labore sed
                   </p>
            </div>
        </div>
    </section>

    <?php
    incluirTemplate('footer');
    ?>