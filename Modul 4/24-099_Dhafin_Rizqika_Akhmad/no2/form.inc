<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <label>Nama (Surname):</label><br>
    <input type="text" name="surname" 
           value="<?php if (isset($_POST['surname'])) echo htmlspecialchars($_POST['surname']); ?>"><br><br>

    <label>Usia:</label><br>
    <input type="text" name="age"
           value="<?php if (isset($_POST['age'])) echo htmlspecialchars($_POST['age']); ?>"><br><br>

    <input type="submit" value="Kirim">
</form>