<h4 class="coupons bg-primary text-center text-white p-3">Coupons</h4>
<div class="marquee">
    <marquee behavior="" scrollamount="2" direction="down">
        @foreach(getCoupons() as $coupon)
            <p>
                Code: <span class="text-uppercase">{{ $coupon->coupon_code }}</span> <br>
                <small><b>Shop:</b> {{ $coupon->shop->name }}</small>
            </p>
        @endforeach
    </marquee>
</div>
