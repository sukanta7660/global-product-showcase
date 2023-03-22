<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FavouriteProduct;
use App\Models\Product;
use Helper;
use Illuminate\Database\QueryException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FavouritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() :View
    {
        $favourites = FavouriteProduct::where('user_id', auth()->user()->id)
            ->paginate(10)
        ;
        return view('user.favouriteProduct', compact('favourites'));
    }

    public function addToFavourite(Product $product) :RedirectResponse
    {
        try {

            $isExists = auth()->user()->favourites()->where('product_id', $product->id)->first();

            if ($isExists) {
                return Helper::sendResponse(500, 'error', 'Error', 'Already added to favourite list!');
            }

            auth()->user()->favourites()->create([
                'product_id' => $product->id
            ]);

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Product successfully added to favourites');
    }

    public function removeFromFavourite(FavouriteProduct $favouriteProduct) :RedirectResponse
    {
        try {

            auth()->user()->favourites()->whereId($favouriteProduct->id)->delete();

        } catch (QueryException $exception) {
            return Helper::sendResponse(500, 'error', 'Error', $exception->getMessage());
        }

        return Helper::sendResponse(200,
            'success',
            'Success',
            'Product successfully deleted from favourites');
    }
}
