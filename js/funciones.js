/*
1.-función javascript que permita  enviar el formulario de login ubicado en index.hml hacia home.html. 
Lo anterior en el evento onclick del botón. 
*/
function enviarFormulario(){
    location.href="home.html";
}
function cargarContenido(){
    //Obtenemos el contenido de caja de texto
    var nombre = document.getElementById('txt_nombre').value;
    var edad = document.getElementById('txt_edad').value;
    var peso_actual = document.getElementById('txt_peso_actual').value;
    //Enviamos el nombre al archivo prueba_contenido.php
    loadContent('prueba_contenido.php','cnt_contenido','p_nombre='+nombre+'&p_edad='+edad+'&p_peso_actual='+peso_actual);
}
function setLike(id_post){

   loadContent('likes.inc.php','cnt_post_likes_'+id_post,'id='+id_post);

}