<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="user-profile"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Upload Document'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-100 border-radius-xl mt-4">
                <span class="mask  bg-gradient-primary  opacity-6"></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                   
            
                    
                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h4 class="mb-3">Upload Document</h4>
                            </div>
                        </div>
                        <div class=" me-3 my-3 text-end">
                            <a class="btn bg-gradient-dark mb-0" href="{{route('document')}}"><i
                                    class="material-icons text-sm">arrow_back</i>Back
                            </a>
                        </div>

                        
                        @livewire('category')
                    </div>
                        
                               
                            
                    <div class="card-body p-3">
                        
                        <form method='POST' enctype="multipart/form-data" action="{{ route('post-doc') }}">
                            @csrf
                            <hr>
                            <div class="row">
                                
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Circular Name:</label>
                                    <input type="text" name="name" placeholder="Circular Name" class="form-control border border-2 p-2" >
                                    @error('name')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Keyword:</label>
                                    <input type="text" name="keyword" placeholder="Keyword e.g ICT" class="form-control border border-2 p-2" >
                                    
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Description:</label>
                                    <textarea class="form-control border border-2 p-2" name="body" placeholder="Description"></textarea>
                                    
                                    @error('body')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                   @livewire('sections')
                                   @error('section')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                   
                                </div>
                               

                                <div class=" mb-3 col-md-7">
                                    <label class="form-label">Document:</label>
                                    <input type="file" name ="document" accept="image/jpg, image/jpeg, image/png, .pdf" multiple="multiple"   class="form-control border border-3 p-5" id="exampleFormControlFile1">
                                    @error('document')
                                        <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                
                            </div>
                            <button type="submit" class="btn bg-gradient-dark">Upload Documentt</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
        <x-footers.auth></x-footers.auth>
    </div>
    <x-plugins></x-plugins>

</x-layout>
