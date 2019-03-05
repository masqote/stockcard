@extends('templates.master')
@section('content')

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        			<div class="col-lg-6">
	                      <section class="panel">
	                          <header class="panel-heading">
	                              Group Master Code
	                          </header>
	                          <div class="panel-body">
	                          	 @if(session()->has('message'))
									    <div class="alert alert-danger">
									        {{ session()->get('message') }}
									    </div>
									@endif
									@if(session()->has('message1'))
									    <div class="alert alert-success">
									        {{ session()->get('message1') }}
									    </div>
									@endif
	                              <form action="group_master_code" method="post">
	                                  <div class="form-group">
	                                      <label for="exampleInputEmail1">Name Group</label>
	                                      <input type="text" class="form-control" id="nameGroup" name="nameGroup" placeholder="Enter Name Group">
	                                  </div>
	                                  <button type="submit" class="btn btn-info">Submit</button>
	                                  {{ csrf_field() }}
	                              </form>

	                          </div>
	                      </section>
	                  	</div>	
              </div>
        </section>
    </section>

@endsection