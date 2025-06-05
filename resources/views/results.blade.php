<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <title>Results</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet" />
    <link href="css/result.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ URL::to('/logo/lagos.png')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="s002  ">
      <form class="row d-flex justify-content-center" method='POST'  action="{{ route('post-search') }}">
      @csrf
        <div class="inner-form">
          <div class="input-field first-wrap">
            
          <input id="search" name = "search" value="{{$query}}" type="text" placeholder="What are you looking for?" />
          </div>
          
          
          <div class="input-field fifth-wrap">
          <input class="btn-search" type="submit" value="Search">
          </div>
        </div>
      </form>
      <!-- <h3>Results for {{$query}} </h3> -->
        <div class="col-md-10  table-responsive">
            <table class="table">
                
                <thead>
                    <tr>
                    
                    <th scope="col">Filename</th>
                    <th scope="col">Description</th>
                    <th scope="col">File</th>
                    <th scope="col"></th>
                    <!-- <th scope="col"></th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach( $results as $result)
                    <tr>
                    
                    <td>{{$result->filename}}</td>
                    <td>{{$result->body}}</td>
                    <td>{{$result->path}}</td>
                    <!-- <td><a  target="_blank" href=" {{url('/view', $result->id)}}" class="btn btn-success"> Preview</a></td> -->
                    <td ><a href="{{url('/download', $result->path)}}" class="btn btn-primary" > Download</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
    <script src="js/extention/choices.js"></script>
    <script src="js/extention/flatpickr.js"></script>
    <script>
      flatpickr(".datepicker",
      {});

    </script>
    <script>
      const choices = new Choices('[data-trigger]',
      {
        searchEnabled: false,
        itemSelectText: '',
      });

    </script>
  </body>
</html>
