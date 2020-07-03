 <?php  

//datos del arhivo   
$nombre_archivo = $_FILES['file01']['name'];   
if (move_uploaded_file($_FILES['file01']['tmp_name'], $nombre_archivo))  

$new_nombre=$_POST["elnombre"];   
$archivo="$nombre_archivo";  

// echo "Nombre Antiguo: $archivo<br>";   

$archivo_renombrado="$new_nombre";   
rename($archivo, $archivo_renombrado);   

// echo "Nombre Nuevo: $archivo_renombrado";   
// ---------------------------------------------------------------------------------------------------------------  
// ----------Copiamos el archivo al nuevo directorio o carpeta que en este caso se llama IMAGENES------------  
// ----------Dicho directorio debe tener permisos 0777 de lo contrario no se prodra alterar sus contenidos  

$carpeta =  $_POST["directorio"];    // Carpeta en la que guardaremos nuestros archivos  

if (copy("$archivo_renombrado", "$carpeta/$archivo_renombrado"))   
{  
echo "El fichero ha sido copiado con exito";  
} else {  
echo "El fichero NO se ha podido copiar";  
}  
// ---------------------------------------------------------------------------------------------------------------  
// ----------Eliminamos el original despues de haber hecho una copia en el nuevo directorio------------  

// Eliminamos el archivo del directorio raiz  
 
?>
