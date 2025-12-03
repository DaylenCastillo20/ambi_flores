<?php include 'header.php'; ?>

<main class="main">

    <!-- Page Title -->
    <div class="page-title light-background">
      <div class="container">
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Inicio</a></li>
            <li class="current">Carrito</li>
          </ol>
        </nav>
        <h1>Carrito</h1>
      </div>
    </div><!-- End Page Title -->

    <!-- Cart Section -->
    <section id="cart" class="cart section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">

          <!-- LEFT COLUMN: CART ITEMS -->
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <div class="cart-items">

              <!-- HEADER -->
              <div class="cart-header d-none d-lg-block">
                <div class="row align-items-center">
                  <div class="col-lg-6">
                    <h5>Producto</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Precio</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Cantidad</h5>
                  </div>
                  <div class="col-lg-2 text-center">
                    <h5>Total</h5>
                  </div>
                </div>
              </div>

              <!-- AQUÍ SE INSERTAN AUTOMÁTICAMENTE LOS PRODUCTOS -->
              <div id="cart-items-container"></div>

              <div class="cart-actions mt-4">
                <div class="row">

                  <div class="col-lg-6 mb-3 mb-lg-0">
                    <div class="coupon-form">
                      <div class="input-group">
                        <input type="text" class="form-control" placeholder="Código de cupón">
                        <button class="btn btn-outline-accent" type="button">Aplicar</button>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6 text-md-end">
                    <button class="btn btn-outline-heading me-2" id="update-cart-btn">
                      <i class="bi bi-arrow-clockwise"></i> Actualizar
                    </button>
                    <button class="btn btn-outline-remove" id="clear-cart-btn">
                      <i class="bi bi-trash"></i> Vaciar carrito
                    </button>
                  </div>

                </div>
              </div>

            </div>
          </div>

          <!-- RIGHT COLUMN: SUMMARY -->
          <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <div class="cart-summary">
              <h4 class="summary-title">Resumen</h4>

              <div class="summary-item">
                <span class="summary-label">Subtotal</span>
                <span class="summary-value" id="summary-subtotal">$0.00</span>
              </div>

              <div class="summary-item">
                <span class="summary-label">Envío</span>
                <span class="summary-value">$0.00</span>
              </div>

              <div class="summary-item">
                <span class="summary-label">Impuestos</span>
                <span class="summary-value">$0.00</span>
              </div>

              <div class="summary-total">
                <span class="summary-label">Total</span>
                <span class="summary-value" id="summary-total">$0.00</span>
              </div>

              <div class="checkout-button">
                <a href="#" class="btn btn-accent w-100">
                  Proceder al pago <i class="bi bi-arrow-right"></i>
                </a>
              </div>

              <div class="continue-shopping">
                <a href="productos.php" class="btn btn-link w-100">
                  <i class="bi bi-arrow-left"></i> Seguir comprando
                </a>
              </div>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Cart Section -->

</main>


<script>
document.addEventListener("DOMContentLoaded", function() {

  const container = document.getElementById("cart-items-container");
  let cart = JSON.parse(localStorage.getItem("cart")) || [];

  if (cart.length === 0) {
    container.innerHTML = "<p>No hay productos en el carrito.</p>";
    return;
  }

  cart.forEach(product => {
    const item = 
      <div class="cart-item">
        <div class="row align-items-center">
          
          <div class="col-lg-6 col-12">
            <div class="product-info d-flex align-items-center">
              <div class="product-image">
                <img src="${product.image}" class="img-fluid">
              </div>
              <div class="product-details">
                <h6 class="product-title">${product.title}</h6>
                <button class="remove-item"><i class="bi bi-trash"></i> Remove</button>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-12 text-center">
            <div class="price-tag"><span>${product.price}</span></div>
          </div>

          <div class="col-lg-2 col-12 text-center">
            <div class="quantity-selector">
              <input type="number" class="quantity-input" value="1">
            </div>
          </div>

          <div class="col-lg-2 col-12 text-center">
            <div class="item-total"><span>${product.price}</span></div>
          </div>

        </div>
      </div>
    ;
    container.innerHTML += item;
  });
});
</script>
<?php include 'footer.php'; ?>