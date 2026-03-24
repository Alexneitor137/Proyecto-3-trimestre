<?php include 'header.php'; ?>

<main>
    <div style="text-align: center; padding: 60px 20px; background-color: white; border-bottom: 1px solid #eaeaea; box-shadow: 0 4px 10px rgba(0,0,0,0.05); margin-bottom: 40px;">
        <h1 style="font-size: 2.8em; color: #333; margin-bottom: 15px;"><?php echo __('hero_titulo'); ?> <span style="color: #e67e22;">Chefika</span></h1>
        <p style="font-size: 1.2em; color: #666; max-width: 700px; margin: 0 auto 30px auto; line-height: 1.6;">
            <?php echo __('hero_desc'); ?>
        </p>
        <a href="reserva.php" class="btn-reservar" style="text-decoration: none; display: inline-block; padding: 15px 40px; font-size: 1.1em; border-radius: 30px;"><?php echo __('btn_reserva'); ?></a>
    </div>
    
    <div class="chef">
        <img src="imgs/chef.jpg" alt="Chef">
    </div>
    
    <div class="carousel">
        <h2 style="font-size: 2em; color: #333; margin-bottom: 20px;"><?php echo __('titulo_platos'); ?></h2>
        
        <div id="plato-nombre" style="font-size: 1.5em; font-weight: bold; color: #e67e22; margin-bottom: 15px; height: 1.6em;">
            Paella de la casa
        </div>

        <div class="carousel-container">
            <img class="slide active" src="imgs/plato1.jpg" alt="Paella de la casa" data-nombre="Paella de la casa">
            <img class="slide" src="imgs/plato2.jpg" alt="Hamburguesa Gourmet" data-nombre="Hamburguesa Gourmet">
            <img class="slide" src="imgs/plato3.jpg" alt="Tarta de queso casera" data-nombre="Tarta de queso casera">
        </div>
        <div class="carousel-buttons">
            <button onclick="prevSlide()">❮</button>
            <button onclick="nextSlide()">❯</button>
        </div>
        
        <script>
            let index = 0;
            const slides = document.querySelectorAll(".slide");
            const nombreDisplay = document.getElementById("plato-nombre");

            function showSlide(i) {
                slides.forEach(slide => slide.classList.remove("active"));
                slides[i].classList.add("active");
                // Actualizamos el texto con el atributo alt o data-nombre
                nombreDisplay.innerText = slides[i].alt;
            }

            function nextSlide() {
                index = (index + 1) % slides.length;
                showSlide(index);
            }

            function prevSlide() {
                index = (index - 1 + slides.length) % slides.length;
                showSlide(index);
            }

            setInterval(nextSlide, 4000); 
        </script>
        
        <div class="menu-button" style="margin-top: 50px; margin-bottom: 50px;">
            <a href="menu.php" style="border-radius: 30px; font-weight: bold; background-color: #333; padding: 15px 30px; color: white; text-decoration: none;"><?php echo __('btn_ver_menu'); ?></a>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>