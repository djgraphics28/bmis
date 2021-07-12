@extends('admin.template.master')

@section('main_content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <a href="#" data-toggle="modal" data-target="#modal-station">
            <button disabled type="button" class="btn btn-success btn-sm">.</button>
        </a>

        <ol class="breadcrumb">
            <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Barangay Clearance</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Barangay Clearance</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="search">Search and Select Name of Barangay Citizen</label>
                            <select name="search" id="search" class="form-control select2">
                                <option selected disabled> Search and Select Name of Barangay Citizen </option>
                                @foreach ($records as $item)
                                    <option value="{{ $item->id }}">{{ $item->fname . " " . $item->mname . " " . $item->lname . " " . $item->ename }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-2">
                        <label for=""></label>
                        <div class="form-group">
                            <button id="btn-search" class="btn btn-primary">Search</button>
                        </div>
                    </div> --}}
                </div>
                <hr>
                <h3>Barangay Clearance Logs</h3>
                <table class="table table-bordered table-hover datatable" id="bc_tbl" width="100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Date Requested</th>
                            <th>Prepared by</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @if (isset($data))
                        @foreach ($data as $item)
                        <tr>
                            <td>{{ $item->unique_id_num }}</td>
                            <td>{{ $item->full_name }}</td>
                            <td class="text-right">&#8369; {{ number_format($item->pension_amount, 2) }}</td>
                            <td>{{ date('m/d/Y h:i a', strtotime($item->created_at)) }}</td>
                            <td>{{ date('m/d/Y h:i a', strtotime($item->updated_at)) }}</td>
                            <td>
                                <a href="javascript:void(0);" id="btn-edit" data-id="{{ $item->id }}" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> </a>&nbsp;<a href="javascript:void(0);" id="btn-del" data-id="{{ $item->id }}" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-trash"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                        @endif --}}
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

         <!-- View Record modal -->
         <div class="modal fade" id="view-record" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">
                                View Information
                        </h4>
                    </div>
                    <div class="modal-body" style="background-color: #f1f1f1db!important;">
                        <div class="row">
                            <div class="col-md-3">

                              <!-- Profile Image -->
                              <div class="box box-primary">
                                <div class="box-body box-profile">
                                  <img class="profile-user-img img-responsive" id="prof_pic" src="" alt="User profile picture">

                                  <h5 class="profile-username text-center" id="profile-username"></h5>

                                  <p class="text-muted text-center" id="idnum"></p>

                                  <ul class="list-group list-group-unbordered">
                                    <li class="list-group-item">
                                      <b>Age</b> <a class="pull-right" id="prof-age"></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Birthday</b> <a class="pull-right" id="prof-bday"></a>
                                    </li>
                                    <li class="list-group-item">
                                      <b>Gender</b> <a class="pull-right" id="prof-gender"></a>
                                    </li>
                                  </ul>
                                </div>
                                <!-- /.box-body -->
                              </div>
                              <!-- /.box -->
                            </div>

                            <!-- /.col -->
                            <div class="col-md-9">
                              <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                  <li class="active"><a href="#info" data-toggle="tab" aria-expanded="false">Info</a></li>
                                  <li class=""><a href="#cp" data-toggle="tab" aria-expanded="false">Contact Person</a></li>
                                </ul>
                                <div class="tab-content">
                                  <div class="tab-pane active" id="info">
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Civil Status</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->civil_status : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Address</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->user_address : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Street</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->user_street : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Barangay</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->brgy : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Phone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->user_mobile_num : '' }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-sm-3 control-label">Telephone Number</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" readonly="" value="{{ isset($value) ? $value->user_phone_num : '' }}">
                                        </div>
                                    </div>
                                  </div>
                                  <!-- /.tab-pane -->
                                  <div class="tab-pane" id="cp">

                                  </div>
                                  <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                              </div>
                              <!-- /.nav-tabs-custom -->
                            </div>
                            <!-- /.col -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="pull-left"><i>Note: Barangay Certificates will be entered in the logs below.</i></span>
                        <button type="button" id="cancel" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        {{-- <button id="btn-bc"  class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>&nbsp;Generate Barangay Clearance</button> --}}
                        <a id="btn-bc" class="btn btn-lg btn-primary"><i class="fa fa-print"></i> </a>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.View Record modal -->


    </section>
    <!-- /.content -->
@endsection

@section('js')
@if (session()->has('message'))
    @if (session()->get('message') == 'success')
        <script>
            toastr.success('Successfully Save.', 'Success!');
        </script>
    @endif
