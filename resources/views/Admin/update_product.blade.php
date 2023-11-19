<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    
    @include('admin.css')

    <style type="text/css">
        .div_center
        {
            text-align:center;
            padding-top:40px;
        }

        .font_size
        {
            font-size:40px;
            padding-bottom:40px;
        }
        
        .text_color
        {
            color:black;
            padding-bottom:20px;
        }

        label
        {
            display:inline-block;
            width:200px;
        }

        .div_design
        {
            padding-bottom:15px;
        }

    </style>
  </head>
  <body>
  @include('sweetalert::alert')
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.slidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
     
        <div class="main-panel">
            <div class="content-wrapper">

                <div class="div_center">

                <h1 class="font_size">Update Product</h1>
                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Title</label>
                            <div class="col-sm-9">
                              <input style="color:black;" type="text" name="title" placeholder="Write a Title" required="" value="{{$product->title}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Description</label>
                            <div class="col-sm-9">
                              <input style="color:black;" type="text" name="description" placeholder="Write a Description" required="" value="{{$product->description}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Price</label>
                            <div class="col-sm-9">
                              <input style="color:black;" type="number" name="price" placeholder="Input Price" required="" value="{{$product->price}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Discount Price</label>
                            <div class="col-sm-9">
                              <input style="color:black;" type="number" name="dis_price" placeholder="Input Discount Price" value="{{$product->discount_price}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Quantity</label>
                            <div class="col-sm-9">
                              <input style="color:black;" type="number" name="quantity" min="0" placeholder="Input Quantity" required="" value="{{$product->quantity}}" class="form-control" />
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Catagory</label>
                            <div class="col-sm-9">
                              <select class="form-control" name="catagory">
                                <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                                @foreach($catagory as $catagory)
                                <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>

                <div class="div_design">
                    <label>Current Product Image</label>
                    <img style="margin:auto;" height="100" width="100" src="/product/{{$product->image}}">
                </div>

                <div class="div_design">
                    <label>Change Product Image</label>
                    <input type="file" name="image" required="" class="form-control" />
                </div>

                <div class="div_design">
                    <input  type="submit" value="Update Product" class="btn btn-primary">
                </div>          
                </form>
                </div>
            </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>