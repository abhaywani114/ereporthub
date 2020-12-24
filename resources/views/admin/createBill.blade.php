
@section('title','Create Report - eReportHub')

@extends('layout.main')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('css')
     

     @media only screen and (min-width: 674px) {
 	.pad_30{padding:30px};
  
    }

	@media only screen and (max-width: 673px) {
		.pad_30{padding-top:30px;}
    }
    .invalid-feedback{color:red}
    .alert-success{color:green}
    .hdg {text-align:center}
   .contact-name, .contact-email, .contact-subject {
    width:100%;
	max-width: unset;
	}
@endsection


@section('js')
<script type="text/javascript">
  
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

function add_row()
{
  const id = $("#report_type").val()
  console.log($("#report_table tr").length)
 $rowno=$("#report_table tr").length;
 $rowno=$rowno+1;

     $.ajax({
    type: "GET",
    url: "/dashboard/reportprofiles/" + id,
    success: function(res){
      $("#report_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='rname[]' placeholder='Test Name' value='"+res.name+"'></td><td style='display:none'><input type='text' name='result[]' placeholder='Result'></td><td><input type='text' name='cost[]' placeholder='Enter Cost' value='"+res.cost+"'></td><td><input type='hidden' name='refMin[]' value='"+res.min_range+"'><input type='hidden' name='refMax[]' value='"+res.max_range+"'><input type='hidden' name='unit[]' value='"+res.unit+"'></td><td><input type='button' class='btn-danger' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
    }
    });


}
function delete_row(rowno)
{
 $('#'+rowno).remove();
}
</script>
@endsection

@section('content')
<div class="cointainer col-lg-10" style="margin: 8vh auto;;">
    
    <div class="pad_30">
        <h1 class="hdg hdg_1 hdg_title">Create Bill</h1><br/>


        <div class="gform_body">
	<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
		<br/>	
            @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                        </div>
                    @endif
      <br/>
       <form method="POST" action="/dashboard/bills" autocomplete="off">
                             @csrf
  


   <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Paitent Name') }}</label>
                @error('name')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="name" type="text" name="name"  class="medium" value="{{$errors->count() ? old('name'):null}}">
                        </div>
                    </li>

<li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Paitent Age') }}</label>
                @error('age')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="age" type="text" name="age"  class="medium" value="{{$errors->count() ? old('age'):null}}">
                        </div>
                    </li>

<li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Paitent Gender') }}</label>
                @error('gender')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <select id="gender" type="text" name="gender"  class="medium" required>
     <option  class="medium">Select gender</option>
     <option value="Male" class="medium" {{!$errors->count() ? null:old('gender') == 'Male' ? 'selected':null}}>Male</option>
      <option value="Female" class="medium" {{!$errors->count() ? null:old('gender') == 'Female' ? 'selected':null}}>Female</option>
  </select>
                        </div>
                    </li>


  <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Residence') }}</label>
                @error('addr')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="addr" type="text" name="addr"  class="medium" value="{{$errors->count() ? old('addr'):null}}">
                        </div>
                    </li>

  <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Phone No') }}</label>
                @error('phone')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="phone" type="text" name="phone"  class="medium" value="{{$errors->count() ? old('phone'):null}}">
                        </div>
                    </li>

  <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('E-mail Address') }}</label>
                @error('eMail')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="eMail" type="text" name="eMail"  class="medium" value="{{$errors->count() ? old('eMail'):null}}">
                        </div>
                    </li>

<li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Report Name') }}</label>
                @error('report_name')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="report_name" type="text" name="report_name"  class="medium" value="{{$errors->count() ? old('report_name'):null}}">
                        </div>
                    </li>
                    <h4>Bill Details</h4>
    <table id="report_table" align=center style="width:100%">
   <tr style='display: none' id="row1">

   </tr>
  </table>
  <div class="row">
    <div class="col-md-6">
      <select class="form-control" id="report_type">
        <option class="form-control ">Select Report Type</option>
        @foreach ($report as $v => $k)
         <option class="form-control " value="{{$k}}">{{$v}}</option>
        @endforeach
      </select>
    </div>
    <div class="col-md-6">
<input type="button" onclick="add_row();" value="ADD ROW" style="height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;color: #2D95E3">
</div>
</div>
<br/>
   <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Save Bill" tabindex="13" style="margin-top: 10px; ">


                  </div></form>






        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection

