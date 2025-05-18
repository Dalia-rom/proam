<?php

namespace App\Console\Commands;

use App\Models\Product;
use App\Models\User;
use Illuminate\Console\Command;
use Filament\Notifications\Notification;

class NotificationExpiringProductsCommand extends Command
{
    protected $signature = 'notification:expiring-products';

    protected $description = 'Lista todo los productos que están por expirar 30 dias antes de su fecha de expiración a todos los usuarios';

    public function handle(): void
    {
        $products = Product::query()
            ->whereRaw('DATEDIFF(expiration_at, NOW()) = 30')
            ->get();

        $this->info("Listado de productos expirados {$products->count()}");

        Notification::make()
            ->title(__('Product'))
            ->body(__('The products is about to expire in 30 days, :products', [
                'products' => $products->pluck('name')->implode(', ')
            ]))
            ->sendToDatabase(User::all());
    }
}
