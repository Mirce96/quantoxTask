<?php
require "db.php";

session_start();

if(empty($_SESSION['login']))
{
    $_SESSION['msg'] = 'Please login';
    header("Location: login.php");
}
else
{
  $param = "%{$_POST['search-param']}%";

  $sql = "SELECT * FROM users_info WHERE email LIKE ? OR name LIKE ?";
  $stmt = $conn->prepare($sql);

  $stmt->bind_param('ss', $param, $param);
  $stmt->execute();

  $result = $stmt->get_result();
  $users = [];
  if($result->num_rows === 0)
  {
    $_SESSION['search-error'] = 'User not found.';
  }
  else
  {
    while($row = $result->fetch_assoc())
    {
      $users[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'email' => $row['email']
      ];
    }
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8"/>
  <title>PHP Backend Developer Test</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  <link rel="stylesheet" href="css/style.css"/>
  <link rel="stylesheet" href="css/main.css" />
</head>
<body>
    <a class="back_btn" type="button" href="index.php">Back</a>
    <a class="logo_btn" href="logout.php">Logout</a>

<div class="result_section">
<div class="container">
<div class="row">
  <table class="table table-bordered">
    <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Email</th>
    </tr>
    </thead>
    <tbody>
    <?php if(empty($users)): ?>
    <h1><?= $_SESSION['search-error'] ?></h1>
    <?php $_SESSION['search-error'] = null; endif; ?>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['name'] ?></td>
            <td><?= $user['email'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
</div>

</body>
</html>
