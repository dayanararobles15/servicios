<!DOCTYPE html>
<html>
<body>

    <?php
    if (isset($_SESSION['nom'])) {
        echo "<h1> Bienvenid@ " . $_SESSION['nom'] . "</h1>";
    ?>

    <h2>PRODUCTOS</h2>
    
    <table id="dg" title="Productos" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/tabla.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="id" width="50">ID</th>
                <th field="nombre" width="50">PRODUCTO</th>
                <th field="ciudad" width="50">BODEGA</th>
                <th field="cantidad" width="50">CANTIDAD</th>
                <th field="estado" width="50">ESTADO</th>
                <th field="precio" width="50">PRECIO</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editarProductoVender()">VENDER</a>
  
    <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-search" plain="true" onclick="buscarUser()">BUSCAR PRODUCTO</a>
     
</div>
    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
        <input type="hidden" id="op" name="op" value="insertarProducto">
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:130%">
            </div>
            <div style="margin-bottom:10px">
                <input class="easyui-textbox" name="precio" required="true" label="Precio:" style="width:130%">
            </div>
        </form>
    </div>
    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardarProducto()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>    
    

    <div id="dlgm" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="ff" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
            <input type="hidden" id="op" name="op" value="updateProducto">
            <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" readonly="readonly"   label="Codigo:" style="width:130%">
            </div>  
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" readonly="readonly"   label="Nombre:" style="width:130%">
            </div> 
            <div style="margin-bottom:10px">
                <input class="easyui-textbox" name="precio" required="true" label="Precio:" style="width:130%">
            </div>
                       
        </form>
    </div>

    <div id="dlgm1" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="ff1" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
            <input type="hidden" id="op" name="op" value="updateProductoCantidad">
            <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" readonly="readonly"   label="Codigo:" style="width:130%">
            </div>  
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" readonly="readonly"   label="Nombre:" style="width:130%">
            </div> 
            
            <div style="margin-bottom:10px">
                <input name="ciudad" class="easyui-textbox" readonly="readonly"   label="Nombre:" style="width:130%">
            </div> 
            
            <div style="margin-bottom:10px">
                <input class="easyui-textbox" name="cantidad" required="true" label="Cantidad:" style="width:130%">
            </div>
                       
        </form>
    </div>
    <div id="dlgm2" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="ff2" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
            <input type="hidden" id="op" name="op" value="updateProductoVender">
            <div style="margin-bottom:10px">
                <input name="id" class="easyui-textbox" readonly="readonly"   label="Codigo:" style="width:130%">
            </div>  
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" readonly="readonly"   label="Nombre:" style="width:130%">
            </div> 
            
            <div style="margin-bottom:10px">
                <input name="ciudad" class="easyui-textbox" readonly="readonly"   label="Nombre:" style="width:130%">
            </div> 
            
            <div style="margin-bottom:10px">
                <input class="easyui-textbox" name="cantidad" required="true" label="Cantidad:" style="width:130%">
            </div>
                       
        </form>
    </div>

    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdateEst()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm').dialog('close')" style="width:90px">Cancel</a>
    </div>
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdateEst1()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm1').dialog('close')" style="width:90px">Cancel</a>
    </div>
    
    <div id="dlg-buttons">
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="submitFormUpdateEst2()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlgm2').dialog('close')" style="width:90px">Cancel</a>
    </div>
      <br>

      <div id="d" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin'">
    <form id="formBuscar" method="post" novalidate style="margin:0;padding:20px 50px" action="models/acceso.php">
    <input type="hidden" id="op" name="op" value="buscarProducto">
           <h3>Buscar Producto por Nombre</h3>
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>            
        </form> 
        
    <div>
        <a href="#" class="easyui-linkbutton c6" iconCls="icon-search" onclick="buscar()" style="width:90px">Buscar</a>
    </div>
    </div>
  

    <script type="text/javascript">        
        function newProducto(){
            $('#dlg').dialog('open').dialog('center').dialog('setTitle','CREAR PRODUCTO');
            $('#fm').form('clear');
        }
        

        function editarProducto() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm').dialog('open').dialog('center').dialog('setTitle', 'EDITAR PRODUCTO');
                $('#ff').form('load', row);
            }
        }

        function editarProductoCantidad() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm1').dialog('open').dialog('center').dialog('setTitle', 'EDITAR PRODUCTO');
                $('#ff1').form('load', row);
            }
        }

        function editarProductoVender() {
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlgm2').dialog('open').dialog('center').dialog('setTitle', 'EDITAR PRODUCTO');
                $('#ff2').form('load', row);
            }
        }

        function eliminarProducto() {
            var row = $("#dg").datagrid("getSelected");
            if (row) {
                $.messager.confirm("Confirm", "Desea eliminar el producto", function(r) {
                    if (r) {
                        $.post("models/serviciosProducto.php", {
                            op: "eliminarProducto",
                            ID_PRO: row["ID_PRO"]
                        }, function(res) {
                            if (!res.success) {
                                $('#dg').datagrid('reload');
                                $.messager.alert('correcto', "Se elimino correctamente");
                            } else {
                                $('#dg').datagrid('reload');
                                $.messager.show({
                                    title: 'incorrecto',
                                    msg: result.errorMsg
                                });
                            }

                        }, "json");
                    }
                $('#dg').datagrid('reload');
                });
            }
        }

        function buscar(){
            $('#formBuscar').form("submit");
            $('#formBuscar').form({
                success:function(data){
                    console.log(data);
                    if(data.indexOf("DATOS")!==-1){
                    }else{
                        $.messager.alert("DATOS",data,"DATOS");
                    }
                }
            });
        }

        function buscarUser(){
            $('#d').dialog('open').dialog('center').dialog('setTitle','Buscar');
            $('#formBuscar').form('load');
            url = 'save_user.php';
        }

        function guardarProducto(){
                $('#fm').form('submit');
                $('#fm').form({
                    success: function(data){
                       $("#dg").datagrid("reload");
                       $('#dlg').dialog('close');
                        console.log(data);
                        if(data.indexOf("Error")!==-1){
                        $.messager.alert('Error', data,'error');
                    }else{
                        $.messager.alert('GUARDADO CORRECTAMENTE',data);
                    }
                }
                });
                document.getElementById("fm").reset();
            }

            function submitFormUpdateEst() {
            $('#ff').form('submit');
            $('#ff').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgm').dialog('close');
                    console.log(data);
                    if (data.indexOf("error") != -1) {
                        $.messager.alert("error", data, "error");

                    } else {
                        $.messager.alert("Satisfactoriamente", data);
                    }
                }
            });
        }
        function submitFormUpdateEst1() {
            $('#ff1').form('submit');
            $('#ff1').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgm1').dialog('close');
                    console.log(data);
                    if (data.indexOf("error") != -1) {
                        $.messager.alert("error", data, "error");

                    } else {
                        $.messager.alert("Satisfactoriamente", data);
                    }
                }
            });
        }
        function submitFormUpdateEst2() {
            $('#ff2').form('submit');
            $('#ff2').form({
                success: function(data) {
                    $("#dg").datagrid("reload")
                    $('#dlgm2').dialog('close');
                    console.log(data);
                    if (data.indexOf("error") != -1) {
                        $.messager.alert("error", data, "error");

                    } else {
                        $.messager.alert("Satisfactoriamente", data);
                    }
                }
            });
        }
    </script>
    <?php
    } else {
    ?>

        <h1>Es necesario iniciar sesión para acceder a esta pestaña</h1>
    <?php
    } ?>
</body>

</html>