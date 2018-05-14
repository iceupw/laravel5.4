<?php

namespace App\Http\Controllers\Base;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Image;
use Response;

class ImageController extends Controller
{
    //
    public function example(){
        // open an image file
        $img = Image::make('./images/test1.png');

        // now you are able to resize the instance
        $img->resize(320, 240);

        // and insert a watermark for example
        $img->insert('./images/test2.png');

        // finally we save the image as a new file
        $img->save('bar.jpg');
        return $img->response('jpg');
    }

    public function colorFormats(){

        $img = Image::canvas(800, 600, '#ff0000');

        // create response and add encoded image data
        $response = Response::make($img->encode('png'));

        // set content-type
        $response->header('Content-Type', 'image/png');

        // output
        return $response;
        /*$img = Image::make('./images/test1.png');
        // color in array format with alpha value
        $img->fill(array(255, 255, 255, 0.5));
        return $img->response('jpg');*/
    }
}
