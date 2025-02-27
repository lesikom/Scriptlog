<?php defined('SCRIPTLOG') || die("Direct access not permitted"); 

$action = isset($_GET['action']) ? safe_html($_GET['action']) : "";
$displayWall = new Wall();

try {
   
   switch ($action) {
    
      case 'detailItem':
  
         break;
         
      default:
          
         if (false === $authenticator->userAccessControl(ActionConst::DASHBOARD)) {
  
            direct_page('index.php?load=403&forbidden='.forbidden_id(), 403);
  
         } else {
  
           $displayWall->listItems($authenticator, $user_login);
  
         }
          
        break;
         
  }
     
} catch (Throwable $th) {
   
   LogError::setStatusCode(http_response_code());
   LogError::exceptionHandler($th);

} catch (AppException $e) {

   LogError::setStatusCode(http_response_code());
   LogError::exceptionHandler($e);

}
