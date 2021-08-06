<?php
require_once('../../generico/librerias/nusoap/lib/nusoap.php');  // libreria
date_default_timezone_set('America/Guayaquil'); // zona horaria
$miURL = 'http://localhost/plusambiete2/servicios/servicio/servicio.php?wsdl';
$server = new soap_server(); // instanciar el web service
$server->register('loginUsuario',
        array('usuario'=>'xsd:string','password'=>'xsd:string'),
        array('return'=>'xsd:array'),
        $ns, false,
      'rpc',
      'literal',
      'Documentacion de consultaJson'); 
$server->register('obtenerOrdenesTrabajo');
$server->register('obtenerDesechosOrdenes');
$server->register('guardarCantidadesODT');
function loginUsuario($usuario,$password) {
	$cn = mysqli_connect("localhost","root","","plus");
        $perfil = 6;
	$hoy = date('Y-m-d');
                        $consulta = "select * from usuario u
                                        LEFT OUTER JOIN usuario_persona up on up.usup_id = u.usup_id and up.usup_eliminado = false and up.usup_estado = 11
                                        LEFT OUTER JOIN usuario_perfil uf on uf.usu_id = u.usu_id and uf.upef_eliminado = false and uf.upef_estado = 11
                                        LEFT OUTER JOIN persona ps on ps.per_id = up.per_id and ps.per_eliminado = false and ps.per_estado = 11
                                        LEFT OUTER JOIN perfil p on p.pef_id = uf.pef_id and p.pef_eliminado = false and p.pef_estado = 11
                                        LEFT OUTER JOIN perfil_tipo pt on pt.tpef_id = p.tpef_id and pt.tpef_id = false and pt.tpef_id = 11
                                        where up.usup_login = '$usuario' and up.usup_clave= '$password' and p.pef_id = $perfil ";
                        //echo $consulta;
                        $resConsul = mysqli_query($cn, $consulta);
                        $contar = mysqli_num_rows($resConsul);
                        if($contar == 1){
                            $resultado = mysqli_fetch_assoc($resConsul);
                            $arreglo[] = array(
                                 'usu_id' => $resultado['usu_id'],
                                 'usup_id' => $resultado['usup_id'],
                                 'pef_id' => $resultado['pef_id'],
                                 'tpef_id' => $resultado['tpef_id'],
                                 'per_nombres' => $resultado['per_nombres'],
                                 'per_identificacion' => $resultado['per_identificacion']
                             );
                        }
        return $arreglo;               
	
}
function obtenerOrdenesTrabajo($per_identificador){
    $cn = mysqli_connect("localhost","root","","plus");
                        $consulta = "select odt.sol_id, odt.sol_manifiesto, cli.cli_nombre, tec.tec_nombre, concat(cdt.cdt_nombres,' ',cdt.cdt_apellidos) as conductor from odt"
                                    ." left outer join clientes cli on cli.cli_id = odt.cli_id and cli.cli_eliminado = false and cli.cli_estado = 11 "
                                    ." left outer join tecnico tec on tec.tec_id = odt.tec_id and tec.tec_eliminado = false and tec.tec_estado = 11 "
                                    ." left outer join condutor cdt on cdt.cdt_id = odt.cdt_id and cdt.cdt_eliminado = false and cdt.cdt_estado = 11 "
                                    ." where cdt.cdt_cedula = '$per_identificador'; ";
                        //echo $consulta;
                        $resConsul = mysqli_query($cn, $consulta);
                      
                           while ($res = mysqli_fetch_assoc($resConsul)) {
                               $arreglo[] = array(
                                 'sol_id' => $res['sol_id'],
                                 'sol_manifiesto' => $res['sol_manifiesto'],
                                 'cli_nombre' => $res['cli_nombre'],
                                 'tec_nombre' => $res['tec_nombre'],
                                 'conductor' => $res['conductor'],
                             );
                           }
//               
        return $arreglo;     
        
	
}

function obtenerDesechosOrdenes ($sol_id){
    $cn = mysqli_connect("localhost","root","","plus");
                        $consulta = "select sol_id, dsc.dsol_id, des_codigo, des_descripcion,cat.cat_nombre as cat_unidad, catp.cat_nombre as cat_peligroso, dsol_cantidad from detalle_odt dsc" 
                                        ." left outer join desechos d on d.des_id = dsc.des_id"  
                                        ." left outer join catalogo cat on cat.cat_id = d.cat_unidad"
                                        ." left outer join catalogo catp on catp.cat_id = d.cat_peligroso"
                                        ." where sol_id =".$sol_id;
                        //echo $consulta;
                        $resConsul = mysqli_query($cn, $consulta);
                      
                           while ($res = mysqli_fetch_assoc($resConsul)) {
                               $arreglo[] = array(
                                 'sol_id' => $res['sol_id'],
                                 'dsol_id'=> $res['dsol_id'],
                                 'des_codigo' => $res['des_codigo'],
                                 'des_descripcion' => $res['des_descripcion'],
                                 'cat_unidad' => $res['cat_unidad'],
                                 'cat_peligroso' => $res['cat_peligroso'],
                                 'dsol_cantidad' => $res['dsol_cantidad'],
                             );
                           }
//               
        return $arreglo;     
}
function guardarCantidadesODT ($dson_cantidad,$dsol_id){
    $cn = mysqli_connect("localhost","root","","plus");
                        $consulta = "update detalle_odt set dsol_cantidad = $dson_cantidad where dsol_id = $dsol_id";
                        //echo $consulta;
                        $resConsul = mysqli_query($cn, $consulta);
                        if ($resConsul){
                            $res = 1;
                        }
//               
        return $res;     
}
    $HTTP_RAW_POST_DATA = file_get_contents( 'php://input' );

$server->service($HTTP_RAW_POST_DATA);

?>