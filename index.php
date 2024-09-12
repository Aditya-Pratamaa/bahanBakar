<link rel="stylesheet" href="style.css">
<div class="form-container">
    <form method="post" action="aksi.php">
        <label>Masukkan jumlah liter :</label>
        <input type="text" name="jumlah" required><br>
        <label>Pilih tipe bahan bakar : </label>
        <select name="jenis">
            <option value="Shell Super">Shell Super</option>
            <option value="Shell V-Power">Shell V-Power</option>
            <option value="Shell V-Power Diesel">Shell V-Power Diesel</option>
            <option value="Shell V-Power Nitro">Shell V-Power Nitro</option>
        </select><br>
        <input type="submit" name="submit" value="Beli">
    </form>
</div>
