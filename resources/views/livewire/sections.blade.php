<div>
    <label class="form-label">Category:</label>
    <select class="form-control border border-2 p-2"  name="section"  wire:click="check()">
        <option class="form-control"  >Select</option>
        <option class="form-control"  >All</option>
        @foreach($data as $data)
        <option class="form-control" value="{{$data->category}}" wire:key="{{ $data->id }}"> {{$data->category}} </option>
        
        @endforeach
    </select>
    
</div>
