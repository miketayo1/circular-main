<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="application/pdf; charset=utf-8" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests " > 
    <link
         href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css"
         rel="stylesheet"
         integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1"
         crossorigin="anonymous"
      />
        <title>
           Circular Viewer
        </title>
    </head>
    <body class = "container">
        <div class="form-outline col-md-8 mx-auto">
        
        <h3 class=" col-md-7 mx-auto">{{$data->filename}}</h3>
            
            <!-- <iframe src ="{{ URL::to('/laraview/#../documents') }}/{{$data->path}}" width="1000px" height="600px"></iframe> -->
            <iframe src= "{{ URL::to('/documents')}}/{{$data->path}}#toolbar=0"  width="1000px" height="600px" > </iframe>
        </div>

        <script
         src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
         integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW"
         crossorigin="anonymous"
      ></script>
    </body>
</html>