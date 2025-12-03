
<?php include 'header.php'; ?>

<?php
// Arrays PHP (los de tu ejemplo)
$categoria = ["ID", "Nombre"];
$cliente = ["ID", "Nombre", "Telefono", "Direccion", "Email"];
$distribuidor = ["ID", "Nombre", "Telefono", "Email"];
$usuario = ["ID", "Nombre", "Email", "Telefono", "Contraseña", "Rol"];
$producto = ["ID", "Nombre", "ID_categoria", "Unidad", "Precio", "Estado"];
$venta = ["ID", "Fecha_venta", "Total_venta", "ID_usuario", "ID_cliente"];
$detalleVenta = ["ID", "ID_producto", "CANTIDAD", "Precio_unitario"];
$compra = ["ID", "Fecha", "Total", "ID_usuario", "ID_distribuidor"];
$modificacion = ["Nºmodificacion", "fecha_modificacion", "ID_usuario", "Descripcion"];
$modificacionProducto = ["Nºmodificacion", "ID_producto", "Campo_modificado", "Precio_anterior", "Precio_posterior"];
?>



<main class="main" id="main">
  <div class="page-title light-background">
    <div class="container">
      <nav class="breadcrumbs">
        <ol>
          <li>Home</a></li>
          <li class="current">Inventario</li>
        </ol>
      </nav>
      <h1>Inventario</h1>
    </div>
  </div>

  <!-- Botones principales -->
  <section class="admin-buttons" style="display:flex; gap:12px; flex-wrap:wrap;">
    <!-- OJO: ahora usamos JS y pasamos los arrays PHP convertidos a JSON -->
    <button onclick='generarTabla(<?php echo json_encode($producto, JSON_UNESCAPED_UNICODE); ?>)'>Mis Productos</button>
    <button onclick='generarTabla(<?php echo json_encode($venta, JSON_UNESCAPED_UNICODE); ?>)'>Mirar Ventas</button>
    <button onclick='generarTabla(<?php echo json_encode($cliente, JSON_UNESCAPED_UNICODE); ?>)'>Mis Clientes</button>
    <button onclick='generarTabla(<?php echo json_encode($distribuidor, JSON_UNESCAPED_UNICODE); ?>)'>Mis Distribuidores</button>
  </section>

  <!-- Tu modal, formularios y demás contenido pueden quedarse tal cual -->
  <!-- ... -->

</main>
<!-- Contenedor donde se mostrará la tabla generada -->
<div id="table-container" style="margin:20px 0;"></div>
<script>
// Función JS que genera la tabla en el cliente
function generarTabla(atributos) {
  const container = document.getElementById('table-container');

  // Construimos la tabla
  let html = '<table class="table table-hover" id="tablaDinámica">';
  html += '<thead><tr>';

  // Si quieres encabezados fijos, añádelos aquí:
  // html += '<th>No.</th><th>CC</th>'; // opcional

  // Encabezados dinámicos
  atributos.forEach(attr => {
    html += `<th>${escapeHtml(attr)}</th>`;
  });

  // Encabezados extra fijos (opcionales, según tu primer ejemplo)
  // html += '<th>Sueldo Base</th><th>Tipo de Empleado</th><th>Tipo de bonificación</th><th>Sueldo Total</th>';

  html += '</tr></thead><tbody>';

  // Aquí puedes llenar filas desde datos reales o dejarlas vacías
  // Ejemplo vacío:
  html += '<tr><td colspan="' + atributos.length + '" style="text-align:center; color:#888;">(Sin datos)</td></tr>';

  html += '</tbody></table>';

  container.innerHTML = html;
}

// Helper para evitar XSS en texto
function escapeHtml(text) {
  const map = { '&': '&amp;', '<': '&lt;', '>': '&gt;', '"': '&quot;', "'": '&#039;' };
  return String(text).replace(/[&<>"']/g, m => map[m]);
}

// Opcional: pinta una tabla por defecto al cargar
document.addEventListener('DOMContentLoaded', () => {
  generarTabla(<?php echo json_encode($producto, JSON_UNESCAPED_UNICODE); ?>);
});
</script>

<?php include 'footer.php'; ?>
