<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    



  </head>
  <body>
  <form  method="POST" action="studentController.php" >
  <label for="mail">Username :</label>
        <input
          type="email"
          name="mymail"
          id="mail"
          placeholder=" YourEmail@gmail.com"
        />
        <br /><br />

        <label for="password">password :</label>
        <input
          type="password"
          name="mypassword"
          id="password"
          placeholder=" Enter Your Password"
        />
        <br /><br />
      <input type="submit" value="Login" name="login" />


</form>
  </body>
</html>