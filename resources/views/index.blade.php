@extends('layouts.master')
@section('contents')
                <div class="container-fluid">
                    <div class="card" style="margin: 20px auto;">
                        <div class="card-body text-center">
                          <h5 class="card-title">Web Scraping</h5>
                          <p class="card-text">Welcome to the web scraping feature of my project! Click the button below to fetch and insert data for 200 products seamlessly.</p>
                          <a href="{{ route('scraping')}}" class="btn btn-primary">Web Scraping</a>
                        </div>
                      </div>
                </div>
 @endsection
   