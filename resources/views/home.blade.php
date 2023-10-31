<!doctype html>
<html lang="en">

<head>
<style>
    body {
    background:#eee;
}
.posts-content{
    margin-top:20px;    
}
.ui-w-40 {
    width: 40px !important;
    height: auto;
}
.default-style .ui-bordered {
    border: 1px solid rgba(24,28,33,0.06);
}
.ui-bg-cover {
    background-color: transparent;
    background-position: center center;
    background-size: cover;
}
.ui-rect {
    padding-top: 50% !important;
}
.ui-rect, .ui-rect-30, .ui-rect-60, .ui-rect-67, .ui-rect-75 {
    position: relative !important;
    display: block !important;
    padding-top: 100% !important;
    width: 100% !important;
}
.d-flex, .d-inline-flex, .media, .media>:not(.media-body), .jumbotron, .card {
    -ms-flex-negative: 1;
    flex-shrink: 1;
}
.bg-dark {
    background-color: rgba(24,28,33,0.9) !important;
}
.card-footer, .card hr {
    border-color: rgba(24,28,33,0.06);
}
.ui-rect-content {
    position: absolute !important;
    top: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    left: 0 !important;
}
.default-style .ui-bordered {
    border: 1px solid rgba(24,28,33,0.06);
}
    </style>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

<body>
    
    
<div class="container posts-content">
<a href="{{url('post')}}" class="w-70 btn btn-primary mb-4"> post </a>
<a href="{{url('logout') }}" class="btn btn-danger float-end"> logout</a>


    <div class="row" id="post_image">

</div>
</div>





    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
       $(document).ready(function() {
        get_post_data();
       });
     function get_post_data() {
        var token = "{{ csrf_token() }}"; //here getting token from blade
        var APP_URL = {!! json_encode(url('/')) !!}
        $.ajax({
            type: "POST",
            url: "{{ url('get-post') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: token,
                data: $("#quickForm").serialize(),
            },
            success: function(response) {
                let result = response.data;
                let cart_html =``;
                result.forEach(function(element){ 
                let image_url=APP_URL+"/public/assets/img/post/"+element.image;
                    console.log(element);
                    cart_html +=` <div class="col-lg-6">
            <div class="card mb-4">
              <div class="card-body">
                <div class="media mb-3">
                  <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="d-block ui-w-40 rounded-circle" alt="">
                  <div class="media-body ml-3">
                    `+element.getuser.name+`
                    <div class="text-muted small">`+element.created_at+`</div>
                  </div>
                </div>
            
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus finibus commodo bibendum. Vivamus laoreet blandit odio, vel finibus quam dictum ut.
                </p>
                <a href="javascript:void(0)" class="ui-rect ui-bg-cover" style="background-image: url('`+image_url+`'); width='100px'; height='100px';"></a>
              </div>
              <div class="card-footer">
                <a href="javascript:void(0)" onclick="image_like(`+element.id+`)" class="d-inline-block text-muted">
                    <strong> `+element.like_count+`</strong> <small class="align-middle">Likes</small>
                </a>
              
                
              </div>
            </div>
        </div>`;
                })
                $("#post_image").html(cart_html);
            }
        });
    }



    function image_like(image_id){ 
        var token = "{{ csrf_token() }}"; //here getting token from blade
        var APP_URL = {!! json_encode(url('/')) !!}
        $.ajax({
            type: "POST",
            url: "{{ url('post-like') }}",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                _token: token,
                image_id:image_id,
            },
            success: function(response) {
                let result = response.data;
                get_post_data();
            },
        });

    }
    </script>

</html>


