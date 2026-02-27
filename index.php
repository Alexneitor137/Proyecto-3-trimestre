<!DOCTYPE html>
<html lang="es"> <!--  Luego añadir el php de cambio de idioma de la pagina -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chefika</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            align-items: center;
        }
        header img {
            height: 40px;
            margin-right: 10px;
        }
        header h1 {
            margin: 0;
        }
        h1 {
            text-align: center;
            margin-top: 50px;
        }
        p {
            text-align: center;
            font-size: 1.2em;
            color: #555;
        }
        .chef {
            display: flex;
            justify-content: center;
            margin-top: 20px;
            height: 400px;
            
        }
        .carousel {
            text-align: center;
            margin-top: 40px;
        }

        .carousel-container {
            position: relative;
            width: 60%;
            margin: auto;
            overflow: hidden;
        }

        .slide {
            width: 100%;
            display: none;
            border-radius: 10px;
        }

        .active {
            display: block;
        }

        .carousel-buttons {
            margin-top: 10px;
        }

        .carousel-buttons button {
            padding: 10px 20px;
            font-size: 18px;
            cursor: pointer;
        }
        .menu-button {
            text-align: center;
            margin: 40px 0;
        }

        .menu-button a {
            background-color: #333;
            color: white;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
        }

        .menu-button a:hover {
            background-color: #555;
        }
        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div>
        <header>
            <img src="../imgs/gorro-chef.png" alt="Logo" id="Logo">
            <h1>Chefika</h1>
        </header>
    </div>
    <div>
        <h1>Bienvenido a nuestro Restaurante</h1>
        <p style="text-align: center;">¡Disfruta de la mejor comida preparada por nuestros chefs expertos!</p>
    </div>
    <div class="chef">
        <img src="../imgs/chef.jpg" alt="chef">
    </div>
    <div class="carousel">
    <h2>Platos Destacados</h2>
    <div class="carousel-container">
        <img class="slide active" src="../imgs/plato1.jpg" alt="Plato 1">
        <img class="slide" src="../imgs/plato2.jpg" alt="Plato 2">
        <img class="slide" src="../imgs/plato3.jpg" alt="Plato 3">
    </div>
    <div class="carousel-buttons">
        <button onclick="prevSlide()">❮</button>
        <button onclick="nextSlide()">❯</button>
    </div>
    <script>
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
    <footer>
    <p>📍 Dirección: Calle Ficticia 123</p>
    <p>📞 Teléfono: 600 000 000</p>
    <p>📧 Email: contacto@chefika.com</p>
    <p>© 2026 Chefika - Todos los derechos reservados</p>
</footer>
</body>
</html>