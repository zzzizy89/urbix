<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<title>Descripcion</title>
		<link rel="stylesheet" href="<?php echo base_url('assets/css/desc_producto.css');?>">
	</head>
	<body>
		<header>
			<h1>Urbix</h1>
		</header>
	
        <?php if (isset($_GET['id'])): // Verifica si se proporciona un ID de producto en la URL ?>
            <?php $productId = $_GET['id']; // Obtiene el ID del producto desde la URL ?>

            <?php foreach ($productos as $producto): // Itera sobre los productos para encontrar el producto específico por ID ?>
                <?php if ($producto['id_producto'] == $productId): // Compara el ID del producto ?>
		<div class="container-title"><?php echo $producto['nombre']; ?></div>

	
		<main>
			<div class="container-img">
				<img
					src="<?php echo base_url('uploads/' . $producto['imagen']); ?>"
					alt="imagen-producto"
				/>
			</div>
			<div class="container-info-product">
				<div class="container-price">
					<span>$<?php echo number_format($producto['precio'], 2, ',', '.'); ?></span>
					<i class="fa-solid fa-angle-right"></i>
				</div>

				<div class="container-details-product">
					<div class="form-group">
						<label for="colour">Color</label>
						<select name="colour" id="colour">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="rojo">Rojo</option>
							<option value="blanco">Blanco</option>
							<option value="beige">Beige</option>
						</select>
					</div>
					<div class="form-group">
						<label for="size">Tipo</label>
						<select name="size" id="size">
							<option disabled selected value="">
								Escoge una opción
							</option>
							<option value="40">Membrana</option>
							<option value="42">Mecanico</option>
							<option value="43">Hibrido</option>
							
						</select>
					</div>
					<button class="btn-clean">Limpiar</button>
				</div>

				<div class="container-add-cart">
					<div class="container-quantity">
						<input
							type="number"
							placeholder="1"
							value="1"
							min="1"
							class="input-quantity"
						/>
						<div class="btn-increment-decrement">
							<i class="fa-solid fa-chevron-up" id="increment"></i>
							<i class="fa-solid fa-chevron-down" id="decrement"></i>
						</div>
					</div>
					<button class="btn-add-to-cart">
						<i class="fa-solid fa-plus"></i>
						Añadir al carrito
					</button>
				</div>

				<div class="container-description">
					<div class="title-description">
						<h4>Descripción</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-description">
						<p>
							Los mejores teclados.
						</p>
					</div>
				</div>

				<div class="container-additional-information">
					<div class="title-additional-information">
						<h4>Información adicional</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-additional-information hidden">
						<p>-----------</p>
					</div>
				</div>

				<div class="container-reviews">
					<div class="title-reviews">
						<h4>Reseñas</h4>
						<i class="fa-solid fa-chevron-down"></i>
					</div>
					<div class="text-reviews hidden">
						<p>-----------</p>
					</div>
				</div>

				<div class="container-social">
					<span>Compartir</span>
					<div class="container-buttons-social">
						<a href="#"><i class="fa-solid fa-envelope"></i></a>
						<a href="#"><i class="fa-brands fa-facebook"></i></a>
						<a href="#"><i class="fa-brands fa-twitter"></i></a>
						<a href="#"><i class="fa-brands fa-instagram"></i></a>
						<a href="#"><i class="fa-brands fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</main>
		<?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Producto no encontrado.</p>
        <?php endif; ?>
		<section class="container-related-products">
			<h2>Productos Relacionados</h2>
			<div class="card-list-products">
				<div class="card">
					<div class="card-img">
						<img
							src="<?php echo base_url('assets/img/carrousel/gris.jpg')?>"
							alt="producto-1"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							<h3>Mouse</h3>
							<p class="category">Mouse</p>
						</div>
						<div class="price">$85.00</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="<?php echo base_url('assets/img/carrousel/head.jpg')?>"
							alt="producto-2"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							<h3>Headphones</h3>
							<p class="category">Headphones</p>
						</div>
						<div class="price">$255.00</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="<?php echo base_url('assets/img/carrousel/parlantes.jpg')?>"
							alt="producto-3"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							<h3>Parlantes</h3>
							<p class="category">Speakers</p>
						</div>
						<div class="price">$105.00</div>
					</div>
				</div>
				<div class="card">
					<div class="card-img">
						<img
							src="<?php echo base_url('assets/img/carrousel/mic.jpg')?>"
							alt="producto-4"
						/>
					</div>
					<div class="info-card">
						<div class="text-product">
							<h3>Microfono</h3>
							<p class="category">mic</p>
						</div>
						<div class="price">$250.00</div>
					</div>
				</div>
			</div>
		</section>

		<footer>
			<p>Footer</p>
		</footer>

		<script
			src="https://kit.fontawesome.com/81581fb069.js"
			crossorigin="anonymous"
		></script>
		<script src="<?php echo base_url('assets/js/desc_producto.js');?>"></script>
	</body>
</html>