<?php

namespace App\Services;

use App\Services\Events\EventOrderService;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
class QrCodeService extends BaseService
{
    protected $eventOrderService;

    public function __construct()
    {
        $this->eventOrderService = new EventOrderService;
    }

    public function generateOrderQR($orderId){
        $order = $this->eventOrderService->getOrderById($orderId);
        $path = getDirectory('orders', $order->id);
        if(!Storage::exists($path['relative_path'])){
            Storage::makeDirectory($path['relative_path']);
        }
        $qrImg = getFileNameWithTimeStamp('qrcode', 'png');
        $finalPath  = public_path('storage/').removeFirstParam($path['relative_path']).$qrImg;
        if(!empty($order->user->first_name)){
            $orderQrText = 'User Name: '.$order->user->first_name.' Ticket Name: '.$order->ticket->name.' Ticket Quantity: '.$order->quantity.' Tickets';
        }else{
            $orderQrText = 'User Email: '.$order->user->email.' Ticket Name: '.$order->ticket->name.' Ticket Quantity: '.$order->quantity.' Tickets';
        }
        QrCode::format('png')->size('400')->generate($orderQrText, $finalPath);
        $order = $this->eventOrderService->updateOrderQrImage($order->id, $qrImg);
        return $order;
    }
}