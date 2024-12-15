@extends('layouts.master')
@section('contents')

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Web Scraping</h1>
    </div>
    <!-- Content Row -->
    <div class="row justify-content-center">
        <!-- Card -->
        <div class="col-xl-6 col-md-6 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-xs font-weight-bold text-uppercase mb-3">
                                <h1 id="progress-text"><strong>Scraping in Progress...</strong></h1>
                            </div>
                            <div id="progress-container" class="my-3">
                                <!-- Loader -->
                                <div id="loader" class="spinner-border text-primary" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                                {{-- <p id="progress-text" class="mt-3">Progress: 0%</p> --}}
                            </div>
                            <a href="{{ route('product-list') }}" id="product-link" class="text-center d-none">Go to Product List</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
      
      
       // return false
       
        function checkProgress() {
            $("#loader").show();
            $("#progress-text").show();
            $("#product-link").addClass("d-none"); 
            $.ajax({
                url: "{{ route('scraping-data') }}", 
                method: 'GET',
                success: function (data) {
                   // if (data.progress < 100) {
                       
                        // $("#progress-text").text("Progress: " + data.progress + "%");
                
                        // setTimeout(checkProgress, 2000);
                   // } else {
                     
                        $("#progress-text").text("Scraping Completed!");
                        $("#loader").hide();
                        $("#product-link").removeClass("d-none"); 
                  //  }
                },
                error: function (error) {
                    console.error("Error checking progress:", error);
                    $("#loader").hide();
                    $("#progress-text").text("An error occurred while scraping.");
                }
            });
        }
        checkProgress();
    });
</script>
@endsection
