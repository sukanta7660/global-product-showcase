<div class="row">
    <div class="col-md-3">
        <a href="{{ route('user.recent-view.product') }}" class="btn btn-primary d-block">Recent Views</a>
    </div>
    <div class="col-md-3">
        <a href="{{ route('user.special-discount.product') }}" class="btn btn-danger d-block">Special Discounts</a>
    </div>
    @auth
        <div class="col-md-3">
            <a href="{{ route('user.my-favourite.product') }}" class="btn btn-success d-block">Favourites</a>
        </div>
        <div class="col-md-3">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <a class="btn btn-dark d-block" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </a>
            </form>
        </div>
    @endauth
    @guest
        <div class="col-md-3">
            <a href="{{ route('login') }}" class="btn btn-dark d-block">Login</a>
        </div>
    @endguest
</div>
