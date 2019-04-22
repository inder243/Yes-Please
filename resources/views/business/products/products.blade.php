@extends('layouts.inner_business')

@section('content')

<section class="register_step_1 call-section">
	<div class="breadcrumb register_breadcrumb advertisment_breadcrumb">
		<div><a href="JavaScript:;">Dashboard</a>/<a href="JavaScript:;">Advertisement Dashboard</a>/ <span class="q_breadcrumb">My products</span></div>
		<div class="setup_things test-campign">
			<a href="JavaScript:;" class="adde_btn" data-toggle="modal" data-target="#topad">Add</a>
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
						<table role="table">
							<thead>
								<tr  class="table_heading">
									<th>Name</th>
									<th> Category</th>
									<th>Price</th>
									<th>Cost</th>
									<th>Actions</th>
									<th></th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Replacing iphone screen</td>
									<td>Fixing phones</td>
									<td>200</td>
									<td>4</td>
									<td><a href="javascript:;" class=add-sechdule data-toggle="modal" data-target="#promote-popup">Promote</a></td>
									<td><a href="javascript:;" class=add-sechdule>Show</a></td>
									<td>
										<div class="diff-icons-del">
											<a href="javascript:;"><img src="{{ asset('img/edit-green.png') }}"/></a>
											<a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"/></a>
										</div>
									</td>
								</tr>
								<tr>
									<td>Replacing iphone screen</td>
									<td>Fixing phones</td>
									<td>200</td>
									<td>4</td>
									<td><a href="javascript:;" class=add-sechdule>Promote</a></td>
									<td><a href="javascript:;" class=add-sechdule>Show</a></td>
									<td>
										<div class="diff-icons-del">
											<a href="javascript:;"><img src="{{ asset('img/edit-green.png') }}"/></a>
											<a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"/></a>
										</div>
									</td>
								</tr>
								<tr>
									<td>Replacing iphone screen</td>
									<td>Fixing phones</td>
									<td>200</td>
									<td>4</td>
									<td><a href="javascript:;" class=add-sechdule>Promote</a></td>
									<td><a href="javascript:;" class=add-sechdule>Show</a></td>
									<td>
										<div class="diff-icons-del">
											<a href="javascript:;"><img src="{{ asset('img/edit-green.png') }}"/></a>
											<a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"/></a>
										</div>
									</td>
								</tr>
								<tr>
									<td>Replacing iphone screen</td>
									<td>Fixing phones</td>
									<td>200</td>
									<td>4</td>
									<td><a href="javascript:;" class=add-sechdule>Promote</a></td>
									<td><a href="javascript:;" class=add-sechdule>Show</a></td>
									<td>
										<div class="diff-icons-del">
											<a href="javascript:;"><img src="{{ asset('img/edit-green.png') }}"/></a>
											<a href="javascript:;"><img src="{{ asset('img/line_cross.png') }}"/></a>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection