@extends('templates.master')
@section('content')

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        			<div class="col-lg-12">
	                      <section class="panel">
	                          <header class="panel-heading">
	                              Group Master Code

	                          </header>
	                          <div class="panel-body">
	                          		<div class="adv-table">
                                    <table  class="display table table-bordered table-striped" id="example">
                                      <thead>
                                      <tr>
                                      	  <th>No</th>
                                          <th>PO Number</th>
                                          <th>Date Purchasing</th>
                                          <th>Supplier Name</th>
                                          <th>Location</th>
                                          <th>Remarks</th>
                                          <th>Status</th>
                                          <th>Action</th>
                                      </tr>
                                      </thead>
                                      <tbody>

                                      	@php
                                      		$no = 1;
                                      	@endphp

                                        @foreach($sumtrans as $asd)
                                          {{$asd->po_number}}
                                          {{$asd->total}}
                                        @endforeach
                                        <br>

                                        @foreach($sumdetail as $ha)
                                          {{$ha->po_number_transaction}}
                                          {{$ha->total}}
                                        @endforeach

                                      	@foreach($sumtrans as $row)
                                      <tr class="gradeX">
                                      	  <td>{{$no++}}</td>
                                          <td>{{$row->po_number_transaction}}</td>
                                          <td>{{$row->date_purchasing}}</td>
                                          <td>{{$row->supplier_name}}</td>
                                          <td>{{$row->location}}</td>
                                          <td>{{$row->remarks}}</td>
                                          <td>
                                            {{$row->total}}
                                          </td> 
                                          <td>
                                          	<a href="/warehouse/{{$row->po_number_transaction}}"><button class="btn btn-primary">View</button></a>
                                          </td>
                                      </tr>
                                      	@endforeach
                                      </tbody>
                                      <tfoot>
                                      <tr>
                                      	  <th>No</th>
                                          <th>PO Number</th>
                                          <th>Date Purchasing</th>
                                          <th>Supplier Name</th>
                                          <th>Location</th>
                                          <th>Remarks</th>
                                          <th>Status</th>
                                          <th>Action</th>
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