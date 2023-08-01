

@extends('front.master')
@section('title')
    employes page
@endsection

@section('body')
    <section class="py-5 bg-info">
        <div class="container">
            <div class="row">





                <div class="col-md-3">
                    <div class="card shadow" ">
                       <img src="{{asset('/')}}front/images/7.jpg" alt="" style="height:270px" >
                       <div class="card-body">
                           <h4>Tanvir Ahmed</h4>
                           <p>Web Designer</p>
                           <hr>
                           <a href="" class="btn btn-outline-success">Detail</a>
                       </div>
                    </div>
                 </div>

                 {{-- @endforeach --}}

                 {{-- <div class="col-md-3">
                    <div class="card shadow" ">
                       <img src="{{asset('/')}}front/images/2.jpg" alt="" style="height:270px" >
                       <div class="card-body">
                           <h4>Tanvir Ahmed</h4>
                           <p>Web Designer</p>
                           <hr>
                           <a href="" class="btn btn-outline-success">Detail</a>
                       </div>
                    </div>
                 </div> --}}


            </div>
        </div>

    </section>

@endsection

