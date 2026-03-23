<?php include 'header.php'; ?>

<main>
    <div>
        <h1 style="text-align: center; margin-top: 50px;">Bienvenido a nuestro Restaurante</h1>
        <p style="text-align: center; font-size: 1.2em; color: #555;">¡Disfruta de la mejor comida preparada por nuestros chefs expertos!</p>
    </div>
    
    <div class="chef">
        <img src="imgs/chef.jpg" alt="chef" style="max-width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
    </div>
    
    <div class="carousel">
        <h2>Platos Destacados</h2>
        <div class="carousel-container">
            <img class="slide active" src="imgs/plato1.jpg" alt="Plato 1">
            <img class="slide" src="imgs/plato2.jpg" alt="Plato 2">
            <img class="slide" src="imgs/plato3.jpg" alt="Plato 3">
        </div>
        <div class="carousel-buttons">
            <button onclick="prevSlide()">❮</button>
            <button onclick="nextSlide()">❯</button>
        </div>
        
        <script>
            // Mantenemos tu JavaScript intacto porque funcionaba genial
            let index = 0;
            const slides = document.querySelectorAll(".slide");

            function showSlide(i) {
                slides.forEach(slide => slide.classList.remove("active"));
                slides[i].classList.add("active");
            }

            function nextSlide() {
                index = (index + 1) % slides.length;
                showSlide(index);
            }

            function prevSlide() {
                index = (index - 1 + slides.length) % slides.length;
                showSlide(index);
            }
        </script>
        
        <div class="menu-button">
            <a href="menu.php">Ver Nuestro Menú</a>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>