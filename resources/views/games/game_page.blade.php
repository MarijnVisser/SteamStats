@extends('layouts.app')

@section('content')
	<div class="container mt-5">
		<div class="row mb-3">
			<div class="col-md-1 d-flex justify-content-center align-items-center col-0">
				<img src="https://cdn.cloudflare.steamstatic.com/steamcommunity/public/images/apps/730/69f7ebe2735c366c65c0b33dae00e12dc40edbe4.jpg" class="img-fluid">
			</div>
			<div class="col-md-11 col-12">
				<h1>Counter-Strike: Global Offensive</h1>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8">
				<table class="table table-hover table-bordered table-dark">
					<tbody>
						<tr>
							<td>App ID</td>
							<td>730</td>
						</tr>
						<tr>
							<td>App Type</td>
							<td>Game</td>
						</tr>
						<tr>
							<td>Developer</td>
							<td>Valve</td>
						</tr>
						<tr>
							<td>Publisher</td>
							<td>Valve</td>
						</tr>
						<tr>
							<td>Supported Systems</td>
							<td>Windows macOS Linux</td>
						</tr>
						<tr>
							<td>Last Record Update</td>
							<td>about 10 hours ago (28 October 2020 – 00:11:50 UTC)</td>
						</tr>
						<tr>
							<td>Last Change Number</td>
							<td>9855972</td>
						</tr>
						<tr>
							<td>Release Date</td>
							<td>21 August 2012 – 17:00:00 UTC (8 years ago)</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="col-md-4">
				<img src="https://cdn.cloudflare.steamstatic.com/steam/apps/730/header.jpg?t=1603843910" class="img-fluid">
				<div class="row mt-3">
					<div class="col-md-6">
						<div class="alert alert-dark text-center" role="alert">
							<h6 class="mb-0 text-green">123456</h6>
							<span class="small text-white">Currently playing</span>
						</div>
					</div>
					<div class="col-md-6">
						<div class="alert alert-dark text-center" role="alert">
							<h6 class="mb-0 text-green">123456</h6>
							<span class="small text-white">Currently playing</span>
						</div>
					</div>
				</div>
				<p class="text-white">Counter-Strike: Global Offensive (CS: GO) expands upon the team-based action gameplay that it pioneered when it was launched 19 years ago. CS: GO features new maps, characters, weapons, and game modes, and delivers updated versions of the classic CS content (de_dust2, etc.).</p>
			</div>
		</div>
		<hr class="my-5">
		<div class="row">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-2">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
							<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
							<a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
							<a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
						</div>
					</div>
					<div class="col-md-10">
						<div class="tab-content" id="v-pills-tabContent">
							<div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in nunc non nisi lacinia tempus id quis ligula. Ut porta tempor neque id faucibus. Vivamus quis porttitor ex. Quisque non enim hendrerit leo commodo pellentesque. Nullam blandit luctus lacus non ultrices. Donec quis posuere tortor. Phasellus orci arcu, dignissim quis gravida non, pulvinar id libero. Quisque porta metus eu ipsum tempus consequat. Vivamus finibus egestas turpis vitae ornare. Donec mattis massa enim, vitae gravida nisi faucibus ut. Curabitur libero lectus, pellentesque eget tempor aliquet, ultricies sit amet eros.</p></div>
							<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in nunc non nisi lacinia tempus id quis ligula. Ut porta tempor neque id faucibus. Vivamus quis porttitor ex. Quisque non enim hendrerit leo commodo pellentesque. Nullam blandit luctus lacus non ultrices. Donec quis posuere tortor. Phasellus orci arcu, dignissim quis gravida non, pulvinar id libero. Quisque porta metus eu ipsum tempus consequat. Vivamus finibus egestas turpis vitae ornare. Donec mattis massa enim, vitae gravida nisi faucibus ut. Curabitur libero lectus, pellentesque eget tempor aliquet, ultricies sit amet eros.</p></div>
							<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in nunc non nisi lacinia tempus id quis ligula. Ut porta tempor neque id faucibus. Vivamus quis porttitor ex. Quisque non enim hendrerit leo commodo pellentesque. Nullam blandit luctus lacus non ultrices. Donec quis posuere tortor. Phasellus orci arcu, dignissim quis gravida non, pulvinar id libero. Quisque porta metus eu ipsum tempus consequat. Vivamus finibus egestas turpis vitae ornare. Donec mattis massa enim, vitae gravida nisi faucibus ut. Curabitur libero lectus, pellentesque eget tempor aliquet, ultricies sit amet eros.</p></div>
							<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab"><p class="text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam in nunc non nisi lacinia tempus id quis ligula. Ut porta tempor neque id faucibus. Vivamus quis porttitor ex. Quisque non enim hendrerit leo commodo pellentesque. Nullam blandit luctus lacus non ultrices. Donec quis posuere tortor. Phasellus orci arcu, dignissim quis gravida non, pulvinar id libero. Quisque porta metus eu ipsum tempus consequat. Vivamus finibus egestas turpis vitae ornare. Donec mattis massa enim, vitae gravida nisi faucibus ut. Curabitur libero lectus, pellentesque eget tempor aliquet, ultricies sit amet eros.</p></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr class="my-5">
		<div class="row">
			<div class="col-md-10">
				<h2>Reviews</h2>
			</div>
			<div class="col-md-2">
				<button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#reviewmodal">
				    Plaats review
				</button>
			</div>
		</div>
		<div class="row mt-5">
			<div class="col-md-12">
				<div class="card">
				    <div class="card-body">
				        <div class="row mb-3 mt-md-0">
				            <div class="col-md-1 d-none d-md-block">
				                <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
				            </div>
				            <div class="col-md-11">
				                <p>
				                    <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
				                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
				                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
				                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
				                    <span class="float-right"><i class="text-warning fa fa-star"></i></span>
				                </p>
				                <div class="clearfix"></div>
				                <p>
				                    Lorem Ipsum is simply dummy text of the pr make but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
				                    passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				                </p>
				                <p>
				                    <a class="float-right btn btn-outline-primary"> <i class="fa fa-reply"></i> Reply</a>
				                </p>
				            </div>
				        </div>
				        <div class="card card-inner">
				            <div class="card-body">
				                <div class="row">
				                    <div class="col-md-1 d-none d-md-block">
				                        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid" />
				                    </div>
				                    <div class="col-md-11">
				                        <p>
				                            <a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a>
				                        </p>
				                        <p>
				                            Lorem Ipsum is simply dummy text of the pr make but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
				                            Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
				                        </p>
				                        <p>
				                            <a class="float-right btn btn-outline-primary"> <i class="fa fa-reply"></i> Reply</a>
				                        </p>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
@endsection

<!-- Modal -->
<div class="modal fade" id="reviewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Plaats review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
				<form>
				    <div class="form-group">
				        <label for="exampleFormControlSelect1">Aantal sterren</label>
				        <select class="form-control" id="exampleFormControlSelect1">
				            <option>1</option>
				            <option>2</option>
				            <option>3</option>
				            <option>4</option>
				            <option>5</option>
				        </select>
				    </div>
				    <div class="form-group">
				        <label for="exampleFormControlTextarea1">Review</label>
				        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				    </div>
				    <button type="submit" class="btn btn-primary">Submit</button>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>