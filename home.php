<?php 
ini_set("display_errors",1);
session_start();
//Evaluación: Verificamos si hay sesión iniciada, sino, redireccionamos.
if(!isset($_SESSION['ses_validado'])){
    header("Location:index.html");
}
$var_id_usuario = $_SESSION['ses_id_usuario'];
//Incluimos la clase Post
include('clases/Post.class.php');
//Instanciamos la clase Post



//Incluimos la clase Publicidad
include('clases/Publicidad.class.php');
//Instanciamos la clase Publicidad
$obj_publicidad = new Publicidad();
//Obtenemos el número de avisos
$cantidad_avisos = $obj_publicidad->obtenerNumeroAvisos();

?>
<html>
    <head>
        <link href="css/home.css" rel="stylesheet">
        <script language="javascript" src="scripts/jquery-3.3.1.min.js"></script>
<script language="javascript" src="scripts/load_content.js"></script>
<script language="javascript" src="js/funciones.js"></script>
    </head>
    <body>
       
        <div id="cnt_top">
            <!-- d. Opciones en contenedor superior en el costado derecho-->
            <!-- c.Logo de facebook y caja de texto de búsqueda en costado superior derecho-->
            <div id="cnt_top_left">
                <img src="img/facebook.png" class="imgAlignTop">
                <input type="text" id="txt_search" placeholder="Buscar">
            </div>
            <div id="cnt_top_right">
                <div id="cnt_top_right_name" class="topRightElements"><?php echo $_SESSION["ses_nombre"]?></div>
                <div id="cnt_top_right_home" class="topRightElements">Inicio</div>
                <div id="cnt_top_right_search_friends" class="topRightElements">Buscar Amigos</div>
                <div id="cnt_top_right_1" class="topRightElements"><img src="img/top1.png" ></div>
                <div id="cnt_top_right_2" class="topRightElements"><img src="img/top2.png"></div>
                <div id="cnt_top_right_3" class="topRightElements"><img src="img/top3.png"></div>
                <div id="cnt_top_right_4" class="topRightElements"><img src="img/top4.png"></div>
                <div id="cnt_top_right_5" class="topRightElements"><img src="img/top5.png"></div>
            </div>
        </div>
        <div id="cnt_left">
            <div id="cnt_links">
                <!-- 2.Modificación de la interfaz de usuario en contenedor izquierdo de home.html para agregar opciones noticias, messenger y marketplace-->
           <div id="cnt_noticias"><img src="img/noticias.png" class="imgAlignMiddle"> Noticias </div>
           <div id="cnt_messenger"><img src="img/messenger.png" class="imgAlignMiddle"> Messenger</div>
            <div id="cnt_marketplace"><img src="img/marketplace.png"class="imgAlignMiddle"> Marketplace</div>
           </div>
            </div>
        </div>
        <div id="cnt_center">
            <div id="cnt_new_post">
                <form id="form_postear" name="form_postear" onsubmit="return false;">
                    <div class="post">
                        <textarea rows="3" class="postear" id="postear"></textarea>
                        <input type="button" value="Postear" class="postearBtn" id="btn_buscar" value="Submit">
                    </div>    
                </form>            
            </div>
            <div id="cnt_posts">
                <?php 
                    //instanciar post dentro del div para refrescar
                    $obj_post = new Post();
                    //Obtenemos el número de publicaciones
                    //Ejemplo: $variable_objeto->metodo()
                    $arrPublicacionesUsuario     = $obj_post->obtenerDatosPublicacionesUsuario($var_id_usuario);
                    $cantidad_publicaciones      = count($arrPublicacionesUsuario);
                ?>
                <!-- Estructura de post único-->
                <!-- Inicio iteración-->
                <?php for($i=0;$i<$cantidad_publicaciones;$i++){ ?>
                    <div id="cnt_post_<?php echo $i; ?>" class="post">                    
                        <!-- Fecha de publicación-->
                        <div id="cnt_post_date_<?php echo $i; ?>"><?php echo $arrPublicacionesUsuario[$i][3]?></div>
                        <!-- Contenido de publicación-->
                        <div id="cnt_post_content_<?php echo $i; ?>"><?php echo utf8_encode($arrPublicacionesUsuario[$i][1])?></div>            
                        <!-- Contenedor likes-->
                        <div id="cnt_post_likes_<?php echo $i; ?>"></div>
                        <!-- Contenedor para opciones de publicación-->
                        <div id="cnt_post_options_<?php echo $i; ?>">
                        <img src="img/like_button_gray_25x23.png" class="imgAlignMiddle" > 
                        <a href="#" onclick="setLike(<?php echo $i; ?>);">Me gusta</a>
                        </div>
                    </div>
                <?php }?>
                <!-- Fin iteración -->
            </div>
        </div>
        <div id="cnt_right">
            <div id="cnt_stories">stories</div>
            <div id="cnt_ads">
                <?php for($i=0;$i<$cantidad_avisos;$i++){  ?>
                    <div id="cnt_post_<?php echo $i; ?>" class="ad">
                    Aviso <?php echo $i?>
                    </div>
                <?php }?>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript">
    $('#btn_buscar').click(function(evento){
        $(document).ajaxStop($.unblockUI);
        var id_usuairo = '<?php echo $_SESSION['ses_id_usuario']; ?>';
        var contenido_post = $('textarea#postear').val();          
        console.log("Contenido: "+contenido_post); 
        var form_data = new FormData();
        form_data.append("id_usuario", id_usuairo);
        form_data.append("contenido_post", contenido_post);

        var url = 'clases/Postear.class.php/';
        $.ajax({
            url: url,
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function(msg) {
                console.log("FILAS AFECTADAS: "+msg);
                if(msg){ 
                    console.log("agregado");
                    //actualizar posteos
                    $("#cnt_posts").load(" #cnt_posts");
                    $('textarea#postear').val('');
                } else {
                    console.log("error");
                }
            },
            error: function() {
                alertify.error("Error");
            }
        });
    }); 
</script>