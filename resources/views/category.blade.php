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
                                        <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Category</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="hf-email" name="category" placeholder="Enter category..." class="form-control" maxlength="250" value="{{ old('category') }}" required>
                                            @if (Session::has('success_message'))
                                            <span class="help-block succ-admin forhide">{{ Session::get('success_message') }}</span>
                                            @endif
                                             @if (Session::has('error_message'))
                                            <span class="help-block error forhide">{{ Session::get('error_message') }}</span>
                                            @endif
                                        </div>
                                    </div>
                              
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
                                    <?php $count=1; ?>
                                    @foreach($category as $cat)

                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $cat->category_name }}</td>
                                        <td>
                                            <a href='javascript:void(0);' data-toggle="modal" data-target="#mediumModal"  class="fa fa-pencil edit" data-id="{{ $cat->id }}" data-name= "{{ $cat->category_name }}"></a>
                                            <a href='javascript:void(0);'  data-id="{{ $cat->id }}" class="fa fa-times delete_category"></a>
                                        </td>
                                        <td>
                                            
                                            <a href="{{url('/admin/create_new_form')}}/{{ $cat->id }}">create form</a>
                                        </td>
                                    </tr>
                                    <?php $count++; ?>
                                    @endforeach
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
                                <div class="col-12 col-md-9"><input type="text" id="edit_category" name="edit_category" placeholder="Enter category..." class="form-control" maxlength="250"  required>
                                    <span class="help-block" id="help-block"></span>
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


        @endsection  
      