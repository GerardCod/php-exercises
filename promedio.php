<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form action="promedio.php" method="POST">
    <label for="quantity">Cantidad de alumnos</label>
    <input id="quantity" type="text" name="quantity" required />
    <button type="submit">Enviar</button>
  </form>

  <?php
    if (isset($_POST['quantity'])) {
      $form = '<form action="promedio.php" method="POST">';
      $quantity = $_POST['quantity'];

      setcookie('quantity', $quantity, time() + (60 * 3));

      for ($i = 1; $i <= $quantity; $i++) {
        $form .= '<br/>';
        $form .= 'Alumno '.$i;
        $form .= '<input name="student'.$i.'" type="number" required />';
      }

      $form .= '<br/>';
      $form .= '<button type="submit">Enviar</button>';
      $form .= '</form>';
      echo $form;
    }
  ?>

  <?php
    if (isset($_COOKIE['quantity'])) {
      $flag = true;
      $quantity = $_COOKIE['quantity'];

      for ($i = 1; $i <= $quantity; $i++) {
        if (!isset($_POST['student'.$i])) {
          $flag = false;
          break;
        }
      }

      if ($flag) {
        $acum = 0;
        for ($i = 1; $i <= $quantity; $i++) {
          $acum += $_POST['student'.$i];
        }

        $average = $acum / $quantity;
        echo 'El promedio es: '. $average;
      }
    }
  ?>
</html>