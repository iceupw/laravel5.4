<?php

namespace App\Http\Controllers\Base;

use function foo\func;
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
        $img = Image::make('images/test3.jpg')->trim('bottom-right');
        $img->opacity(80)->rotate(-45)->sharpen(15);
        //$img1 = Image::make('images/test2.png');
        //$img->insert($img1,'center',10,10);
        //$img->insert($img1);
        //$img->gamma(100);
        //$img->greyscale();
        //$img->fit(250,250,function ($constraint){
        //    $constraint->upsize();
        //});
        //$img = Image::canvas(500,500,'#fff');
        //$imgs = Image::canvas(200,200);
        //$imgs->circle(500,250,250,function($draw){
        //    $draw->background('#000');
        //    $draw->border(3,'#a3b');
        //});
        //$img->fill($imgs);
        //$img->flip('h');
        //$img->ellipse(500,300,250,250,function($drap){
        //    $drap->background('#000');
        //    $drap->border(3,'#fff');
        //});
        //$img = Image::make('images/test2.png')->width();
        //dd($img);
        //$img->crop(100, 100, 25, 25);
        //$img->colorize(20,20,-20);
        /*$img = Image::canvas(200,200);
        $img->circle(200, 100, 100, function ($draw) {
            //$draw->background('#0000ff');
            $draw->border(1, '#f00');
        });*/
        //$img = Image::cache(function($image) {
        //    $image->make('images/test1.jpg')->resize(900, 600)->greyscale();
        //}, 10, true);
        /*$img = Image::make('images/test2.png');
        $img->brightness('-1');*/
        //$img->blur(1);

       /* // create empty canvas with black background
        $img = Image::canvas(120, 90, '#000000');

        // fill image with color
        $img->fill('#b53717');

        // backup image with colored background
        $img->backup();

        // fill image with tiled image
        $img->fill('images/test2.png');*/

        // return to colored background
        //$img->reset();
        // create response and add encoded image data
       /* $response = Response::make($img->encode('png'));

        // set content-type
        $response->header('Content-Type', 'image/png');

        // output
        return $response;*/
       /* $img = Image::canvas(800, 600, '#ff0000');

        // create response and add encoded image data
        $response = Response::make($img->encode('png'));

        // set content-type
        $response->header('Content-Type', 'image/png');

        // output
        return $response;*/
        /*$img = Image::make('./images/test1.png');
        // color in array format with alpha value
        $img->fill(array(255, 255, 255, 0.5));
        return $img->response('jpg');*/

        // output
        return $img->response('png');
    }
}
