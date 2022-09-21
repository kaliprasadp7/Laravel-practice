<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use Auth;
use Validator;
// require_once "/lib/easypost.php";
// require_once("../vendor/autoload.php");
// require_once '/vendor/autoload.php';
require '../vendor/autoload.php';
require '../vendor/easypost/easypost-php/lib/easypost.php';

class ShipmentController extends Controller
{

    public function index(Request $request)
    {

        \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        // require_once("path/to/lib/easypost.php");
// \EasyPost\EasyPost::setApiKey("<YOUR_TEST/PRODUCTION_API_KEY>");

// $to_address = \EasyPost\Address::create(...);
// $from_address = \EasyPost\Address::create(...);
// $parcel = \EasyPost\Parcel::create(...);
// $customs_info = \EasyPost\CustomsInfo::create(...);

// $shipment = \EasyPost\Shipment::create(array(
//   "to_address" => $to_address,
//   "from_address" => $from_address,
//   "parcel" => $parcel,
//   "customs_info" => $customs_info
// ));

// OR in one call

$shipment = \EasyPost\Shipment::create(array(
  "to_address" => array(
    'name' => 'Dr. Steve Brule',
    'street1' => '179 N Harbor Dr',
    'city' => 'Redondo Beach',
    'state' => 'CA',
    'zip' => '90277',
    'country' => 'US',
    'phone' => '3331114444',
    'email' => 'dr_steve_brule@gmail.com'
  ),
  "from_address" => array(
    'name' => 'EasyPost',
    'street1' => '417 Montgomery Street',
    'street2' => '5th Floor',
    'city' => 'San Francisco',
    'state' => 'CA',
    'zip' => '94104',
    'country' => 'US',
    'phone' => '3331114444',
    'email' => 'support@easypost.com'
  ),
  "parcel" => array(
    "length" => 20.2,
    "width" => 10.9,
    "height" => 5,
    "weight" => 65.9
  )
));

return $shipment;

    }

    public function address(Request $request)
    {
        // \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        // $toAddress = \EasyPost\Address::create(array(
        //     'name' => 'George Costanza',
        //     'company' => 'Vandelay Industries',
        //     'street1' => '1 E 161st St.',
        //     'city' => 'Bronx',
        //     'state' => 'NY',
        //     'zip' => '10451'
        //   ));


    }
}
