<!DOCTYPE html>
<html>
<head>
    <title>Acerca de Nosotros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #000000;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 20px;
            padding: 20px;
            text-align: center;
        }
        
        .card h2 {
            color: #333;
            margin-bottom: 10px;
        }
        
        .card p {
            color: #666;
            line-height: 1.6;
        }
        
        .card button {
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
            font-size: 16px;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }
        
        .card button:hover {
            background-color: #0056b3;
        }
        
    </style>
</head>
<body>
    <div class="card">
        <h2>Acerca de Nosotros</h2>
        <p>En KeyTech, no solo vendemos productos, creamos experiencias. Nuestro compromiso con la calidad y la satisfacción del cliente nos ha permitido ganar la confianza y lealtad de innumerables entusiastas de la tecnología y gamers apasionados. Ofrecemos una amplia gama de teclados, desde los mecánicos de respuesta táctil hasta los suaves y silenciosos de membrana, garantizando que cada usuario encuentre la opción perfecta para su estilo y preferencias.

Lo que nos distingue es nuestra dedicación implacable a la excelencia. Trabajamos incansablemente para mantenernos a la vanguardia de las últimas tendencias y avances tecnológicos en el mundo de los teclados. Nuestro compromiso con la innovación y la calidad nos ha permitido ganar la posición privilegiada de ser el número uno en el mercado.

Ya sea que busques mejorar tu experiencia de juego, optimizar tu flujo de trabajo o simplemente desees un teclado que se adapte a tu estilo, en KeyTech encontrarás soluciones que superarán tus expectativas. Únete a nosotros en nuestra misión de definir el futuro de los teclados y descubre por qué somos la elección preferida de quienes buscan lo mejor.

KeyTech: donde la tecnología y la comodidad se encuentran para ofrecerte una experiencia de teclado excepcional.</p>
<div class="btn-box btns">

<a href="<?=base_url('inicio')?>"><button type="submit" class="btn">Regresar</button></a>

</div>
    </div>
</body>
</html>
