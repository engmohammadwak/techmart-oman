<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $cartItems = Cart::with(['productVariant.product.images'])
            ->where(function($q) use ($request) {
                if ($request->user()) {
                    $q->where('user_id', $request->user()->id);
                } else {
                    $q->where('session_id', session()->getId());
                }
            })
            ->get()
            ->map(function($item) {
                return [
                    'id' => $item->id,
                    'product' => $item->productVariant->product,
                    'variant' => $item->productVariant,
                    'quantity' => $item->quantity,
                    'subtotal' => $item->subtotal,
                ];
            });

        $total = $cartItems->sum('subtotal');

        return Inertia::render('Cart', [
            'items' => $cartItems,
            'total' => $total,
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_variant_id' => 'required|exists:product_variants,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $user = $request->user();
        $sessionId = session()->getId();

        $cartItem = Cart::firstOrCreate(
            [
                'user_id' => $user?->id,
                'session_id' => $user ? null : $sessionId,
                'product_variant_id' => $request->product_variant_id,
            ],
            ['quantity' => 0]
        );

        $cartItem->increment('quantity', $request->quantity);

        return back()->with('success', 'تمت الإضافة إلى السلة');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('success', 'تم تحديث الكمية');
    }

    public function remove(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return back()->with('success', 'تم الحذف من السلة');
    }
}
