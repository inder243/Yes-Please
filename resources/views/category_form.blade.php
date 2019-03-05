    @extends('layouts.admin_dashboard')
        @section('content')       
        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                       <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Create New form</strong>
                            </div>
                            <div class="card-body">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <div class="card my-5">
                                                <h5 class="mb-4">Select Type of Field</h5>
                                                <div class="button_group">
                                                    <button class="btn btn-block btn-light mb-3" onclick="addNewField(1)" type="button">Text Box</button>
                                                    
                                                    <button class="btn btn-block btn-light mb-3" onclick="addNewField(4)" type="button">Radio Select</button>
                                                    
                                                    <button class="btn btn-block btn-light  mb-3" onclick="addNewField(7)" type="button">Checkbox</button>
                                                    <button class="btn btn-block btn-light  mb-3" onclick="addNewField(8)" type="button">Dropdown select</button>
                                                    <button class="btn btn-block btn-primary" id="add_form" type="button">Add Form</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-md-8">
                                            <div class="card my-5">
                                                <form class="dynamic_form sortable ui-sortable" data-cat={{$id}}>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div>


 @endsection  
      