@endif
<script>
    $(document).ready(function(){

        $("#btn-bc").on('click', function(){
            // $.ajax({
            //     url: "{{ url('/barangay-clearance/{1}') }}",
            //     type: "POST",
            //     success: function() {
            //       console.log("ok");
            //     }
            // });

            // $.ajax({
            //    type:'POST',
            //    url:"{{ url('/barangay-clearance/{this.value}') }}",
            //    data:'_token = <?php echo csrf_token() ?>',
            //    success:function(data) {
            //       console.log("ok");
            //    }
            // });
            // alert(this.value);
        })

        // $("#cancel").on('click', function(){
        //     alert(1);
        //     $("#search").val() = null;
        // })

        /* datatable initialization */
        $('#contributions_tbl').DataTable(); /* datatable initialization */

        // $("#contribution").on({
        //     keyup: function() {
        //         formatCurrency($(this));
        //     }
        // });

        function formatNumber(n) {
            // format number 1000000 to 1,234,567
            return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }

        function formatCurrency(input, blur)
        {
            // appends $ to value, validates decimal side
            // and puts cursor back in right position.

            // get input value
            var input_val = input.val();

            // don't validate empty input
            if (input_val === "") { return; }

            // original length
            var original_len = input_val.length;

            // initial caret position
            var caret_pos = input.prop("selectionStart");

            // check for decimal
            if (input_val.indexOf(".") >= 0)
            {

                // get position of first decimal
                // this prevents multiple decimals from
                // being entered
                var decimal_pos = input_val.indexOf(".");

                // split number by decimal point
                var left_side = input_val.substring(0, decimal_pos);
                var right_side = input_val.substring(decimal_pos);

                // add commas to left side of number
                left_side = formatNumber(left_side);

                // validate right side
                right_side = formatNumber(right_side);

                // On blur make sure 2 numbers after decimal
                if (blur === "blur") {
                right_side += "00";
                }

                // Limit decimal to only 2 digits
                right_side = right_side.substring(0, 2);

                // join number by .
                input_val = left_side + "." + right_side;

            } else {
                // no decimal entered
                // add commas to number
                // remove all non-digits
                input_val = formatNumber(input_val);
                input_val = input_val;

                // final formatting
                if (blur === "blur") {
                input_val += ".00";
                }
            }

            // send updated string to input
            input.val(input_val);

            // put caret back in the right position
            var updated_len = input_val.length;
            caret_pos = updated_len - original_len + caret_pos;
            input[0].setSelectionRange(caret_pos, caret_pos);
        }
        /* View Button */
            $('#search').on('change',function(){
                $('#view-record').modal('show');

                var id = this.value;

                // alert(id);
                // $('#btn-bc').text(this.value);
                var a = document.getElementById('btn-bc');

                var href = "{{ url('/barangay-clearance') }}"+"/"+id;

                // alert(href);
                a.setAttribute("href", href);
                // if(this.value != ""){
                //     // alert(this.value);
                //     $.ajax({
                //         type : "POST",
                //         url : "{{ url('/get-data-for-modal') }}",
                //         data : id : this.value,
                //         sucess : function(items){
                //             console.log(items);
                //         }
                //     });
                // }
            });
        /* View Button */

        $("#btn-edit").on('click', function() {
            $.ajax({
                url: "{{ url('/get-pension-data') }}",
                type: "POST",
                data: {'c_id': $(this).attr('data-id'),'_token': $('meta[name="csrf-token"]').attr('content')},
                success: function(items) {
                    $("#senior_id").val(items.user[0].senior_id).trigger('change');
                    $("#contribution").val(items.user[0].pension_amount);
                    $("#id").val(items.user[0].id);
                    $("#modal-station").modal('show');
                }
            });
        });

        $("#btn-del").on('click', function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/admin-del-pension') }}",
                        type: "POST",
                        data: {'data': $(this).attr('data-id'),'_token': $('meta[name="csrf-token"]').attr('content')},
                        success: function(items) {
                            if(items.status != 500)
                            {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: 'Your file has been deleted.',
                                    type: 'success',
                                    showConfirmButton: true,
                                }).then((result) => {
                                    if(result.value){
                                        window.location = "{{ $base_url }}" + "/admin-senior-pension";
                                    }
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    'Oops! Something went wrong',
                                    'error'
                                )
                            }
                        }
                    });
                }
            });
        });
    });


</script>
@endsection
