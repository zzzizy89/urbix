<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Catalogo Urbix</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/catalogo/catalogo.css')?>" />
	</head>
	<body>
		<header>
			<h1>Urbix</h1>
		</header>
		<div class="container-items">
		<?php foreach ($productos as $producto): ?>
			<div class="item">
				<figure>
					<a href="<?php echo base_url('desc_producto?id=' . $producto['id_producto']); ?>"><img
						src="<?php echo base_url('uploads/' . $producto['imagen']); ?>"
						alt="producto"
					/></a>
				</figure>
				<div class="info-product">
					<h2><?php echo $producto['nombre']; ?></h2>
					<p class="price">$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></p>
				</div>
			</div>
			<?php endforeach; ?>
		</div>

        <script src="<?php echo base_url('assets/js/catalogo/catalogo.js')?>"></script>
	</body>
</html>
