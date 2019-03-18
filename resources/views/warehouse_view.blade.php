@extends('templates.master')
@section('content')

<style type="text/css">
	


</style>

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        			<div class="col-lg-12">
	                      	<section class="panel">
	                          <header class="panel-heading">
	                          	<div class="row">
		                          	<div class="col-md-6">
		                          	<h3>PO Number : <span class="label label-primary">{{$purchasing->po_number}}</span></h3>
		                          	</div>
		                          	<div class="col-md-6">
		                          	<h3 align="right"><input type="submit" class="btn btn-primary" value="Receive" data-toggle="modal" data-target="#myModal"> </h3>
	                          		</div>
	                         	</div>
	                          </header>
	                          @if(session()->has('success'))
									    <div class="alert alert-success">
									        {{ session()->get('success') }}
									    </div>
									@endif
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
	                          		

                          				@php
                                  		$no = 0;
                                  		$qq	= COUNT($transaction)
	                                  	@endphp

	                                  	@foreach($transaction as $row)
	                                  	
	                                  	@php
	                                      $item_code[$no] = $row->item_code_transaction;
	                                      $qty_transac[$no] = $row->qty_transaction;
	                                      $no++;
                                      	@endphp
                                  		@endforeach


	                          		<div class="col-md-6">
	                          			<h1><b><u>List item</u></b></h1>
	                                  <div class="row">
	                                      <ul class="list-group">
	                                      	@foreach($warehouse as $row)
	                                      		
	                                      		
	                                      		<li class="list-group-item">
	                                      		@php

		                                      		$r = 0;
		                                      		$nonal = 0;
		                                      		while($r < $qq)
		                                      		{
		                                      			if($row->item_code == $item_code[$r])
		                                      			{
		                                      				
		                                      				$nonal += $qty_transac[$r];

		                                      			}
	                                      			$r++;
		                                      		}
	                                      		
	                                      		@endphp
	                                      			<br /><br /><br />
	                                      			{{$row->item_code}} - {{$row->item_name}}
	                                      			<span class="badge" style="background: green;">{{$row->qty}}</span>
	                                      			<br><br>
	                                      			<label class="col-sm-4">Less Receive :</label>
	                                      			<div class="col-sm-4">
	                                      			<span class="label label-danger" id="less">{{$row->qty - $nonal}}</span>
	                                      			</div><br>
	                                      		</li>
	                                      		
	                                      		
	                                      	@endforeach
	                                      </ul>
	                                  </div>
	                          		</div>
	                          	
                          		</div>

			                          	<div class="panel-body bio-graph-info">
		                              	
		                              		<div class="col-md-6">
		                              			<h1><b><u>History</u></b></h1>
		                              		</div>
		                              	 <div class="panel-body">
		                              		<div class="adv-table">
			                                     <table class="display table table-bordered table-striped" id="tes">
			                                      <thead>
			                                      <tr>
			                                      	  <th>No</th>
			                                          <th>PO Number</th>
			                                          <th>Date Receive</th>
			                                          <th>Item Detail</th>
			                                          <th>Actual Receive</th>
			                                          <th>Surat Jalan</th>
			                                          <th>Tanda Terima</th>
			                                          <th>Invoice Number</th>
			                                      </tr>
			                                      </thead>
			                                      <tbody>
			                                      	@php
			                                      		$no = 1;
			                                      	@endphp
			                                      	@foreach($transaction as $row)
			                                      <tr class="gradeX">
			                                      	
			                                      	  <td>{{$no++}}</td>
			                                          <td>{{$row->po_number_transaction}}</td>
			                                          <td>{{$row->date_transaction}}</td>
			                                          <td>{{$row->item_code_transaction}}</td>
			                                          <td>{{$row->qty_transaction}}</td>
			                                          <td>{{$row->surat_jalan}}</td>
			                                          <td>{{$row->tanda_terima}}</td>
			                                          <td>{{$row->invoice_number}}</td>
			                                       
			                                      </tr>
			                                      	@endforeach
			                                      </tbody>
			                                      <tfoot>
			                                      <tr>
			                                      	  <th>No</th>
			                                          <th>PO Number</th>
			                                          <th>Date Receive</th>
			                                          <th>Item Detail</th>
			                                          <th>Actual Receive</th>
			                                          <th>Surat Jalan</th>
			                                          <th>Tanda Terima</th>
			                                          <th>Invoice Number</th>
			                                      </tr>
			                                      </tfoot>
			                          			</table>
			                                </div>
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
              $('#tes').dataTable( {
                  "aaSorting": [[ 0, "desc" ]]
              } );
          } );
