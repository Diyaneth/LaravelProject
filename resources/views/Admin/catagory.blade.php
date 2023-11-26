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
  
    <div class="container-scroller">
    @include('sweetalert::alert')
        @include('admin.slidebar')
        @include('admin.header')
        
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Feedbacks</h4>
                    <p class="card-description"> 
                    </p>
                    <div class="table-responsive">
                    <form action="{{url('add_catagory')}}" method="POST">
                @csrf
                <input style="color:black;" type="text" name="catagory" required placeholder="Input Catagory Name">
                
                <input type="submit" class="btn btn-primary" name="submit" value="Add Catagory">
              </form>
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th> Catagory Name </th>
                            
                            <th> Delete </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $data)
                          <tr>
                            
                          <td>{{$data->catagory_name}}</td>
                          <td>
                            <a onclick="confirmation(event)" class="btn btn-danger" href="{{url('delete_catagory',$data->id)}}">Delete</a>
                         </td>
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