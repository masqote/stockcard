@extends('templates.master')
@section('content')

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        			<div class="col-lg-12">
	                      	<section class="panel">
	                          <header class="panel-heading">
	                          	<h3>PO Number : <span class="label label-primary">{{$purchasing->po_number}}</span></h3>
	                          </header>
	                          	<div class="panel-body bio-graph-info">
                              	
                              		<div class="col-md-6">
                              			<h1><b><u>Purchase Detail</u></b></h1>
	                                  <div class="row">
	                                      <label class="col-md-4">Date Purchasing :</label>
	                                      <span>{{$purchasing->date_purchasing}}</span>
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-4">Location :</label>
	                                      <span>{{$purchasing->location}}</span>
	                                  </div>
	                                  <div class="row">
	                                      <label class="col-md-4">Remarks :</label>
	                                      <span>{{$purchasing->remarks}}</span>
	                                  </div>
	                          		</div>

	                          		<div class="col-md-6">
	                          			<h1><b><u>List item</u></b></h1>
	                                  <div class="row">
	                                      <ul class="list-group">
	                                      	@foreach($warehouse as $row)
	                                      		<li class="list-group-item">
	                                      			{{$row->item_code}} - {{$row->item_name}}
	                                      			<span class="badge">{{$row->qty}}</span> 			
	                                      		</li>
	                                      		<li class="list-group-item">
	                                      			
	                                      			<label class="col-sm-4">Actual Receive:</label>
	                                      			<div class="col-sm-4">
	                                      			<input type="text" name="actual" class="form-control"> 			
	                                      			</div><br><br>
	                                      		</li>

	                                      	@endforeach
	                                      </ul>
	                                  </div>
	                          		</div>

                          		</div>
	                      </section>
	                  	</div>
	        </div>
	    </section>
	</section>

@endsection