</script>

<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                              <h4 class="modal-title">Receive - {{$purchasing->po_number}}</h4>
                                          </div>
                                          <div class="modal-body">

                                              <form role="form" action="/warehouse/{po_number}" method="post">
                                              	<div class="form-row">
                                              	<div class="col-lg-12">
                                                  <div class="form-group">
                                                      <label for="exampleInputEmail1">Item Code</label>
                                                      <select class="form-control" name="itemCode">
                                                      	@foreach($warehouse as $row)
                                                      	<option value="{{$row->item_code}}">{{$row->item_code}} - {{$row->item_name}}</option>
                                                      	@endforeach
                                                      </select>
                                                  </div>
                                             	 </div>
                                              	</div>
                                            <div class="form-row">
                                              	<div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Date</label>
                                                       <span class="form-control" style="background: black; color: yellow; text-align: center;">
                                                       	<script>
												      		var d = new Date();

															var month = d.getMonth()+1;
															var day = d.getDate();

															var output = d.getFullYear() + '/' +
															    (month<10 ? '0' : '') + month + '/' +
															    (day<10 ? '0' : '') + day + ' - ';

															var time = d.getHours() + ":" + d.getMinutes() + ":" + d.getSeconds();
															document.write(output,time);
												      	</script>
                                                  </div>
                                              	</div>
                                              	<div class="col-lg-6">
                                              		@foreach($warehouse as $row)
                                              		@php

		                                      		$r = 0;
		                                      		$nonal = 0;
		                                      		while($r < $qq)
		                                      		{
		                                      			if($row->item_code == $item_code[$r])
		                                      			{
		                                      				
		                                      				$nonal += $qty_transac[$r];

		                                      			}
	                                      			$r++;
		                                      		}
	                                      		
	                                      			@endphp
	                                      			@endforeach
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Actual Receive</label>
                                                      <input type="number"  name="actualReceive" min="0" class="form-control" id="input1" step="any" oninput="check(this)" placeholder="Actual Receive">


                                                      <script type="text/javascript">
                                                      	
                                                      		var data = $(this).attr("less");
                                                      		function check (input) {
                                                      			if (input.value > data) {
                                                      				input.SetCustomValidity("The number should be lower than this");
                                                      			} else {
                                                      				input.SetCustomValidity('');
                                                      			}
                                                      		}

                                                      </script>

                                                  </div>
                                              	</div>
                                            </div>


                                            <div class="form-row">
                                              	<div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Surat Jalan</label>
                                                       <input type="text" name="suratJalan" class="form-control" id="exampleInputPassword3" placeholder="Surat Jalan">
                                                  </div>
                                              	</div>
                                              	<div class="col-lg-6">
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Tanda Terima</label>
                                                       <input type="text" name="tandaTerima" class="form-control" id="exampleInputPassword3" placeholder="Tanda Terima">
                                                  </div>
                                              	</div>
                                            </div>

                                            <div class="form-row">
                                              	<div class="col-lg-12">
                                                  <div class="form-group">
                                                      <label for="exampleInputPassword1">Invoice Number</label>
                                                       <input type="text" name="invoiceNumber" class="form-control" id="exampleInputPassword3" placeholder="Invoice Number">
                                                  </div>
                                              	</div>
                                            </div>


                                                  &nbsp &nbsp &nbsp<button type="submit" class="btn btn-primary">Submit</button>

                                            <input type="hidden" name="poNumber" value="{{$purchasing->po_number}}">
                                                  {{ csrf_field() }}
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>


@endsection