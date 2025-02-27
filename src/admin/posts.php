<?php defined('SCRIPTLOG') || die("Direct access not permitted");

$action = isset($_GET['action']) ? htmlentities(strip_tags($_GET['action'])) : "";
$postId = isset($_GET['Id']) ? intval($_GET['Id']) : 0;
$postDao = new PostDao();
$postEvent = new PostEvent($postDao, $validator, $sanitizer);
$postApp = new PostApp($postEvent);

try {

    switch ($action) {
    
        case ActionConst::NEWPOST:
            
            if (false === $authenticator->userAccessControl()) {
    
                direct_page('index.php?load=403&forbidden='.forbidden_id(), 403);
    
            } else {
    
                if ( ( !check_integer($postId) ) && ( gettype($postId) !== "integer" ) ) {
    
                    header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request", true, 400);
                    header("Status: 400 Bad Request");
                    throw new AppException("Invalid ID data type");
    
                }
    
                if ($postId == 0) {
                
                    $postApp->insert();
                    
                } else {
    
                    direct_page('index.php?load=dashboard', 302);
                    
                }
    
            }
            
            break;
            
        case ActionConst::EDITPOST:
            
            if ( ( !check_integer($postId) ) && ( gettype($postId) !== "integer" ) ) {
    
                header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request", true, 400);
                header("Status: 400 Bad Request");
                throw new AppException("Invalid ID data type!");
    
            }
    
            if (false === $authenticator->userAccessControl()) {
    
                direct_page('index.php?load=403&forbidden='.forbidden_id(), 403);
            
            } else {
    
                if ($postDao->checkPostId($postId, $sanitizer)) {
            
                    $postApp->update((int)$postId);
                    
                } else {
                    
                   direct_page('index.php?load=404&notfound='.notfound_id(), 404);
                    
                }
    
            }
            
            break;
            
        case ActionConst::DELETEPOST:
            
            if ( ( !check_integer($postId) ) && ( gettype($postId) !== "integer") ) {
    
                header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request", true, 400);
                header("Status: 400 Bad Request");
                throw new AppException("Invalid ID data type!");
    
            }
    
            if (false === $authenticator->userAccessControl()) {
    
                direct_page('index.php?load=403&forbidden='.forbidden_id(), 403);
    
            } else {
    
                if ($postDao->checkPostId($postId, $sanitizer)) {
    
                    $postApp->remove((int)$postId);
    
                } else {
    
                    direct_page('index.php?load=404&notfound='.notfound_id(), 404);
    
                }
                       
            }
        
            break;
            
        default:
            
            if (false === $authenticator->userAccessControl()) {
    
                 direct_page('index.php?load=403&forbidden='.forbidden_id(), 403);
    
            } else {
    
                $postApp->listItems();
    
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