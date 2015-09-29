@extends('layouts.front')

@section('content')
<div id="search-panel">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="spanel">
        <div class="row center">
            <div class="col-xs-12 col-sm-3 col-md-3">
                @include ('country-list')
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                @include ('types-list')
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                @include ('breeds-list')
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <select id="s-gender" class="ui dropdown">
                  <option value="">Pet gender</option>
                  <option value="0">Male</option>
                  <option value="1">Female</option>
                </select>
            </div>
        </div>
    </div>
</div>
<div id="front-text">
    <p>we are connecting pets...</p>
</div>
<div class="search-results">
    <table id="results-table" class="display" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Country</th>
                <th>Name</th>
                <th>Type</th>
                <th>Breed</th>
                <th>Gender</th>
            </tr>
        </thead>
 
        <tfoot>
            <tr>
                <th>Country</th>
                <th>Name</th>
                <th>Type</th>
                <th>Breed</th>
                <th>Gender</th>
            </tr>
        </tfoot>
 
        <tbody>
        </tbody>
    </table>
</div>
@endsection