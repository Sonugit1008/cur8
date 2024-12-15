@extends('layouts.master')
@section('contents')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Analysis</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Product</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"> {{ $totalCount}}</div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Average Price</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₹ {{ number_format($avgPrice, 2) }}</div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                High Price</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">₹ {{ number_format($highPrice, 2) }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Low Price
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">₹ {{ round($lowPrice,2) }}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card shadow mb-4 h-100">
                                <div class="card-header text-primary">Top 5 Highest Rated Products</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Rating</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($topRated as $key=>$product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->rating }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card shadow mb-4 h-100">
                                <div class="card-header text-primary">Top 5 Highest Priced Products</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price (₹)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($highestRatedProducts as $key=>$product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ number_format($product->price,2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card shadow mb-4 h-100">
                                <div class="card-header text-primary">Top 5 Lowest Priced Products</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Price (₹)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($lowestRatedProducts as $key=>$product)
                                                <tr>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ number_format($product->price,2) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="col-xl-6 col-lg-6 mb-4">
                            <div class="card shadow mb-4 h-100">
                                <div class="card-header text-primary">Rating wise Product</div>
                                <div class="card-body">
                                    <div id="product-rating"></div>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>
           
 @endsection

 @section('script')
 <script src="https://code.highcharts.com/highcharts.js"></script>
 <script>
    const chart = Highcharts.chart('product-rating', {
      title: {
        text: '',
        align: 'left'
      },
      colors: ['#00b0c9', '#007d91', '#a8b500', '#ffcc00', '#eb9600'],
      xAxis: {
        categories: ["<?=implode('","',$productRating) ?>"]
      },
      yAxis: {
        allowDecimals: true,
        title: {
          text: 'Product (Count)'
        }
      },
      exporting: {
        filename: 'month_wise_quiz',
        buttons: {
          contextButton: {
            menuItems: ['downloadPNG', 'downloadPDF']
          }
        }
      },
      series: [{
        type: 'column',
        name: 'Participants',
        colorByPoint: true,
        data: [<?=implode(',',$ratingCount) ?>],
        showInLegend: false,
        dataLabels: {
          enabled: true,
          // rotation: -360,
          color: '#ffff',
          align: 'center',
          format: '{point.y:1f}', // one decimal
          y: 10, // 10 pixels down from the top
          verticalAlign: 'top',
          style: {
            fontSize: '13px',
            fontFamily: 'Verdana, sans-serif'

          }
        }
      }]
    });
  </script>




 @endsection
   