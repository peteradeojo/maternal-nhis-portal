@section('title', 'Login')

@extends('layouts.auth')

@section('content')
    <div class="card p-5">
        <div class="body">
            <div>
                <img src="https://maternalchildhosp.net/assets/img/maternal-and-child.png" alt="">
                <div class="pb-5"></div>
            </div>
            <form action="" method="post">
                @csrf
                <div class="form-group">
                    <label for="" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" required name="phone">
                </div>
                <div class="py-2"></div>
                <div class="form-group">
                    <label for="" class="form-label">Password</label>
                    <input type="password" name="password" id="" class="form-control">
                </div>
                <div class="py-2"></div>
                <div class="form-group"><button class="btn bg-theme" type="submit">Submit</button></div>
            </form>
        </div>
    </div>
@endsection
