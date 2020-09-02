<?php 
namespace App\Modules\Api\Controllers;

// Panggil JWT
use \Firebase\JWT\JWT;
// panggil class Auht
use App\Modules\Api\Controllers\Auth;
// panggil restful api codeigniter 4
use CodeIgniter\RESTful\ResourceController;
 
header("Access-Control-Allow-Origin: * ");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
class Home extends ResourceController
{
    
    public $authenticated = false;

    public function __construct()
    {
        // inisialisasi class Auth dengan $this->protect
        $this->protect = new Auth();

        
    }

    protected function checkHeader(){
        // ambil dari controller auth function public private key
        $secret_key = $this->protect->privateKey();
        $token = null;
        $authHeader = $this->request->getServer('HTTP_AUTHORIZATION');
        $arr = explode(" ", $authHeader);
        $token = @$arr[1];
 
        if($token){
            try {
                $decoded = JWT::decode($token, $secret_key, array('HS256'));

                if($decoded)
                {
                    $output = [
                        'statusCode' => 200,
                        'message' => 'Access granted'
                    ];

                    return $output;
                }
                 
         
            } 
            catch (\Exception $e)
            {
                $output = [
                    'statusCode' => 401,
                    'message' => 'Access denied',
                    "error" => $e->getMessage()
                ];

                return $this->respond($output, 401);
            }
        }
        else
        {
            $output = [
                    'statusCode' => 401,
                    'message' => 'Please Insert token bearer',
                ];

                return $this->respond($output, 401);
        }
    }
 
    public function index()
    {
        $auth = $this->checkHeader();

        if (!is_object($auth)) 
        {
            $output = [
                'statusCode' => 200,
                'message' => 'Access granted'
            ];

            return $this->respond($output, 401);
        }
        else
        {
            return $auth;
        }
    }
 
}