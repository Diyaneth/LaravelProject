<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
   integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
    .title_deg
    {
        text-align:center;
        font-size:25px;
        font-weight:bold;
        padding-bottom:40px;
    }

    .table_deg
    {
        border:2px solid teal;
        width:100%;
        margin:auto;
        text-align:center;
    }

    .th_deg
    {
        background-color:teal;
    }

    .img_size
    {
        width:200px;
        height:100px;
    }

    </style>
  </head>
  <body>
  @include('sweetalert::alert')
    <div class="container-scroller">
        @include('admin.slidebar')
        @include('admin.header')
        
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>

                <div style="padding-left:400px; padding-bottom:30px;">
                    <form action="{{url('search')}}" method="get">
                        @csrf
                        <input type="text" style="color:black;" name="search" placeholder="Search for Something">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>

                <table class="table_deg">
                    <tr class="th_deg">
                        <th style="padding:10px;">Name</th>
                        <th style="padding:10px;">Email</th>
                        <th style="padding:10px;">Address</th>
                        <th style="padding:10px;">Phone</th>
                        <th style="padding:10px;">Product Title</th>
                        <th style="padding:10px;">Quantity</th>
                        <th style="padding:10px;">Price</th>
                        <th style="padding:10px;">Payment Status</th>
                        <th style="padding:10px;">Delivery Status</th>
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Delivered</th>
                        <th style="padding:10px;">Print pdf</th>
                        <th style="padding:10px;">Send Email</th>
                    
                    </tr>
                    @forelse($order as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->email}}</td>
                        <td>{{$order->address}}</td>
                        <td>{{$order->phone}}</td>
                        <td>{{$order->product_title}}</td>
                        <td>{{$order->quantity}}</td>
                        <td>{{$order->price}}</td>
                        <td>{{$order->payment_status}}</td>
                        <td>{{$order->delivery_status}}</td>
                        <td>
                            <img class="img_size" src="/product/{{$order->image}}">
                        </td>
                        <td>
                        @if($order->delivery_status=='processing')
                            <a href="{{url('delivered',$order->id)}}" onclick="confirmation(event)" class="btn btn-primary">Delivered</a>
                        @else
                        <p style="color:green;">Delivered</p>
                        @endif
                        </td>
                        <td>
                            <a href="{{url('print_pdf',$order->id)}}" class="btn btn-secondary">Print PDF</a>
                        </td>
                        <td>
                            <a href="{{url('send_email',$order->id)}}" class="btn btn-info">Send Email</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>
                    @endforelse
                </table>

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
            title: "Are you sure to delivered this Order",
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