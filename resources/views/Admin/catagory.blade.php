<!DOCTYPE html>
<html lang="en">
  <head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" 
   integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
   crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
      .div_center
      {
        text-align: center;
        padding-top:40px;
      }
      .h2_font
      {
        font-size: 40px;
        padding-bottom: 40px;
      }
      .input_color
      {
        color:black;
      }
      .center
      {
        margin: auto;
        width:50%;
        text-align:center;
        margin-top: 30px;
        border: 3px solid teal;
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
            @if(session()->has('message'))
              
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                {{session()->get('message')}}
              </div>

            @endif
            <div class="div_center">
              <h2 class="h2_font">Add Catagoy</h2>

              <form action="{{url('add_catagory')}}" method="POST">
                @csrf
                <input class="input_color" type="text" name="catagory" placeholder="Input Catagory Name">
                
                <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
              </form>

              <table class="center">
                <tr>
                  <td>Catagory Name</td>
                  <td>Action</td>
                </tr>

                @foreach($data as $data)

                <tr>
                  <td>{{$data->catagory_name}}</td>
                  <td>
                    <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                  </td>
                </tr>
                @endforeach
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
            title: "Are you sure to delete this Catagory",
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