<?php
/**
 * Class MenuApp 
 * 
 * @category Class MenuApp extends BaseApp
 * @author   M.Noermoehammad
 * @license  MIT
 * @version  1.0
 * @since    Since Release 1.0.0
 * 
 */
class MenuApp extends BaseApp
{
  
  private $view;

  private $menuEvent;

  public function __construct(MenuEvent $menuEvent)
  {
    $this->menuEvent = $menuEvent;
  }
  
  public function listItems()
  {
    $errors = array();
    $status = array();
    $checkError = true;
    $checkStatus = false;
    
    if (isset($_GET['error'])) {
      
       $checkError = false;
       if ($_GET['error'] == 'menuNotFound') array_push($errors, "Error: Menu not found");

    }

    if (isset($_GET['status'])) {
      
       $checkStatus = true;
       if ($_GET['status'] == 'menuAdded') array_push($status, "New menu added");
       if ($_GET['status'] == 'menuUpdated') array_push($status, "Menu updated");
       if ($_GET['status'] == 'menuDeleted') array_push($status, "Menu deleted");

    }

    $this->setView('all-menus');
    $this->setPageTitle('Menus');
    $this->view->set('pageTitle', $this->getPageTitle());

    if (!$checkError) {
       $this->view->set('errors', $errors);
    }

    if ($checkStatus) {
      $this->view->set('status', $status);
    }

    $this->view->set('menusTotal', $this->menuEvent->totalMenus());
    $this->view->set('menus', $this->menuEvent->grabMenus());
    return $this->view->render();

  }
  
  public function insert()
  {
    $errors = array();
    $checkError = true;

    if (isset($_POST['menuFormSubmit'])) {
      
      $filters = ['parent_id' => FILTER_SANITIZE_NUMBER_INT, 'menu_label' => FILTER_SANITIZE_STRING, 'menu_link' => FILTER_SANITIZE_URL];

      try {

        if (!csrf_check_token('csrfToken', $_POST, 60*10)) {
         
          header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
          throw new AppException("Sorry, unpleasant attempt detected!.");
          
        }

        if (empty($_POST['menu_label'])) {
          
          $checkError = false;
          array_push($errors, "Menu name must be filled");

        }

        if ($this->menuEvent->isMenuExists(distill_post_request($filters)['menu_label']) === true) {
          
          $checkError = false;
          array_push($errors, "Menu has been used");
          
        }

        if (!$checkError) {

          $this->setView('edit-menu');
          $this->setPageTitle('Add New Menu');
          $this->setFormAction(ActionConst::NEWMENU);
          $this->view->set('pageTitle', $this->getPageTitle());
          $this->view->set('formAction', $this->getFormAction());
          $this->view->set('errors', $errors);
          $this->view->set('formData', $_POST);
          $this->view->set('parent', $this->menuEvent->parentDropDown());
          $this->view->set('csrfToken', csrf_generate_token('csrfToken'));

        } else {

           $this->menuEvent->setParentId((int)distill_post_request($filters)['parent_id']);
           $this->menuEvent->setMenuLabel(prevent_injection(distill_post_request($filters)['menu_label']));
           $this->menuEvent->setMenuLink(escape_html(trim(distill_post_request($filters)['menu_link'])));
           $this->menuEvent->addMenu();
           direct_page('index.php?load=menu&status=menuAdded', 200);

        }

      } catch (AppException $e) {

        LogError::setStatusCode(http_response_code());
        LogError::newMessage($e);
        LogError::customErrorMessage('admin');
        
      }

    } else {

      $this->setView('edit-menu');
      $this->setPageTitle('Add New Menu');
      $this->setFormAction(ActionConst::NEWMENU);
      $this->view->set('pageTitle', $this->getPageTitle());
      $this->view->set('formAction', $this->getFormAction());
      $this->view->set('parent', $this->menuEvent->parentDropDown());
      $this->view->set('csrfToken', csrf_generate_token('csrfToken'));

    }

    return $this->view->render();

  }
  
