<?php
require_once('../../generico/librerias/nusoap/lib/nusoap.php');  // libreria
date_default_timezone_set('America/Guayaquil'); // zona horaria
$URL       = "http://localhost/plusambiete2/servicios/servicio/servicio.php";
$namespace = $URL . '?wsdl';
$server = new soap_server(); // instanciar el web service
$server->configureWSDL('Plusambiente', $namespace);
$server->wsdl->schemaTargetNamespace=$namespace;
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
$server->wsdl->addComplexType(
        'ObtenerUsuario',
        'complexType',
        'struct',
        'all',
        '',
          array(
		  	'usu_id'=>array('name' => 'usu_id', 'type' => 'xsd:number'),
			'usup_id'=>array('name' => 'usup_id', 'type' => 'xsd:number'),
                        'pef_id'=>array('name' => 'pef_id', 'type' => 'xsd:number'),
			'tpef_id'=>array('name' => 'tpef_id', 'type' => 'xsd:number'),
			'per_nombres'=>array('name' => 'per_nombres', 'type' => 'xsd:string'),
			'per_identificacion'=>array('name' => 'per_identificacion', 'type' => 'xsd:string'),
            )
      );
$server->wsdl->addComplexType(
      'arregloObtenerUsuario',
      'complexType',
      'array',
      'sequence',
      'http://schemas.xmlsoap.org/soap/encoding/:Array',
      array(),
      array(
        array('ref' => 'http://schemas.xmlsoap.org/soap/encoding/:arrayType',
          'wsdl:arrayType' => 'tns:ObtenerUsuario[]'
        )
      ),'tns:ObtenerUsuario');
$server->register('loginUsuario',
        array('usuario'=>'xsd:string','password'=>'xsd:string'),
        array('return'=>'tns:arregloObtenerUsuario'),
        $ns, false,
        'rpc',
        'literal',
        'Documentacion de conulta de usuario'); 

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
//$server->service($HTTP_RAW_POST_DATA);
@$server->service(file_get_contents("php://input"));

?>