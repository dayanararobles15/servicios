<!DOCTYPE html>
<html>
<head>
    <title> Proyecto Web </title>
    <meta charset="UTF-8">
    <link rel=StyleSheet href="css/login.css" typr="text/css">
    <link rel=StyleSheet href="css/template.css" typr="text/css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.9.7/themes/icon.css">

</head>
<body>
   
    <div class="right-column">
        <form method="post" class="loginForm" novalidate action="models/validar.php" >
            <h1>INICIAR SESION</h1>
                <div  class="easyui-panel" style="width:400px;padding:50px 60px">
                    <div style="margin-bottom:20px">
                        <input  id="usuario" name="usuario" class="easyui-textbox" prompt="Username" required="true" style="width:100%;height:34px;padding:10px;">
                    </div> 
                    <div style="margin-bottom:20px">
                        <input name="contraseña" id="contraseña" class="easyui-passwordbox" prompt="Password" required="true" iconWidth="28" style="width:100%;height:34px;padding:10px;">
                    </div>
                    <div class="alert" style="margin-bottom:20px;text-align: center;">
                    </div>
                    <div style="text-align: center;">
                        <input value="Ingresar" type="submit" class="easyui-linkbutton" style="width:120px;height:34px;padding:10px">
                    </div>
                </div>
        </form>
    </div>
</body>
</html>