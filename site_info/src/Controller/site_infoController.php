<?php
/**
 * @file
 * Contains \Drupal\site_info\Controller\DefaultController.
 */

namespace Drupal\site_info\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Response;
use Drupal\general_libraries\Controller\General_librariesController;
use Symfony\Component\HttpFoundation\JsonResponse;


class site_infoController extends ControllerBase {

    protected $currentUser;
    protected $currentUserId;
    protected $currentUserRole;
    protected $canAccess;
    protected $con;

   

    public function site_api() {		
		header('Access-Control-Allow-Origin: *');
		header("Content-Type: application/json; charset=UTF-8");
		header("Access-Control-Allow-Methods: POST");
		header("Access-Control-Max-Age: 3600");
		header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
		header('Status: 400 Bad Request');
		$slogan = \Drupal::config('system.site')->get('api_key');
		if($slogan == ""){
			http_response_code(400);
			$failure = array("message"=>"No Data Found");
			$data = array("error_code"=>"400","FailureReason"=>$failure);
			echo json_encode($data);
			die();
		}else{
			$data = array("api_key"=>$slogan);
			echo json_encode($data);
			die();
		}
		die();	
	}
	
}
