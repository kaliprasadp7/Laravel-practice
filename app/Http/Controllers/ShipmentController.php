<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\to_address;
use App\Models\from_address;
use App\Models\Parcel;
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
$ep_id = to_address::where('id', 2)->pluck('ep_id');

$shipment = \EasyPost\Shipment::create(array(
//   "to_address" => array(
//     'name' => 'Dr. Steve Brule',
//     'street1' => '179 N Harbor Dr',
//     'city' => 'Redondo Beach',
//     'state' => 'CA',
//     'zip' => '90277',
//     'country' => 'US',
//     'phone' => '3331114444',
//     'email' => 'dr_steve_brule@gmail.com',
//     'verify' => true,
//     // 'verify_strict' => true
//   ),
"to_address" => array("id" => $ep_id[0] ),
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
  ),
//   'carrier' => 'USPS',
//   'service' => 'Priority'
));

return $shipment;

    }

    public function to_address(Request $request)
    {
        \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        $to_Address = \EasyPost\Address::create(array(
            'name' => $request->name,
            'street1' => $request->street1,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'verify' => $request->verify

          ));

          to_address::create([
            'ep_id'=>$to_Address->id,
            'name' => $to_Address->name,
            'street1' => $to_Address->street1,
            'city' => $to_Address->city,
            'state' => $to_Address->state,
            'zip' => $to_Address->zip,
            'country' => $to_Address->country,
            'phone' => $to_Address->phone,
            'email' => $to_Address->email
            // 'verify' => $to_Address->verify
        ]);

          return $to_Address;

    }


    public function from_address(Request $request)
    {
        \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        $from_Address = \EasyPost\Address::create(array(
            'name' => $request->name,
            'street1' => $request->street1,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'phone' => $request->phone,
            'email' => $request->email,
            'verify' => $request->verify

          ));

          from_address::create([
            'ep_id'=>$from_Address->id,
            'name' => $from_Address->name,
            'street1' => $from_Address->street1,
            'city' => $from_Address->city,
            'state' => $from_Address->state,
            'zip' => $from_Address->zip,
            'country' => $from_Address->country,
            'phone' => $from_Address->phone,
            'email' => $from_Address->email
            // 'verify' => $from_Address->verify
        ]);

          return $from_Address;

    }

    public function parcel(Request $request)
    {
        \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        $parcel = \EasyPost\Parcel::create(array(
            'length' => $request->length,
            'width' => $request->width,
            'height' => $request->height,
            'weight' => $request->weight
          ));

          Parcel::create([
            'ep_id'=>$parcel->id,
            'length' => $parcel->length,
            'width' => $parcel->width,
            'height' => $parcel->height,
            'weight' => $parcel->weight
        ]);

          return $parcel;

    }

    public function Batch(Request $request)
    {
        \EasyPost\EasyPost::setApiKey("EZTKee957af386444c8ebe2ad886ca133b2e2ELXu2kzOLj0I5XsX0oxPA");

        $to_add = to_address::where('id', 2)->pluck('ep_id');
        $from_add = from_address::where('id', 1)->pluck('ep_id');
        $prcl = Parcel::where('id', 1)->pluck('ep_id');

        $batch = \EasyPost\Batch::create(array(
            'shipment' => array(
              array(
                'from_address' => array("id" => $from_add[0] ),
                'to_address' => array("id" => $to_add[0] ),
                'parcel' => array("id" => $prcl[0] ),
                'carrier' => 'USPS',
                'service' => 'Priority'
              ),
              array(
                'from_address' => array("id" => $from_add[0] ),
                'to_address' => array("id" => $to_add[0] ),
                'parcel' => array("id" => $prcl[0] ),
                'carrier' => 'USPS',
                'service' => 'Priority'
              ),
              array(
                'from_address' => array("id" => $from_add[0] ),
                'to_address' => array("id" => $to_add[0] ),
                'parcel' => array("id" => $prcl[0] ),
                'carrier' => 'USPS',
                'service' => 'Priority'
              ),
              array(
                'from_address' => array("id" => $from_add[0] ),
                'to_address' => array("id" => $to_add[0] ),
                'parcel' => array("id" => $prcl[0] ),
                'carrier' => 'USPS',
                'service' => 'Priority'
              )
            )
          ));
          $batch_buy=$batch->buy();
        //   return $batch_buy->label(array('file_format' => 'pdf'));
        return $batch_buy;

    }

}
