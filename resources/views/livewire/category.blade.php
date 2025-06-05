<div>
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10"
                                    data-bs-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                                <div class="row">
                                    <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                        <span class="text-sm">{{ Session::get('demo') }}</span>
                                        <button type="button" class="btn-close text-lg py-3 opacity-10"
                                            data-bs-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                </div>
                        @endif 
    <form wire:submit.prevent="submit">
        <div class="mb-3 col-md-4">
            <label class="form-label">Category:</label>
            <input type="text" name="category" placeholder="Category" class="form-control border border-2 p-2" wire:model="category">
            @error('category')
            <p class='text-danger inputerror'>{{ $message }} </p>
            @enderror
                    
        </div>
        <div class="mb-3 col-md-4">       
            <input type="submit" value="Add Category" class="btn bg-gradient-dark" >
        </div>
    </form>
</div>
