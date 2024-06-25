<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Carbon\Carbon;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use League\Csv\Writer;

class ReportController extends Controller
{
    public function generateReport(Request $request): Application|Response|JsonResponse|\Illuminate\Contracts\Foundation\Application|ResponseFactory
    {
        // Проверяем параметр format в запросе
        $format = $request->input('format', 'json');

        // Вычисляем даты для последнего месяца
        $startDate = Carbon::now()->subMonth()->startOfMonth();
        $endDate = Carbon::now()->subMonth()->endOfMonth();

        // Запрос на получение данных о покупках за последний месяц
        $purchases = Purchase::whereBetween('created_at', [$startDate, $endDate])->get();

        // Генерируем отчет в зависимости от выбранного формата
        if ($format === 'json') {
            return response()->json([
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
                'total_purchases' => $purchases->count(),
                'purchases' => $purchases
            ]);
        } elseif ($format === 'csv') {
            // Генерация CSV
            $csv = Writer::createFromFileObject(new \SplTempFileObject());
            $csv->insertOne(['ID', 'Product', 'Quantity', 'Price', 'Created At']);

            foreach ($purchases as $purchase) {
                $csv->insertOne([$purchase->id, $purchase->product_name, $purchase->quantity, $purchase->price, $purchase->created_at]);
            }

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => 'attachment; filename="purchase_report.csv"',
            ];

            return response($csv->getContent(), 200, $headers);
        } else {
            return response()->json(['error' => 'Unsupported format.'], 400);
        }
    }
}
