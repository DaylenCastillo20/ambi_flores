<main class="main">

<br><br>
    <h3 style="text-align: center;">Bienvenid@s, por favor inicie sesión</h3>

    <br><br>
      <form action="../controller/registrarUsuario.php" method="POST" style="width: 50%; margin: auto;">
        <div class="mb-3">
            <label>Nombre Usuario:</label>
            <input type="text" name="nombres" required>
         </div>
         <div class="mb-3">
    <label>Password:</label>
    <input type="password" name="password" required>
 </div>
 <div class="mb-3">
    <label>Estado:</label>
    <select name="estado">
        <option value="activo">Activo</option>
        <option value="inactivo">Inactivo</option>
    </select>
 </div>
    <button type="submit" class="btn btn-primary w-100">Registrar</button>
</form>




  <br><br>
  <br><br>
  <br><br>
 
 

  </main>