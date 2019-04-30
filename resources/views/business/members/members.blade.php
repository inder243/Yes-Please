@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
	<div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
		<div><a href="{{ url('/business_user/business_dashboard') }}">Dashboard</a> / <span class="q_breadcrumb">Members</span></div>
		<div class="setup_things test-campign">
			 <!-- onclick="openAddMembers(this);return false; -->
			<a href="JavaScript:;" class="adde_btn" data-toggle="modal" data-backdrop="static" data-keyboard="false" data-target="#add_memberModal"">Add</a>
		</div>
	</div>
</section>

<section class="advertisment_section">
	<div class="advtisment_main">
		<h1>My products</h1>
	</div>
	<div class="container pro-module-feature">
		<div class="row">
			<div class="col-12">
				<div class="call-table">
					<div class="campagin_table1 table-responsive product-table">
						<table role="table" id="product_table">
							<thead>
								<tr  class="table_heading">
									<th>Name</th>
									<th>Phone</th>
									<th>Email</th>
									<th>Added</th>
									<th>Actions</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@if(!empty($all_members))
									@foreach($all_members as $key=>$member)
									
									<!--- data-toggle="modal" data-target="#promote-popup"-->
									<tr class="product_{{$key}}">
										<td>{{$member['name']}}</td>
										<td>{{$member['phone']}}</td>
										<td>{{$member['email']}}</td>
										<td>{{$member['added_date']}}</td>
										<td>
											<div class="diff-icons-del">
												<a href="javascript:;" data-member_id="{{$member['member_id']}}" onclick="openEditMember(this);"><img src="{{ asset('img/edit-green.png') }}"/></a>
											</div>
										</td>
									</tr>
									@endforeach
								@else
									<tr><td colspan="5">No Member Found!</td></tr>
								@endif
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection


<!--------Add member popup--------->
<div class="modal fade" id="add_memberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header ad_header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ad-header-body">
                <div class="p-heading promote_heading"><h1>Add Member</h1></div>
                <div class="upper-catergory">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control member_name" name="member_name" id="inputEmail4" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_name_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="inputEmail4">Phone</label>
                                <input type="number" onKeyPress="if(this.value.length==15) return false;" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control member_phone" name="member_phone" id="inputEmail4" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_phone_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group position-relative">
                                <label for="enddate_promote">Email</label>
                                <input type="email" class="form-control member_email" name="member_email" id="member_email" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_email_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group position-relative">
                                <label for="enddate_promote">Notes</label>
                                <textarea class="form-control member_notes" name="member_notes" id="member_notes" value="" onkeyup="removeErrMessge(this);"></textarea>
                                <span class="fill_fields member_notes_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="start-btn"><input type="submit" data-modal_type="add_memberModal" value="Add" class="member_submit" onclick="saveMembers(this);"></div>
            </div>

        </div>
    </div>
</div>
<!--------Add Member popup--------->

<!--------Edit member popup--------->
<div class="modal fade" id="edit_memberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header ad_header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ad-header-body">
                <div class="p-heading promote_heading"><h1>Edit Member</h1></div>
                <div class="upper-catergory">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="inputEmail4">Name</label>
                                <input type="text" class="form-control member_name" name="member_name" id="inputEmail4" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_name_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="inputEmail4">Phone</label>
                                <input type="number" onKeyPress="if(this.value.length==15) return false;" onkeydown="javascript: return event.keyCode == 69 ? false : true" class="form-control member_phone" name="member_phone" id="inputEmail4" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_phone_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group position-relative">
                                <label for="enddate_promote">Email</label>
                                <input type="email" class="form-control member_email" name="member_email" id="member_email" value="" onkeyup="removeErrMessge(this);">
                                <span class="fill_fields member_email_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group position-relative">
                                <label for="enddate_promote">Notes</label>
                                <textarea class="form-control member_notes" name="member_notes" id="member_notes" value="" onkeyup="removeErrMessge(this);"></textarea>
                                <span class="fill_fields member_notes_error" role="alert" style="display:none;"></span>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="start-btn"><input type="submit" data-member_id="" data-modal_type="edit_memberModal" value="Update" class="member_submit" onclick="saveMembers(this);"></div>
            </div>

        </div>
    </div>
</div>
<!--------Promote product popup ends--------->
