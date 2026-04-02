<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    private function getSessionId()
    {
        if (!session()->has('cart_session_id')) {
            session()->put('cart_session_id', uniqid('cart_', true));
        }
        return session()->get('cart_session_id');
    }

    public function index()
    {
        if (Auth::check()) {
            $cartItems = Cart::where('user_id', Auth::id())
                ->with('product.category')
                ->get();
        } else {
            $cartItems = Cart::where('session_id', $this->getSessionId())
                ->with('product.category')
                ->get();
        }

        $subtotal = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $shipping = $subtotal >= 250 ? 0 : 29.99;
        $total    = $subtotal + $shipping;

        return view('cart.index', compact('cartItems', 'subtotal', 'shipping', 'total'));
    }

    /**
     * store() → routes/web.php: POST /cart  (cart.store)
     * Eski add() metodu ile aynı işlevi görür.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity'   => 'required|integer|min:1',
            'size'       => 'nullable|string',
            'color'      => 'nullable|string',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($product->stock < $request->quantity) {
            return back()->with('error', 'Yetersiz stok!');
        }

        $cartData = [
            'product_id' => $product->id,
            'quantity'   => $request->quantity,
            'size'       => $request->size,
            'color'      => $request->color,
        ];

        if (Auth::check()) {
            $cartData['user_id'] = Auth::id();

            $existing = Cart::where('user_id', Auth::id())
                ->where('product_id', $product->id)
                ->where('size', $request->size)
                ->where('color', $request->color)
                ->first();

            $existing
                ? $existing->increment('quantity', $request->quantity)
                : Cart::create($cartData);
        } else {
            $cartData['session_id'] = $this->getSessionId();

            $existing = Cart::where('session_id', $this->getSessionId())
                ->where('product_id', $product->id)
                ->where('size', $request->size)
                ->where('color', $request->color)
                ->first();

            $existing
                ? $existing->increment('quantity', $request->quantity)
                : Cart::create($cartData);
        }

        return redirect()->route('cart.index')->with('success', 'Ürün sepete eklendi!');
    }

    /**
     * update() → routes/web.php: PATCH /cart/{cart}  (cart.update)
     */
    public function update(Request $request, Cart $cart)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        if ($cart->product->stock < $request->quantity) {
            return back()->with('error', 'Yetersiz stok!');
        }

        $cart->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Sepet güncellendi!');
    }

    /**
     * destroy() → routes/web.php: DELETE /cart/{cart}  (cart.destroy)
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back()->with('success', 'Ürün sepetten çıkarıldı!');
    }

    // ----------------------------------------------------------------
    // Yardımcı metodlar (route'a bağlı değil, iç kullanım)
    // ----------------------------------------------------------------

    public function clear()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())->delete();
        } else {
            Cart::where('session_id', $this->getSessionId())->delete();
        }

        return back()->with('success', 'Sepet temizlendi!');
    }

    public function getCartCount(): int
    {
        return Auth::check()
            ? (int) Cart::where('user_id', Auth::id())->sum('quantity')
            : (int) Cart::where('session_id', $this->getSessionId())->sum('quantity');
    }
}