@extends('layouts.dashboard_business')
@section('content')
  <section class="register_step_1">
    <div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
      <div>
        <a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a>/<span class="q_breadcrumb">Schedule</span>
      </div>
      <div class="setup_things adv-add">
        <a href="javascript:;" data-toggle="modal" data-target="#addpopup">Add</a>
      </div>
    </div>
  </section>
  <section class="advertisment_section">
    <div class="advtisment_main">
      <h1>Schedule</h1>
    </div>
    <div class="container pro-module-feature">
      <div class="row">
        <div class="col-12">
          <div class="event_table">
            
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Modal -->
<div class="modal fade" id="addpopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header ad_header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add_new_schedule" method="POST" action="{{url('business_user/save_event')}}">
        {{ csrf_field() }}
        <div class="modal-body ad-header-body">
            <div class="p-heading"><h1>Add schedule</h1></div>
            <div class="upper-catergory">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" required="" maxlength="50">
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group">
                      <label for="datefrom">Date from</label>
                      <input type="text" class="form-control datepicker" id="datefrom" name="datefrom" required="" readonly>

                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group position-relative">
                      <label for="dateto">Date to</label>
                      <input type="text" class="form-control datepicker" id="dateto" name="dateto" required="" readonly>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group">
                      <label for="timefrom">Time from</label>
                      <input type="text" class="form-control timepicker" id="timefrom" name="timefrom" required="" readonly>

                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group position-relative">
                      <label for="timeto">Time to</label>
                      <input type="text" class="form-control timepicker" id="timeto" name="timeto" required="" readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="start-btn"><input type="submit" value="Add"></div>
        </div>
        </form>
      </div>
    </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header ad_header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="edit_schedule" method="POST" action="{{url('business_user/edit_event')}}">
        {{ csrf_field() }}
        <input type="hidden" id="event_id" name="event_id">
        <div class="modal-body ad-header-body">
            <div class="p-heading"><h1>Add schedule</h1></div>
            <div class="upper-catergory">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" class="form-control" id="title" name="title" required="" maxlength="50">
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group">
                      <label for="datefrom">Date from</label>
                      <input type="text" class="form-control" id="editdatefrom" name="datefrom" required="" readonly>

                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group position-relative">
                      <label for="dateto">Date to</label>
                      <input type="text" class="form-control" id="editdateto" name="dateto" required="" readonly>
                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group">
                      <label for="timefrom">Time from</label>
                      <input type="text" class="form-control" id="edittimefrom" name="timefrom" required="" readonly>

                    </div>
                </div>
                <div class="col-md-6 col-12 mt-2">
                  <div class="form-group position-relative">
                      <label for="timeto">Time to</label>
                      <input type="text" class="form-control" id="edittimeto" name="timeto" required=""  readonly>
                  </div>
                </div>
              </div>
            </div>
            <div class="start-btn"><input type="submit" value="Update"></div>
        </div>
        </form>
      </div>
    </div>
</div>
<!-- Modal -->

@endsection