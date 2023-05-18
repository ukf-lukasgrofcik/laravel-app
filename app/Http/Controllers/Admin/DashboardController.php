<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{

    public function index() : View | Application | Factory
    {
        $suppliers_with_most_orders = $this->suppliersWithMostOrders();
        $suppliers_with_most_profit = $this->suppliersWithMostProfit();

        return view('admin.dashboard.index', compact('suppliers_with_most_orders', 'suppliers_with_most_profit'));
    }

    private function suppliersWithMostOrders() : Collection
    {
        return DB::table('suppliers')
            ->rightJoin('orders', 'suppliers.id', '=', 'orders.supplier_id')
            ->groupBy('suppliers.id')
            ->orderBy('amount', 'desc')
            ->limit(10)
            ->get([
                "suppliers.id AS id",
                "suppliers.name AS label",
                DB::raw("COUNT(suppliers.id) AS amount"),
            ]);
    }

    private function suppliersWithMostProfit() : Collection
    {
        return DB::table('suppliers')
            ->rightJoin('orders', 'suppliers.id', '=', 'orders.supplier_id')
            ->groupBy('suppliers.id')
            ->orderBy('amount', 'desc')
            ->limit(10)
            ->get([
                "suppliers.id AS id",
                "suppliers.name AS label",
                DB::raw("SUM(orders.price) AS amount"),
            ]);
    }

}
