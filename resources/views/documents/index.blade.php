<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Documents"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Documents</h6>
                                </div>
                            </div>
                            <div class="card card-body mx-3 mx-md-4 ">
                                    <div class=" me-3 my-3 text-end">
                                        <a class="btn bg-gradient-dark mb-0" href="{{route('create')}}"><i
                                                class="material-icons text-sm">add</i>&nbsp;&nbsp;Add Document
                                        </a>
                                    </div>   
                                <div class="row gx-4 mb-2">
                                    
                                    <div class="col-auto my-auto">
                                        <div class="h-100">
                                            <h6 class="mb-1">
                                                <a href="">All ({{$documents->count()}}) </a> 
                                                <!-- |<a href=" "> Trash (0) </a>  -->
                                            </h6>
                                            
                                        </div>
                                    </div>
                                      
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
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
                                <div class="table-responsive p-0">
                                    
                                    <table class="table align-items-center mb-0">
                                        
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">
                                                    Circular Name</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    User</th>
                                               

                                                
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                   
                                                </th>
                                            </tr>
                                        </thead>
                                       @foreach($documents as $document)
                                        <tbody>
                                            <tr>
                                                <td class="align-middle">
                                                    
                                                    <p class="text-sm font-weight-bold mb-0 ps-5">{{$document->filename}}</p>
                                                           
                                                     
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">{{$document->name}}</p>
                                                    
                                                </td>
                                               
                                               
                                                
                                                
                                                <td class="align-middle">
                                                    
                                                    <!-- <a class="btn btn-link  px-3 mb-0 bg-gradient-success" href="">
                                                        Download<i class="material-icons text-sm me-2">download</i></a> -->
                                                    
                                                   
                                                    <a class="btn btn-link  text-gradient px-3 mb-0 bg-gradient-danger" href="{{route('delete-file',['id'=> $document->id])}} ">
                                                        Delete <i class="material-icons text-sm me-2">delete</i>
                                                    </a>
                                                    
                                                </td>
                                                
                                            </tr>
                                           
                                           
                                        </tbody>
                                        @endforeach
                                    </table>
                                    
                                </div><br>
                                <div class="row d-flex justify-content-center">
                                    <!--Grid column-->
                                    <div class="col-md-6">
                                       
                                    </div>
                                    <!--Grid column-->
                                </div>  
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
