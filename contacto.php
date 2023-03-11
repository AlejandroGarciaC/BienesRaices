<?php

    require 'includes/funciones.php';
    incluirTemplate('header')
    
?>


    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpeg" type="image/jpeg">
            <img src="build/img/destacada3.jpeg" alt="imagen contacto" loading="lazy" >
        </picture>

        <h2>Llene el Formulario de Contacto</h2>

        <form class="formulario">
            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">Nombre</label>
                <input id="nombre" type="text" placeholder="Nombre">

                <label for="email">Email</label>
                <input id="email" type="email" placeholder="Email">

                <label for="telefono">Telefono</label>
                <input id="telefono" type="tel" placeholder="Telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" ></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion Sobre la Propiedad</legend>

                <label for="vendecompra">Vende o Compra</label>
                <select name="vendecompra" id="vendecompra">
                    <option value="" disabled selected>--Seleccione--</option>
                    <option value="Compra">Compra</option>
                    <option value="Vende">Vende</option>
                </select>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input id="presupuesto" type="number" placeholder="Precio o Presupuesto">
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="contacto" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input type="radio" name="contacto" id="contactar-email">
                </div>

                <p>Si eligio telefono elija la fecha y hora para ser contactado.</p>
                <label for="fecha">Fecha</label>
                <input id="fecha" type="date" >

                <label for="Hora">Hora</label>
                <input id="Hora" type="time" min="09:00" max="18:00">
            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </main>

    <?php
    incluirTemplate('footer');
    ?>