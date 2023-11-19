<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    </style>
  </head>
  <body>
  
    <div class="container-scroller">
        @include('admin.slidebar')
        @include('admin.header')
        
        <div class="main-panel">
            <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Messages</h4>
                    <p class="card-description"> 
                    </p>
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th> Name </th>
                            <th> Email </th>
                            <th> Subject </th>
                            <th> Message </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($message as $message)
                          <tr>
                            
                          <td>{{$message->name}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->subject}}</td>
                        <td>{{$message->message}}</td>
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

    

  </body>
</html>