<div>
  <div class="container">
    <img src="{{ URL::to('/logo/lagos.png')}}" class="img">
    <h2 class=" col-md-6 mx-auto"> Circular Manager</h2>
    <div class="form-outline col-md-8 mx-auto">
      <div class="row">
        <div class="col">
          <input type="search" wire:model="search" id="form1" class="form-control border border-success border-4" placeholder="Search Document" aria-label="Search" />
        </div>
       

      </div>

    </div><br>

    <div class="table-responsive">
      <table class="table table-hover">

        <thead class="table-dark">
          <tr>
            <th scope="col">Circular Name</th>
            <th scope="col">Description</th>
            <th scope="col">Files</th>
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach ( $results as $result)
          <tr>
            <td>{{$result->filename}}</td>
            <td>{{$result->body}}</td>
            <td>{{$result->path}}</td>
            <td><a href="https://api.whatsapp.com/send?text={{urlencode(url('/download', $result->path))}}"><i class="btn btn-success">Share</i></a></td>
            <td><a target="_blank" href=" {{url('/view', $result->path)}}" class="btn btn-success"> Preview</a></td>
            <td><a href="{{url('/download', $result->path)}}" class="btn btn-primary"> Download</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="container pagination-wrapper">
        {{ $results->withQueryString()->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
</div>