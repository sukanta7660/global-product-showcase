<div class="row">
    <div class="col-md-3">
        <a href="#" class="btn btn-primary d-block">Lists</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('user.special-discount.product') }}" class="btn btn-danger d-block">Special Discounts</a>
    </div>
    @auth
        <div class="col-md-3">
            <a href="{{ route('user.my-favourite.product') }}" class="btn btn-success d-block">Favourites</a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('login') }}" class="btn btn-dark d-block">Logout</a>
        </div>
    @endauth
    @guest
        <div class="col-md-3">
            <a href="{{ route('login') }}" class="btn btn-dark d-block">Login</a>
        </div>
    @endguest
</div>
