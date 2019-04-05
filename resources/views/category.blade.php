    @extends('layouts.admin_dashboard')

        @section('content')       
            

         <!--  <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Forms</a></li>
                                    <li class="active">Basic</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="content">
            <div class="animated fadeIn">


                <div class="row">
                   
                   
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Add Category</strong> Form
                            </div>
                            <form action="{{url('/admin/add_category')}}" method="post" class="form-horizontal">
                            <div class="card-body card-block">
                                
                                    {{csrf_field()}}
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="hf-email" class=" form-control-label">Super Category</label></div>
                                        <div class="col-12 col-md-8"> 
                                            <select name="superCategory" required>
                                                        <option value="">Select Parent Category</option>
                                                     @foreach($Supercategory as $sCat)
                                                         <option value="{{ $sCat->super_cat_id }}">{{ $sCat->cat_name }}</option>
                                                      @endforeach
                                            </select>
                                            <a href="javascript:;" onclick="openPopUpSuperCategory(this);return false">Add Parent category</a>
                                        </div>
                                    </div>
                                   

                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="hf-email" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-8">
                                            <input type="text" id="hf-email" name="category" placeholder="Enter category..." class="form-control" maxlength="30" value="{{ old('category') }}" required>
                                           
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="q_with_ph" class=" form-control-label">Enter quote with phone number</label></div>
                                        <div class="col-12 col-md-8">
                                            <input id="q_with_ph" name="q_with_ph" placeholder="Quote with phone number" class="form-control" maxlength="30" value="" required="" type="number">
                                        </div>                                                                              
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-4"><label for="q_without_ph" class=" form-control-label">Enter quote without phone number</label></div>
                                        <div class="col-12 col-md-8">
                                            <input id="q_without_ph" name="q_without_ph" placeholder="Quote without phone number" class="form-control" maxlength="30" value="" required="" type="number">
                                        </div>                                                                              
                                    </div>

                               @if (Session::has('success_message'))
                                <span class="help-block succ-admin forhide">{{ Session::get('success_message') }}</span>
                                @endif
                                 @if (Session::has('error_message'))
                                <span class="help-block error forhide">{{ Session::get('error_message') }}</span>
                                @endif
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <!-- <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button> -->
                            </div>
                              </form>
                        </div>

                       <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Basic Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Action</th>
                                          <th scope="col">Category Form</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                     @if(!empty($category) && count($category)>0)
                                    <?php $count=1; ?>
                                    @foreach($category as $cat)

                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>
                                            <a href='javascript:void(0);' data-toggle="modal" data-target="#mediumModal"  class="fa fa-pencil edit" data-id="{{ $cat->id }}" data-name= "{{ $cat->category_name }}" data-with-ph= "{{ $cat->quote_with_ph }}" data-without-ph= "{{ $cat->quote_without_ph }}"></a>
                                            <a href='javascript:void(0);'  data-id="{{ $cat->id }}" class="fa fa-times delete_category"></a>
                                        </td>
                                        <td>
                                            
                                            <a href="{{url('/admin/create_new_form')}}/{{ $cat->id }}">create form</a>
                                        </td>
                                    </tr>

                                    <?php $count++; ?>
                                    @endforeach
                                    @else
                                    <tr>
                                         <td scope="row"></td>
                                        <td>
                                             No Data Found
                                        </td>
                                   
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                   
                </div>

               

            </div>


        </div><!-- .animated -->
    </div><!-- .content -->


      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mediumModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Category</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="edit_category" name="edit_category" placeholder="Enter category..." class="form-control" maxlength="30"  required>
                                <span class="help-block" id="help-block"></span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="edit_q_with_ph" class="form-control-label">Quote with phone number</label></div>
                            <div class="col-12 col-md-9"><input id="edit_q_with_ph" name="edit_q_with_ph" placeholder="Enter quote with phone number" class="form-control" maxlength="30" required="" type="number">
                                <span class="help-block" id="help-block1"> </span>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="edit_q_without_ph" class="form-control-label">Quote without phone number</label></div>
                            <div class="col-12 col-md-9"><input id="edit_q_without_ph" name="edit_q_without_ph" placeholder="Enter quote without phone number" class="form-control" maxlength="30" required="" type="number">
                                <span class="help-block" id="help-block2"> </span>
                            </div>
                        </div>


                            <input type="hidden" name="hidden_id" id="hidden_id">
                            <input type="hidden" name="hidden_url" id="hidden_url" value="{{ url('/') }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary submit_category">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="openPopUpSuperCategory" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Parent category.</h4>
              </div>
              <div class="modal-body">
                <form action="{{url('/admin/add_Super_category')}}" method="post" class="form-horizontal">
                    <div class="row form-group">
                         {{csrf_field()}}
                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" class="parent_cat_name" required name="superCategory" maxlength="30"></div>
                    </div>
                    <input type="submit" class="btn btn-info parent_cat_button" value="Submit" >
                </form>
              </div>
              <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        
      </div>
    </div>

        @endsection  
      