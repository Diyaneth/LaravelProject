<!DOCTYPE html>
<html lang="en">
  <head>
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
                      <table class="table table-striped">
                        <thead>
                          <tr>
                            
                            <th> Name </th>
                            
                            <th> Feedback </th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($feedback as $feedback)
                          <tr>
                            
                          <td>{{$feedback->F_name}}</td>
                        <td>{{$feedback->F_feedback}}</td>
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