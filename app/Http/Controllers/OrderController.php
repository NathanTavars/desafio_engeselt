<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Client;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;
use Illuminate\Support\Collection;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


class OrderController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::all();
        $orders = Order::all();
        
        $collection = collect($orders->all());
        $orders = Order::paginate(10);
        $appendedCollection = $collection->map(function ($order) {
            $order['newAttribute'] = 'value';
            return $order;
        });

        return view('orders.index', compact('orders', 'appendedCollection'));
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function create()
    {
        $clients = Client::all();
        return view('orders.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $client = Client::find($request->input('client_id'));
        if (!$client) {
            return redirect()->back()->withErrors(['Cliente não encontrado']);
        }

        $order = new Order($request->all());
        $order->client_id = $client->id;
        $order->client_name = $client->name;
        $order->save();

        return redirect('/orders');
    }

    public function edit(Order $order)
    {
        $clients = Client::all();
        return view('orders.edit', compact('order', 'clients'));
    }

    public function update(Request $request, Order $order)
    {
        // $order = Order::findOrFail($id);
        $client = Client::findOrFail($request->input('client_name'));
        $order->client_name = $client->name;
        $order->status = $request->input('status');
        $order->date = $request->input('date');
        $order->price = $request->input('price');
        $order->obs = $request->input('obs');
        $order->save();

        return redirect('/orders');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index');
    }

    public function filter(Request $request)
    {
        $price = $request->get('price');
        $client_name = $request->get('client_name');
        $date = $request->get('date');
        $status = $request->get('status');
        $orders = Order::query();
        if ($price) {
            $orders->orderBy('price', $price);
        }
        if ($client_name) {
            $orders->orderBy('client_name', $client_name);
        }
        if ($date) {
            $orders->orderBy('date', $date);
        }
        if ($status) {
            $orders->orderBy('status', $status);
        }
        
        $orders = $orders->paginate(10);

        return view('orders.index', compact('orders'));
    }

    public function export(Request $request)
    {
        $price = $request->get('price');
        $client_name = $request->get('client_name');
        $date = $request->get('date');
        $status = $request->get('status');
        $orders = Order::query();
        if ($price) {
            $orders->orderBy('price', $price);
        }
        if ($client_name) {
            $orders->orderBy('client_name', $client_name);
        }
        if ($date) {
            $orders->orderBy('date', $date);
        }
        if ($status) {
            $orders->orderBy('status', $status);
        }

        $orders = $orders->get();

        // Criar a planilha
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Preço');
        $sheet->setCellValue('B1', 'Nome do Cliente');
        $sheet->setCellValue('C1', 'Data');
        $sheet->setCellValue('D1', 'Status');

        // Popular a planilha com os dados
        $row = 2;
        foreach ($orders as $order) {
            $sheet->setCellValue('A'.$row, $order->price);
            $sheet->setCellValue('B'.$row, $order->client_name);
            $sheet->setCellValue('C'.$row, $order->date);
            $sheet->setCellValue('D'.$row, $order->status);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('Pedidos.xlsx');
        return response()->download(public_path('Pedidos.xlsx'));
    }

}
