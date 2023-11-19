<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
   integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">


    .img_size
    {
        width:200px;
        height:100px;
    }

    </style>
  </head>
  <body>
  
    <div class="container-scroller">
    @include('sweetalert::alert')
        @include('admin.slidebar')
        @include('admin.header')
        
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">All products</h4>
                    <p class="card-description"> 
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Catagory</th>
                        <th>Price</th>
                        <th>Discount Price</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Edit</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $product)
                          <tr>
                            
                          <td>{{$product->title}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->catagory}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->discount_price}}</td>
                        <td><img class="img_size" src="/product/{{$product->image}}"></td>
                        <td><a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$product->id)}}">Delete</a></td>
                        <td><a class="btn btn-success" href="{{url('update_product',$product->id)}}">Edit</a></td>
                          </tr>
                          @endforeach
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>

            </div>
        </div>

  
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->

    <script>
      function confirmation(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href');  
        console.log(urlToRedirect); 
        swal({
            title: "Are you sure to delete this Product",
            text: "You will not be able to revert this!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willCancel) => {
            if (willCancel) {   
                window.location.href = urlToRedirect; 
            }  
        }); 
    }
</script>

  </body>
</html>