  public function update($id)
  {
    $errors = array();
    $checkError = true;

    if (!$getMenu = $this->menuEvent->grabMenu($id)) {
       direct_page('index.php?load=menu&error=menuNotFound', 404);
    }

    $data_menu = array(
      'ID' => $getMenu['ID'],
      'menu_label' => $getMenu['menu_label'],
      'menu_link' => $getMenu['menu_link'],
      'menu_sort' => $getMenu['menu_sort'],
      'menu_status' => $getMenu['menu_status']
    );

    if (isset($_POST['menuFormSubmit'])) {

      $filters = ['parent_id' => FILTER_SANITIZE_NUMBER_INT, 'menu_label' => FILTER_SANITIZE_STRING, 'menu_link' => FILTER_SANITIZE_URL, 
                  'menu_sort' => FILTER_SANITIZE_NUMBER_INT, 'menu_status' => FILTER_SANITIZE_STRING, 'menu_id' => FILTER_SANITIZE_NUMBER_INT];

      try {

        if (!csrf_check_token('csrfToken', $_POST, 60*10)) {
         
          header($_SERVER["SERVER_PROTOCOL"]." 400 Bad Request");
          throw new AppException("Sorry, unpleasant attempt detected!.");
          
        }

        if (empty($_POST['menu_label'])) {

           $checkError = false;
           array_push($errors, "Menu name must be filled");

        }

        if (false === sanitize_selection_box(distill_post_request($filters)['menu_status'], ['Y', 'N'])) {

           $checkError = false;
           array_push($errors, "Please choose the available value provided!");

        }

        if (!$checkError) {

          $this->setView('edit-menu');
          $this->setPageTitle('Edit Menu');
          $this->setFormAction(ActionConst::EDITMENU);
          $this->view->set('pageTitle', $this->getPageTitle());
          $this->view->set('formAction', $this->getFormAction());
          $this->view->set('errors', $errors);
          $this->view->set('menuData', $data_menu);
          $this->view->set('parent', $this->menuEvent->parentDropDown($getMenu['parent_id']));
          $this->view->set('csrfToken', csrf_generate_token('csrfToken'));

        } else {

          $this->menuEvent->setParentId((int)distill_post_request($filters)['parent_id']);
          $this->menuEvent->setMenuId((int)distill_post_request($filters)['menu_id']);
          $this->menuEvent->setMenuLabel(prevent_injection(distill_post_request($filters)['menu_label']));
          $this->menuEvent->setMenuLink(escape_html(distill_post_request($filters)['menu_link']));
          $this->menuEvent->setMenuOrder((is_int($_POST['menu_sort']) ? distill_post_request($filters)['menu_sort'] : 0 ));
          $this->menuEvent->setMenuStatus(distill_post_request($filters)['menu_status']);
          $this->menuEvent->modifyMenu();
          direct_page('index.php?load=menu&status=menuUpdated', 200);

        }

      } catch (AppException $e) {

        LogError::setStatusCode(http_response_code());
        LogError::newMessage($e);
        LogError::customErrorMessage('admin');
        
      }

    } else {

      $this->setView('edit-menu');
      $this->setPageTitle('Edit Menu');
      $this->setFormAction(ActionConst::EDITMENU);
      $this->view->set('pageTitle', $this->getPageTitle());
      $this->view->set('formAction', $this->getFormAction());
      $this->view->set('menuData', $data_menu);
      $this->view->set('parent', $this->menuEvent->parentDropDown($getMenu['parent_id']));
      $this->view->set('csrfToken', csrf_generate_token('csrfToken'));

    }

    return $this->view->render();

  }
  
  public function remove($id)
  {
    $this->menuEvent->setMenuId($id);
    $this->menuEvent->removeMenu();
    direct_page('index.php?load=menu&status=menuDeleted', 200);
  }
  
  protected function setView($viewName)
  {
    $this->view = new View('admin', 'ui', 'appearance', $viewName);
  }
  
}