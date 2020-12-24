
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
      $("#report_table tr:last").after("<tr id='row"+$rowno+"'><td><input type='text' name='rname[]' placeholder='Test Name' value='"+res.name+"'></td><td><input type='text' name='result[]' placeholder='Result'></td><td><input type='text' name='unit[]' placeholder='Enter Units' value='"+res.unit+"'></td><td><input type='hidden' name='refMin[]' value='"+res.min_range+"'><input type='hidden' name='refMax[]' value='"+res.max_range+"'><input type='hidden' name='cost[]' value='"+res.cost+"'></td><td><input type='button' class='btn-danger' value='DELETE' onclick=delete_row('row"+$rowno+"')></td></tr>");
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
        <h1 class="hdg hdg_1 hdg_title">Create Report</h1><br/>


        <div class="gform_body">
	<img class="responsive" src="{{ asset('/uploads/logos')}}/{{App\labs::where('username',Auth::User()->username)->first()->logo}}" alt="login" style="margin:auto;display:block;width: 200px;height: auto;" height='100' width='120'/>
		<br/>	
            @if (session('status'))
                    <br/>
                        <div class="alert alert-success" role="alert">
                         {{ session('status') }}
                        </div>
                    @endif

                         @if (session('error_custom'))
                    <br/>
                        <div class="alert alert-danger" role="alert">
                         {{ session('error_custom') }}
                        </div>
                    @endif
      <br/>

              <form action="{{route('reportFomBill')}}" method="post" autocomplete="off">
            <div style="    box-shadow: -1px 1px 2px 1px rgba(0, 0, 0, 0.1);padding-top: 21px;">
                
                <div class="col-md-12">
                    <h4>Select Patient From Bill Records</h4>
                </div>
                <div class="row" style="margin: 0px 20px">
                    <div class="col-md-8">          
                        <select name="bill_id"  class="form-control">
                          <option class="form-control">Select Patient</option>
                          @foreach ($paitent as $p)
                          <option class="form-control" value="{{$p->id}}">{{$p->name}} | {{$p->addr}} ({{$p->report_name}})</option>
                          @endforeach
                        </select>
                    </div>
                    
                 <div class="col-md-4">
         <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" name="submit" value="Select" tabindex="13" style="line-height: 1.5; height: calc(1.5em + .75rem + 2px);padding: .375rem .75rem;">
                    </div>
            </div>
                </div>
            @csrf
        </form>

        <br/>
       <form method="POST" action="/dashboard/report/new" autocomplete="off">
                             @csrf
  


   <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Paitent Name') }}</label>
                @error('name')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <input id="name" type="text" name="name"  class="medium" value="{{$errors->count() ? old('name'):empty($bill->name) ? null:$bill->name}}">
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
  <input id="age" type="text" name="age"  class="medium" value="{{$errors->count() ? old('age'):empty($bill->age) ? null:$bill->age}}">
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
     <option value="Male" class="medium" {{!$errors->count() ? null:old('gender') == 'Male' ? 'selected':empty($bill->gender) ? null:$bill->gender == 'Male' ? 'selected':null}}>Male</option>
      <option value="Female" class="medium" {{!$errors->count() ? null:old('gender') == 'Female' ? 'selected':empty($bill->gender) ? null:$bill->gender == 'Female' ? 'selected':null}}>Female</option>
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
  <input id="addr" type="text" name="addr"  class="medium" value="{{$errors->count() ? old('addr'):empty($bill->addr) ? null:$bill->addr}}">
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
  <input id="phone" type="text" name="phone"  class="medium" value="{{$errors->count() ? old('phone'):empty($bill->phone) ? null:$bill->phone}}">
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
  <input id="eMail" type="text" name="eMail"  class="medium" value="{{$errors->count() ? old('eMail'):empty($bill->eMail) ? null:$bill->eMail}}">
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
  <input id="report_name" type="text" name="report_name"  class="medium" value="{{$errors->count() ? old('report_name'):empty($bill->report_name) ? null:$bill->report_name}}">
                        </div>
                    </li>
                    <h4>Report Details</h4>
    <table id="report_table" align=center style="width:100%">
   <tr style='display: none' id="rowx">
   </tr>
@if (!empty($bill->details))
@php
$data = json_decode($bill->details,true);
@endphp

  @foreach($data as $k)
   <tr id='row{{$loop->index}}'><td><input type='text' name='rname[]' placeholder='Test Name' value='{{$k['name']}}'></td><td><input type='text' name='result[]' placeholder='Result'></td><td><input type='text' name='unit[]' placeholder='Enter Units' value='{{$k['unit']}}'></td><td><input type='hidden' name='refMin[]' value='{{$k['refMin']}}'><input type='hidden' name='refMax[]' value='{{$k['refMax']}}'><input type='hidden' name='cost[]' value='{{$k['cost']}}'></td><td><input type='button' class='btn-danger' value='DELETE' onclick="delete_row('row{{$loop->index}}')"></td></tr>
  @endforeach

  <input type="hidden" name="bill" value="{{$bill->id}}" />
@endif
  </table>
  <div class="row">
    <div class="col-md-6">
      <select class="form-control" id="report_type">
        <option class="form-control ">Select Report Profile</option>
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
<br/><hr/><br/>
  <li class="gfield field_sublabel_below field_description_below">
     <label class="gfield_label" >{{ __('Footnote') }}</label>
                @error('footnote')
     <br/> <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
      </span>
    @enderror
<div class="ginput_container ginput_container_text">
  <textarea id="footnote" type="text" name="footnote"  class="medium" rows='4'>
    {{$errors->count() ? old('footnote'):null}}
    </textarea>
                        </div>
                    </li>
   <div class="gform_footer top_label"> <input type="submit" id="gform_submit_button_1" class="gform_button btn btn-lg btn-color" value="Save Report" tabindex="13" style="margin-top: 10px; ">


                  </div></form>






        </div>
        <div class="clearfix"></div>
        <br />
    </div>

  </div>
@endsection

