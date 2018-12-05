<?php
namespace App\Services;

use Barryvdh\DomPDF\Facade as PDF;
use App\Services\Events\EventOrderService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
class PdfService extends BaseService
{
    protected $eventOrderService;

    public function __construct()
    {
        $this->eventOrderService   = new EventOrderService;
    }

    public function generateTicketPdf($orderId){
        $order = $this->eventOrderService->getOrderById($orderId);
        $path = getDirectory('orders', $order->id);
        $data['order'] = $order;
        $data['path']  = $path['web_path'];
        if(!Storage::exists($path['relative_path'])){
            Storage::makeDirectory($path['relative_path']);
        }
        $pdfName    = getFileNameWithTimeStamp('ticket-pdf', 'pdf');
        $finalPath  = public_path('storage/').removeFirstParam($path['relative_path']).$pdfName;
        $pdf        = PDF::loadView('payments.order-pdf', $data)->save($finalPath);
        $this->eventOrderService->updateOrderPdfName($order->id, $pdfName);
        return $pdfName;
    }
}