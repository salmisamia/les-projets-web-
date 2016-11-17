
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>RACINAUTO - Login</title>
   <style type="text/css">
   .container-form-login {width:270px; margin: 100px auto; height:150px;padding:20px;border-radius:2px;border:5px solid #e5e5e5;box-shadow: -2px 2px 1px #bbb;}
   .container-form-login h1 {font-size: 20pt;text-transform: uppercase;font-family: arial;color:#000;margin:5px;margin-left:0;padding: 0;letter-spacing: -2px;}
   input.field {border:1px solid #aaa; background:#fff;width:150px;height:25px;margin:2px;padding: 0 2px;}
   label {text-transform: uppercase;font-family: arial;font-size: 9pt;color:#000;}
   .btn {margin:10px 10px 0 0;background:#eee;padding: 5px 20px;color:#000;border:0;cursor:pointer;float:right;}
   </style>
 </head>
 <body>
  <div class="container-form-login">
   <h1>Login</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="username">Utilisateur: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
     <input class="field" type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Mot de passe:&nbsp;&nbsp;&nbsp;</label>
     <input class="field" type="password" size="20" id="passowrd" name="password"/>
     <br/>
     <input type="submit" value="Login" class="btn"/>
   </form>
 </div>
 </body>
</html>

  