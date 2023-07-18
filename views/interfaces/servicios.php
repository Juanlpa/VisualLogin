<?php
$usuario = $_SESSION['usuario'];
if (isset($_SESSION['usuario'])) {
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.16/themes/default/easyui.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.16/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.16/themes/color.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.16/demo/demo.css">
        <script type="text/javascript" src="jquery-easyui-1.10.16/jquery.min.js"></script>
        <script type="text/javascript" src="jquery-easyui-1.10.16/jquery.easyui.min.js"></script>
        <link rel="stylesheet" href="/css/stylelogin.css" type="text/css">
        <title>Servicios</title>
    </head>
    <body>

        <h2>CUARTO SOFTWARE</h2>
<div class=centrar>
        <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:700px;height:250px"
                url="../models/seleccionar.php"
                toolbar="#toolbar" pagination="true"
                rownumbers="true" fitColumns="true" singleSelect="true">
            <thead>
                <tr>
                    <th field="cedula" width="50">CEDULA</th>
                    <th field="nombre" width="50">NOMBRE</th>
                    <th field="apellido" width="50">APELLIDO</th>
                    <th field="telefono" width="50">TELEFONO</th>
                    <th field="edad" width="50">EDAD</th>
                </tr>
            </thead>
        </table>

        <div id="toolbar">
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Est</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Eliminar Estudiante</a>
            <a href="/fpdf/Reporte.php" target="_blank" iconCls="icon-print" class="easyui-linkbutton"  plain="true">Reporte</a>
        </div>

        <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
            <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
                <h3>Informacion Estudiante</h3>
                <div style="margin-bottom:10px">
                    <input name="cedula" class="easyui-textbox" required="true" label="cedula" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="nombre" class="easyui-textbox" required="true" label="nombre" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="apellido" class="easyui-textbox" required="true" label="apellido" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="telefono" class="easyui-textbox" required="true" label="telefono" style="width:100%">
                </div>
                <div style="margin-bottom:10px">
                    <input name="edad" class="easyui-textbox" required="true" label="edad" style="width:100%">
                </div>

            </form>
        </div>
        <div id="dlg-buttons">
            <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancel</a>
        </div>

</div>
        <script type="text/javascript">
            var url;
            function newUser(){
                var cedula = $('#cedula').val();
                $('#dlg').dialog('open').dialog('center').dialog('setTitle','Nevo Estudiante');
                $('#fm').form('clear');
                url = '../models/insertar.php';
            }

            function editUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $('#dlg').dialog('open').dialog('center').dialog('setTitle','Editar Estudiante');
                    $('#fm').form('load',row);
                    url = 'models/editar.php?id='+row.cedula;
                }
            }


            function saveUser(){
                $('#fm').form('submit',{
                    url: url,
                    iframe: false,
                    onSubmit: function(){
                        return $(this).form('validate');
                    },
                    success: function(result){
                        var result = eval('('+result+')');
                        if (result.errorMsg){
                            $.messager.show({
                                title: 'Error',
                                msg: result.errorMsg
                            });
                        } else {
                            $('#dlg').dialog('close'); 
                            $('#dg').datagrid('reload');    
                        }
                    }
                });
            }
            function destroyUser(){
                var row = $('#dg').datagrid('getSelected');
                if (row){
                    $.messager.confirm('Confirmar','Estas seguro que vas a eliminar el Estudiante?',function(r){
                        if (r){
                            $.post('models/eliminar.php',{cedula:row.cedula},function(result){
                                if (result.success){
                                    $('#dg').datagrid('reload');  
                                } else {
                                    $.messager.show({  
                                        title: 'Correcto',
                                        msg: 'Se elimino'
                                    });
                                    $('#dg').datagrid('reload');
                                }
                            },'json');
                        }
                    });
                }
            }
        </script>
    </body>
    </html>
    <?php
} else {
    header("location:../index.php");
    exit;
}
?>