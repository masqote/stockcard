@extends('templates.master')
@section('content')

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        	<div class="col-lg-10">
	                      <section class="panel">
	                          <header class="panel-heading">
	                             <b>Add master Code</b>
	                          </header>
	                          <div class="panel-body">
	                              <form action="/master_code" method="post">
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
	                              	<div class="col-lg-6">
	                                  <div class="form-group">
	                                      <label for="exampleInputEmail1">Item Code</label>
	                                      <input type="text" class="form-control" id="itemCode" name="itemCode" placeholder="X...">
	                                  </div>
	                                  <div class="form-group">
	                                      <label for="exampleInputEmail1">Group</label>
	                                      <select class="form-control" name="itemGroup">
	                                      @foreach($groupMasterCode as $row)
	                                      	<option value="{{$row->id_group}}">{{$row->name_group}}</option>
	                                      @endforeach
	                                      </select>
	                                  </div>
	                              	</div>
	                              	<div class="col-lg-6">
	                              		<div class="form-group">
	                                      <label for="exampleInputPassword1">Item Name</label>
	                                      <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Item Name">
	                                 	 </div>
	                                  <div class="form-group">
	                                      <label for="exampleInputPassword1">UoM</label>
	                                      <input type="text" class="form-control" id="uom" name="itemUom" placeholder="Kg, Bags, Liter...">
	                                  </div>
	                              	</div>
	                              	<div class="col-lg-6">
	                                  <button type="submit" class="btn btn-primary">Submit</button>
	                                  {{ csrf_field() }}
	                              	</div>
	                              </form>

	                          </div>
	                      </section>


	                      <section class="panel">
	                          <header class="panel-heading">
	                             <b> Master Code</b>
	                          </header>
	                          <div class="panel-body">
	                          		<div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                      	  <th>No</th>
                                          <th>Item Code</th>
                                          <th>Item Name</th>
                                          <th>Group</th>
                                          <th>UoM</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                      	@php
                                      		$no = 1;
                                      	@endphp
                                      	@foreach($masterCode as $row)
                                      <tr class="gradeX">
                                      	  <td>{{$no++}}</td>
                                          <td>{{$row->item_code}}</td>
                                          <td>{{$row->item_name}}</td>
                                          <td>{{$row->name_group}}</td>
                                          <td>{{$row->uom}}</td>
                                      </tr>
                                      	@endforeach
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                      	  <th>No</th>
                                          <th>Item Code</th>
                                          <th>Item Name</th>
                                          <th>Group</th>
                                          <th>UoM</th>
                                      </tr>
                                      </tfoot>
                          </table>
                                </div>
	                          </div>
	                       </section>
	            </div>
              </div>

    	</section>
    </section>

<script src="http://stockcard.test/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 0, "desc" ]]
              } );
          } );
</script>
@endsection