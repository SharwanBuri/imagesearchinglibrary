@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <form action="/search" method="POST" role="search">
                    {{ csrf_field() }}

                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search" name="keyword" required>
                        <div class="input-group-append">
                          <button class="btn btn-success" type="submit">Go</button>
                        </div>
                      </div>
                </form>

            </div>
        </div>
        @if(!empty($result))
        <div class="col-md-12">
            <div class="card">
               <div class="row"style="margin-top: 50px;    justify-content: center;">

                   @if(!empty($result->hits))

                   @foreach($result->hits as $img)
                   <?php //print_r( $img->id);?>
                   <div class="col-md-3" style="margin-bottom: 25px;">
                       <div class="imgsec" style="padding: 0px 5px;">
                           <img src="{{$img->previewURL}}"  class="img-thumbnail" alt="Cinque Terre" width="304" height="236">
                       </div>
                   </div>
                   @endforeach
                   @else
                   <div style="margin-bottom:50px; ">Not Found!</div>
                   @endif
               </div>


            </div>
        </div>
        @endif
    </div>
</div>
@endsection
