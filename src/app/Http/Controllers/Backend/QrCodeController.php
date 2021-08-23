<?php

namespace App\Http\Controllers\Backend;


use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\Image\ImagickImageBackEnd;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;
use BaconQrCode\Writer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\QrCode;


class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //
        // for($i=0; $i<16000; $i++){

        //     QrCode::create(['status'=>'inactive']);

        // }

        // return "done";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.qr-code.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        for($i=1; $i<=10000; $i++){

            QrCode::create(['status'=>'inactive']);

        }
        return "done";
        //$quantity = $request->quantity;

        // $renderer = new ImageRenderer(
        //     new RendererStyle(1000),
        //     new ImagickImageBackEnd()
        // );

        // $writer = new Writer($renderer);
        // $writer->writeFile('11503004289', '/var/www/html/covid19outpassbackend/src/storage/11503004289.png');
        // $writer->writeFile('34345', '/var/www/html/covid19outpassbackend/src/storage/qrcode2.png');
        //return QrCodeGenerator::text('QR Code Generator for Laravel!')->png();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function generateQrCode(){


        //return $qrcodes;

        // $renderer = new ImageRenderer(
        //     new RendererStyle(1000),
        //     new ImagickImageBackEnd()
        // );

        $renderer = new ImageRenderer(
            new RendererStyle(1000),
            new ImagickImageBackEnd()
        );

        // $qrcodes = QrCode::where('id','>',276074)->get();

        for($i=281074; $i<291074; $i++){

            $qr = QrCode::find($i);

            if($qr){

                $writer = new Writer($renderer);
        //     $filename = "/qrcodes3/".$qr->id.".png";

                $filename = $qr->id.".png";

                $writer->writeFile($qr->uuid, '/var/www/html/covid19outpassbackend/src/storage/qrcodes0701202110000/'.$filename);

            }

        }
        //return $qrcodes;
        // foreach($qrcodes as $qr){

        //     $writer = new Writer($renderer);
        //     $filename = "/qrcodes3/".$qr->id.".png";

        //     $path = storage_path();
        //     $writer->writeFile($qr->uuid, $path.$filename);
        // }

        return "successfully generated";

        // $writer = new Writer($renderer);

        // for($i=0; $i<3; $i++){


        //     //$qr = QrCode::where('id', $i)->first();



        //     $filename = $qr->uuid.".png";

        //     $writer->writeFile($qr->uuid, '/var/www/html/covid19outpass/src/storage/qrcodes3/'.$filename);

        // }
    }
}
