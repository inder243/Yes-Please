    @extends('layouts.admin_dashboard')

        @section('content')       
            

          <!-- <div class="breadcrumbs">
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
                                <strong class="card-title">Basic Table</strong>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Mobile number</th>
                                          <th scope="col">Action</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php $count=1; ?>
                                    @foreach($general_user as $user)

                                    <tr>
                                        <th scope="row">{{ $count }}</th>
                                        <td>{{ $user->first_name.$user->last_name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number }}</td>
                                        <td><a href="javascript:void(0);" data-url="{{ route('admin.enable_user') }}" data-type="general" data-id="{{$user->id}}" class="enable_business_user" onclick="enableBusinessUser(this);">Enable</a>
                                            <a href="javascript:void(0);" data-type="general" data-url="{{ route('admin.disable_user') }}" data-id="{{$user->id}}" class="disbale_business_user" onclick="disableBusinessUser(this);">Disable</a>
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


      


        @endsection  
      