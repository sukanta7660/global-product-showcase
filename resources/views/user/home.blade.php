@extends('layouts.user')
@section('title', 'Home')
@section('content')
    <form>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="eggs...">
            <label for="floatingInput">Please type product name</label>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <table class="table table-bordered table-responsive mt-3">
        <tr>
            <th>Shop Name</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Address</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <tr>
            <td>Baba G Wholesalers</td>
            <td>Eggs</td>
            <td>$20</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Coles World Square</td>
            <td>Eggs</td>
            <td>$25</td>
            <td>Jersey, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Romeo's IGA Food Hall</td>
            <td>Eggs</td>
            <td>$23</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Coles Wynyard Express</td>
            <td>Eggs</td>
            <td>$27</td>
            <td>Jersey, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
        <tr>
            <td>Woolworths Town Hall</td>
            <td>Eggs</td>
            <td>$18</td>
            <td>Norfolky, Virginia</td>
            <td>1 Dozens</td>
            <td>
                <div class="btn-group">
                    <a href="" class="btn btn-primary">Add Lists</a>
                    <a href="" class="btn btn-success">Add Favourites</a>
                </div>
            </td>
        </tr>
    </table>
    <div class="mt-5">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d12658.712101129053!2d-82.82271362037665!3d37.51551141377955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1677919811366!5m2!1sen!2sbd" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
