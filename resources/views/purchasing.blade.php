@extends('templates.master')
@section('content')

	<section id="main-content">
        <section class="wrapper">
        	<div class="row">
	        			<div class="col-lg-9">
	                      <section class="panel">
	                          <header class="panel-heading">
	                              Purchasing Stock Card
	                          </header>
	                          @if(session()->has('success'))
									    <div class="alert alert-success">
									        {{ session()->get('success') }}
									    </div>
								@endif
	                          <div class="panel-body">
	                              <form action="/purchasing" method="post">
									  <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="inputEmail4">PO Number</label>
									      <input type="text" required="" class="form-control" id="poNumber" name="poNumber" placeholder="PO Number">
									    </div>
									    <div class="form-group col-md-6">
									      <label for="inputEmail4">Supplier Name</label>
									      <input type="text" class="form-control" id="supplierName" name="supplierName" placeholder="Supplier Name">
									    </div>
									   </div>
									   <div class="form-row">
									    <div class="form-group col-md-6">
									      <label for="inputPassword4">Date</label>
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

									      </span>
									    </div>
									    <div class="form-group col-md-6">
									      <label for="inputEmail4">Location</label>
									      <select class="form-control" name="location" id="location">
									      	<option selected>Choose...</option>
									      	<option value="Kadus">Kadus</option>
									      	<option value="Manado">Manado</option>
									      	<option value="Carat">Carat</option>
									      </select>
									    </div>
									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-8">
									      <label for="inputState">Item</label>
									      <select name="itemCode[]" id="itemCode" class="form-control" style="width:100%">
									        <option selected>Choose...</option>
									        @foreach($item as $row)
									        <option value="{{$row->item_code}}">{{$row->item_code}} - {{$row->item_name}}</option>
									        @endforeach
									      </select>
									    </div>
									    <div class="form-group col-md-2">
									      <label for="inputZip">Qty</label>
									      <input type="number" class="form-control" name="qty[]" autocomplete="off">
									    </div>
									    <div class="form-group col-md-1">
									      <label for="inputZip">Add</label>
									      <button type="button" name="add" id="add" class="btn btn-info">+</button>
									    </div>
									  </div>

									  <div id="add_field">
									  

									  </div>
									  <div class="form-row">
									    <div class="form-group col-md-12">
									      <label for="inputEmail4">Remarks</label>
									      <textarea class="form-control" name="remarks" id="remarks"></textarea>
									    </div>
									   </div>
									<div class="form-row">
										<div class="form-group col-md-8">
									  		<button type="submit" class="btn btn-primary">Submit</button>
									  	</div>
									</div>

									{{ csrf_field() }}
									</form>

	                          </div>
	                      </section>
	                  	</div>	
              </div>
        </section>

    </section>

<script src="http://stockcard.test/js/jquery-1.8.3.min.js"></script>

<script>
	$(document).ready(function(e){
		$(function () {
	  		$("select").select2();
		});
	$('select[name*="itemCode"]').change(function(){

    // start by setting everything to enabled
    $('select[name*="itemCode"] option').attr('disabled',false);
    
		var i=1;  
		$("#add").click(function(){
			$("#add_field").append(`
									<div class="form-row">
									    <div class="form-group col-md-8">
									      <label for="inputState">Item</label>
									      <select name="itemCode[]" id="itemCode" class="form-control" style="width:100%">
									        <option selected>Choose...</option>
									        @foreach($item as $row)
									        <option value="{{$row->item_code}}">{{$row->item_code}} - {{$row->item_name}}</option>
									        @endforeach
									      </select>
									    </div>
									    <div class="form-group col-md-2">
									      <label for="inputZip">Qty</label>
									      <input type="number" class="form-control" name="qty[]" autocomplete="off">
									    </div>
									    <div class="form-group col-md-1 tes">
									    <label for="inputZip">Del</label>
									    <button type="button" name="remove" id="remove" class="btn btn-danger">X</button>
									    </div>
									</div>

			`);

		// loop each select and set the selected value to disabled in all other selects
	    $('select[name*="itemCode"]').each(function(){
	        var $this = $(this);
	        $('select[name*="itemCode"]').not($this).find('option').each(function(){
	           if($(this).attr('value') == $this.val())
	               $(this).attr('disabled',true);
	        });
	    });

	    	// search canggih
			$(function () {
		  		$("select").select2();
			});
		});

		// Remove div append on click
		$('#add_field').on('click', '.tes', function(e) {
		    e.preventDefault();

		    $(this).parent().remove();
		});
	});
});

</script>

@endsection