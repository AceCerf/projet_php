<?php
/**Controle de validité de l'email**/
function validatorEmail($str){
    $motif='/^
    (       #bla.ble.ble@bli.blo.blo.domain
        [a-zA-Z][a-zA-Z0-9]*    #bla
        ([_.-][a-zA-Z0-9]+)*    #ble
        
    )@(                         # @
        [a-z][a-z0-9]*          #bli
        ([.-][a-z0-9]+)*        #blo
        \.([a-z])*)     #domain
        $/x';
    if (preg_match($motif, $str, $regs)) {
        return  $str;
    }else return NULL;  

}

/**Controle de validité du nom d'utilisateur**/
function validatorUsername($str){
    $motif='%^(?=.{5,20}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$%';
    if (preg_match($motif, $str, $regs)) {
        return  $str;
    } else return NULL; 
}

/**Controle de validité du password **/
function validatorPassword($str){
    //Minimum eight and maximum 100 characters, at least one uppercase letter, one lowercase letter, one number and one special character:
     $motif='%^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!\%*?&])[A-Za-z\d@!\%*?&]{8,100}$%';
     $motif='%^(?=.*[A-Za-z])(?=.*\\d)[A-Za-z\\d]{5,}$%';
     if (preg_match($motif, $str, $regs)) {
         return  $str;
     } else return NULL; 
 }
 
 function hashPassword($str){
      return password_hash($str, PASSWORD_DEFAULT);
 }
