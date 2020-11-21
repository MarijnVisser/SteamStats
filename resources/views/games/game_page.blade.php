@extends('layouts.app')

@section('content')
{{--    @dd($game)--}}
{{--   !empty($recentlyPlayedGame['name']) ? $recentlyPlayedGame['name'] : "No name found" }}    --}}

@if(!empty($game['background']))
        <div>
            <img src="{{ $game['background'] }}" style="position: absolute;top:0;width: 100%;height: 100%;z-index: -1; -webkit-mask-image:-webkit-gradient(linear, left top, left bottom, from(rgba(0,0,0,1)), to(rgba(0,0,0,0)));mask-image: linear-gradient(to bottom, rgba(0,0,0,1), rgba(0,0,0,0));">
        </div>
@endif
{{--    @dd($game)--}}
	<div class="container mt-5">
		<div class="row mb-3">

			<div class="col-md-12 col-12">
				<h1 class="float-left">{{ $game['name'] }}</h1>
                <a class="btn btn-info float-right" href="steam://install/{{$game['steam_appid']}}">Install</a>
			</div>

		</div>
		<div class="row">
			<div class="col-md-8">
				<table class="table table-hover table-bordered table-dark" style="background-color: #282e39;">
					<tbody>
						<tr>

							<td>App ID</td>
							<td>{{ $game['steam_appid'] }}</td>
						</tr>
						<tr>
							<td>App Type</td>
							<td>{{ $game['type'] }}</td>
						</tr>
						<tr>
							<td>Publisher</td>
							<td>
                                <?php
                                    if(!empty($game['publishers']))
                                        foreach($game['publishers'] as $publisher)
                                            echo $publisher;
							        else
							            echo "None";
                                ?>
                            </td>
						</tr>
						<tr>
							<td>Developer</td>
							<td><?php
                                if(!empty($game['developers']))
                                    foreach($game['developers'] as $developer)
                                        echo $developer;
                                else
                                    echo "None";
                                ?></td>
						</tr>
						<tr>
							<td>Supported Systems</td>
							<td>@if($game['platforms']['windows'] == true){{ "Windows " }}@endif @if($game['platforms']['mac'] == true){{ "Mac" }}@endif @if($game['platforms']['linux'] == true){{ "Linux" }}@endif</td>
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
							<td>@if($game['release_date']['coming_soon'] == false) {{$game['release_date']['date']}} @else {{ "Coming soon" }}@endif</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="col-md-4">
				<img src="{{ $game['header_image'] }}" class="img-fluid">
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
				<p class="text-white">{{ strip_tags($game['short_description']) }}</p>
			</div>
		</div>
        <h4>Packages</h4>
        @if(!empty($game['packages']))
            @foreach($game['packages'] as $packages)
                <iframe src="https://store.steampowered.com/widget/{{$game['steam_appid']}}/{{$packages}}" frameborder="0" width="729" height="190"></iframe>
            @endforeach
        @endif

        <hr class="my-5">
		<div class="row">
            <h4>Packages</h4>
			<div class="col-md-12">
				<div class="row">


                    <div class="col-md-2">
						<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
							<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
							<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
						</div>
					</div>
					<div class="col-md-10">
						<div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><p>dfgdhghjghjghj</p></div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-home-tab"><p>tryurtyeytryrty</p></div>
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
