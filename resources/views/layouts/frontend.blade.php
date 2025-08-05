<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="Name of your web site">
<meta name="author" content="Sohag">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<title>Ashrafur | Home</title>

<link rel="apple-touch-icon" href="{{ asset('storage/' . $settings->photo) }}">

<link rel="shortcut icon" type="image/x-icon" href="{{ asset('storage/' . $settings->photo) }}">

<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/modalbox.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css') }}" />

</head>

<body class="dark">

	<!-- PRELOADER -->
	{{-- <div id="preloader">
		<div class="loader_line"></div>
	</div> --}}
	<!-- /PRELOADER -->

	<!-- WRAPPER ALL -->
	<div class="kioto_tm_all_wrap" data-magic-cursor="show" data-enter="rollIn" data-exit="rollOut">
		<!-- MOBILE MENU -->
		<div class="kioto_tm_topbar">
			<div class="topbar_inner">
				<div class="logo" data-type="image">
					<a href="#">
						<img src="{{ asset('storage/' . $data->photo) }}" alt="" />
						<h3>{{ $user->name }}</h3>
					</a>
				</div>
				<div class="trigger">
					<div class="hamburger hamburger--slider">
						<div class="hamburger-box">
							<div class="hamburger-inner"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="kioto_tm_mobile_menu">
			<div class="menu_list">
				<ul class="transition_link">
					<li class="active"><a href="#home">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#service">Service</a></li>
					<li><a href="#portfolio">Portfolio</a></li>
					<li><a href="#news">News</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>
			</div>
		</div>
		<!-- /MOBILE MENU -->

		<!-- LEFTPART -->
		<div class="leftpart">
			<div class="leftpart_inner">
				<div class="logo" data-type="image">
					<a href="#">
						<img src="{{ asset('storage/' . $data->photo) }}" alt="{{ $user->name }}" />
						<h3>{{ $user->name }}</h3>
					</a>
                    <h4 class="title-name">{{$user->name}}</h4>
                    <p class="subtitle-user">{{ $data->designation[0] }}</p>
				</div>
				<div class="menu">
					<ul class="transition_link">
						<li class="active"><a href="#home">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#service">Service</a></li>
						<li><a href="#portfolio">Portfolio</a></li>
						<li><a href="#news">News</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>
				</div>
				<div class="copyright">
					<p>&copy; 2024 Created by <a class="line_effect" href="https://dextar.xyz" target="_blank">Dextar</a></p>
				</div>
			</div>
		</div>
		<!-- /LEFTPART -->

		<!-- RIGHTPART -->
		<div class="rightpart">
			<div class="rightpart_in">

				<!-- HOME -->
				<div id="home" class="kioto_tm_section animated">
					<div class="container">
						<div class="kioto_tm_home">
							<div class="left">
								<span class="name">// {{ $user->name }}</span>
								<h3>{{ $data->designation[0] }}</h3>
								<h3 class="job">
									<span class="cd-headline clip">
                                        @php
                                            $designation = $data->designation ?? [];
                                        @endphp
                                        @if (is_array($designation) && count($designation) > 1)
                                        <span class="blc">And</span>
                                        <span class="cd-words-wrapper">
                                            <b class="is-visible">{{ $designation[1] }}</b>
                                            @foreach ($data->designation as $des)
                                            <b>{{ $des }}</b>
                                            @endforeach
                                        </span>
                                        @endif
									</span>
								</h3>
								<div class="kioto_tm_button transition_link">
									<a class="tm_text_effect" href="#contact">Get in Touch</a>
								</div>
							</div>
							<div class="right">
								<div class="abs_image">
									<img src="{{asset('storage/' . $data->cover)}}" alt="" />
									<div class="main ripple" data-img-url="{{asset('storage/' . $data->cover)}}" id="ripple"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /HOME -->

				<!-- ABOUT -->
				<div id="about" class="kioto_tm_section">
					<div class="container">
						<div class="kioto_tm_about">
							<div class="kioto_tm_biography">
								<div class="biography">
									<div class="kioto_tm_title">
										<span>// Biography</span>
									</div>
									<div class="text">
										<p> {{ $data->about }}</p>
									</div>
									<div class="kioto_tm_button">
										<a class="tm_text_effect" href="{{ 'storage' . $data->resume }}" download>Download CV</a>
									</div>
								</div>
								<div class="personal_details">
									<div class="kioto_tm_title">
										<span>// Personal Details</span>
									</div>
									<div class="list">
										<ul>
											<li>
												<span>Name:</span>
												<span>{{ $user->name }}</span>
											</li>
											<li>
												<span>Address:</span>
												<span>{{ $data->address }}</span>
											</li>
											<li>
												<span>Study:</span>
												<span>{{ $data->institute }}</span>
											</li>
											<li>
												<span>Degree:</span>
												<span>{{ $data->degree }}</span>
											</li>
											<li>
												<span>Mail:</span>
												<span><a class="line_effect" href="#">{{ $data->public_email }}</a></span>
											</li>
											<li>
												<span>Phone:</span>
												<span><a class="line_effect" href="#">{{ $data->phone }}</a></span>
											</li>
											<li>
												<span>Freelance:</span>
												<span>Available</span>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="kioto_tm_skills">
								<div class="left">
									<div class="kioto_tm_title">
										<span>// Programming Skills</span>
									</div>
									<div class="kioto_progress">
                                        @php
                                            $skills = $data->skills;
                                        @endphp
                                        @foreach ($skills as $skill)
										<div class="progress_inner" data-value="
                                        @if($skill['level'] == 'Expert')
                                            95
                                        @elseif ($skill['level'] == 'Advanced')
                                            75
                                        @elseif ($skill['level'] == 'Beginner')
                                            50
                                        @else
                                            40
                                        @endif
                                        ">
											<span><span class="label">{{ $skill['name'] }}</span><span class="number">{{ $skill['level'] }}</span></span>
											<div class="background"><div class="bar"><div class="bar_in"></div></div></div>
										</div>
                                        @endforeach
									</div>
								</div>
								<div class="right">
									<div class="kioto_tm_title">
										<span>// Language Skills</span>
									</div>
									<div class="kioto_progress">
                                        @php
                                            $languages = $data->languages;
                                        @endphp

                                        @foreach ($languages as $lang)
										<div class="progress_inner" data-value="
                                        @if($lang['proficiency'] == 'Native')
                                            95
                                        @elseif ($lang['proficiency'] == 'Fluent')
                                            75
                                        @elseif ($lang['proficiency'] == 'Medium')
                                            50
                                        @else
                                            40
                                        @endif
                                        ">
											<span><span class="label">{{ $lang['name'] }}</span><span class="number">{{ $lang['proficiency'] }}</span></span>
											<div class="background"><div class="bar"><div class="bar_in"></div></div></div>
										</div>
                                        @endforeach
									</div>
								</div>
							</div>
							<div class="kioto_tm_features">
								<div class="left">
									<div class="kioto_tm_title">
										<span>// Interests</span>
									</div>
									<div class="list">
										<ul>
                                            @php
                                                $interests = $data->interests;
                                            @endphp

                                            @foreach ($interests as $int)
											<li>
												<span><label>&check;</label>{{ $int }}</span>
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
								<div class="right">
									<div class="kioto_tm_title">
										<span>// Awwards</span>
									</div>
									<div class="list">
										<ul>
                                            @php
                                                $awards = $data->awards;
                                            @endphp

                                            @foreach ($awards as $award)
											<li>
												<span><label>&check;</label>{{ $award }}</span>
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
							</div>
							<div class="kioto_tm_timeline">
								<div class="left">
									<div class="kioto_tm_title">
										<span>// Education</span>
									</div>
									<div class="list">
										<ul>
                                            @php
                                                $educations = $data->educations;
                                            @endphp
                                            @foreach ($educations as $edu)
											<li>
												<div class="list_inner">
													<div class="info">
														<h3>{{ $edu['institution'] }}</h3>
														<span>{{ $edu['degree'] }}</span>
													</div>
													<div class="year">
														<span>{{ $edu['start'] }} - @if ($edu['end'])
                                                            {{ $edu['start'] }}
                                                        @else
                                                            Running
                                                        @endif</span>
													</div>
												</div>
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
								<div class="right">
									<div class="kioto_tm_title">
										<span>// Experience</span>
									</div>
									<div class="list">
										<ul>
                                            @php
                                                $experiences = $data->experiences;
                                            @endphp
                                            @foreach ($experiences as $ex)
											<li>
												<div class="list_inner">
													<div class="info">
														<h3>{{ $ex['company'] }}</h3>
														<span>{{ $ex['role'] }}</span>
													</div>
													<div class="year">
														<span>{{ $ex['start'] }} - @if ($ex['end'])
                                                            {{ $ex['start'] }}
                                                        @else
                                                            Running
                                                        @endif</span>
													</div>
												</div>
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
							</div>
							<div class="kioto_tm_counter">
								<div class="kioto_tm_title">
									<span>// Fun Facts</span>
								</div>
								<div class="list">
									<ul>
                                        @php
                                            $facts = $data->facts;
                                        @endphp
                                        @foreach ($facts as $fact)
										<li>
											<div class="list_inner">
												<h3>{{ $fact['projects'] }}+</h3>
												<span>{{ $fact['name'] }} </span>
											</div>
										</li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<div class="kioto_tm_partners">
								<div class="kioto_tm_title">
									<span>// Trusted Partners</span>
								</div>
								<div class="list">
									<div class="in marquee">
										<ul>
                                            @foreach ($partners as $partner)
											<li>
												<div class="list_inner">
													<img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}">
												</div>
											</li>
                                            @endforeach
										</ul>
									</div>
								</div>
							</div>
							<div class="kioto_tm_members">
								<div class="kioto_tm_title">
									<span>// Team Members</span>
								</div>
								<div class="list">
									<ul>
                                        @foreach ($members as $member)
										<li>
											<div class="list_inner">
												<div class="abs_image">
													<img src="{{ asset('storage/' . $member->image) }}" alt="" />
													<div width="220px" class="main" data-img-url="{{ asset('storage/' . $member->image) }}"></div>
												</div>
												<div class="details">
													<h3 class="name">{{ $member->name }}</h3>
													<span class="job">{{ $member->designation }}</span>
													<div class="kioto_tm_social">
														{{ $member->about }}
													</div>
												</div>
											</div>
										</li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<div class="kioto_tm_testimonials">
								<div class="kioto_tm_title">
									<span>// Clients Testimonials</span>
								</div>
								<div class="list">
									<ul class="owl-carousel">
                                        @foreach ($tests as $test)
										<li>
											<div class="list_inner">
												<div class="text">
													<p>{{ $test->about }}</p>
												</div>
												<div class="details">
													<div class="image">
														<div class="main" data-img-url="{{ asset('storage/' . $test->image) }}"></div>
													</div>
													<div class="info">
														<h3>{{ $test->name }}</h3>
														<span>{{ $test->designation }}</span>
													</div>
												</div>
											</div>
										</li>
                                        @endforeach
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /ABOUT -->

				<!-- SERVICES -->
				<div id="service" class="kioto_tm_section">
					<div class="container">
						<div class="kioto_tm_service">
							<div class="kioto_tm_title">
								<span>// Top Notch Services</span>
							</div>
							<div class="services_list">
								<ul>
                                    @foreach ($services as $service)
									<li>
										<div class="list_inner">
											<img class="svg" src="{{ asset('storage/' . $service->icon) }}" alt="" />
											<h3 class="title">{{ $service->name }}</h3>
											<div class="list">
												<ul>
                                                    @foreach ($service->features as $item)
													<li><span>{{ $item }}</span></li>
                                                    @endforeach
												</ul>
											</div>
										</div>
									</li>
                                    @endforeach

								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /SERVICES -->

				<!-- PORTFOLIO -->
				<div id="portfolio" class="kioto_tm_section">
					<div class="container">
						<div class="kioto_tm_portfolio">
							<div class="portfolio_title">
								<div class="kioto_tm_title">
									<span>// Creative Portfolio</span>
								</div>
								<div class="portfolio_filter">
									<ul>
										<li><a href="#" class="current" data-filter="*">All</a></li>
                                        @foreach ($categories as $cat)
										<li><a href="#" data-filter=".{{ $cat->slug }}">{{ $cat->name }}</a></li>
                                        @endforeach
									</ul>
								</div>
							</div>
							<div class="portfolio_list">
								<ul class="portfolio_item">
                                    @foreach ($projects as $pro)
									<li class="{{ $pro->category->slug }}">
										<div class="list_inner">
											<div class="abs_image">
												<img src="{{ asset('storage/' . $pro->cover_photo) }}" alt="" />
												<div class="main" data-img-url="{{ asset('storage/' . $pro->cover_photo) }}"></div>
											</div>
											<div class="details">
												<h3 class="name"><a class="portfolio_popup" href="#">{{ $pro->project_title }}</a></h3>
												<span class="job"><a href="#">{{ $pro->category->name }}</a></span>
											</div>

                                            <!-- Modalbox Info Start -->
											<div class="hidden_content_portfolio">
												<div class="popup_details">
													<div class="main_details">
														<div class="textbox">
															{{ $pro->project_details }}
														</div>
														<div class="detailbox">
															<ul>
																<li>
																	<span class="first">Client</span>
																	<span>{{ $pro->client_name }}</span>
																</li>
																<li>
																	<span class="first">Date</span>
																	<span>{{ $pro->created_at }}</span>
																</li>
															</ul>
														</div>
													</div>
													<div class="additional_images">
														<ul>
                                                            @foreach ($pro->gallery_photos as $gallery_photo)
															<li>
																<div class="list_inner">
																	<div class="my_image">
																		<img src="{{ asset('storage/' . $gallery_photo) }}" alt="" />
																		<div class="main" data-img-url="{{ asset('storage/' . $gallery_photo) }}"></div>
																	</div>
																</div>
															</li>
                                                            @endforeach
															<li>
																<div class="list_inner">
																	<div class="my_image">
																		<img src="img/thumbs/4-2.jpg" alt="" />
																		<div class="main" data-img-url="img/portfolio/6.jpg"></div>
																	</div>
																</div>
															</li>
															<li>
																<div class="list_inner">
																	<div class="my_image">
																		<img src="img/thumbs/4-2.jpg" alt="" />
																		<div class="main" data-img-url="img/portfolio/7.jpg"></div>
																	</div>
																</div>
															</li>
														</ul>
													</div>
												</div>
											</div>
											<!-- /Modalbox Info Start -->
										</div>
									</li>
                                    @endforeach
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /PORTFOLIO -->

				<!-- NEWS -->
				<div id="news" class="kioto_tm_section">
					<div class="container">
						<div class="kioto_tm_news">
							<div class="kioto_tm_title">
								<span>// Latest Posts</span>
							</div>
							<div class="news_list">
								<ul>
                                    @foreach ($articles as $art)
									<li>
										<div class="list_inner">
											<img class="news_image" src="{{ asset('storage/' . $art->cover) }}" alt="" />
											<div class="title">
												<h3><a href="#">{{ $art->title }}</a></h3>
											</div>
											<div class="kioto_tm_metabox">
												<ul>
													<li>
														<span class="author">Category: <a href="#">{{ $art->category->name }}</a></span>
													</li>
													<li>
														<span class="date">{{ $art->created_at }}</span>
													</li>
												</ul>
											</div>
										</div>
										<a class="kioto_tm_full_link" href="#"></a>

										<!-- Modalbox Info Start -->
										<div class="news_hidden_details">
											<div class="news_popup_informations">
												<div class="text">
                                                    {{ strip_tags(str_replace(['</p>', '<br>', '<br/>', '<br />'], "\n", $art->description)) }}
												</div>
											</div>
										</div>
										<!-- /Modalbox Info End -->
									</li>
                                    @endforeach


								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- /NEWS -->

				<!-- CONTACT -->
				<div id="contact" class="kioto_tm_section">
					<div class="container">
						<div class="kioto_tm_contact">
							<div class="kioto_tm_title">
								<span>// Get In Touch</span>
							</div>
							<div class="info_list">
								<ul>
									<li>
										<div class="list_inner">
											<img class="svg icon" src="{{ asset('frontend/img/svg/location.svg') }}" alt="" />
											<span>{{ $data->address }}</span>
										</div>
									</li>
									<li>
										<div class="list_inner">
											<img class="svg icon" src="{{ asset('frontend/img/svg/call.png') }}" alt="" />
											<span><a class="line_effect" href="#">{{ $data->phone }}</a></span>
										</div>
									</li>
									<li>
										<div class="list_inner">
											<img class="svg icon" src="{{ asset('frontend/img/svg/mail-2.svg') }}" alt="" />
											<span><a class="line_effect" href="#">{{ $data->public_email }}</a></span>
										</div>
									</li>
									<li>
										<div class="list_inner">
											<img class="svg icon" src="{{ asset('frontend/img/svg/social.svg') }}" alt="" />
											<div class="kioto_tm_social">
                                                @php
                                                    $links = $data->links
                                                @endphp
												<ul>
                                                    @foreach ($links as $link)
                                                        <li>
                                                            <a href="{{ $link['url'] }}" target="_blank" rel="noopener noreferrer">
                                                                <img class="svg" src="@if ($link['name'] === 'Facebook')
                                                                    {{ asset('frontend/img/svg/social/facebook.svg') }}
                                                                @elseif ($link['name'] === 'Behance')
                                                                    {{ asset('frontend/img/svg/social/behance.svg') }}
                                                                @elseif ($link['name'] === 'Dribbble')
                                                                    {{ asset('frontend/img/svg/social/dribbble.svg') }}
                                                                @elseif ($link['name'] === 'Tiktok')
                                                                    {{ asset('frontend/img/svg/social/tik-tok.svg') }}
                                                                @elseif ($link['name'] === 'Youtube')
                                                                    {{ asset('frontend/img/svg/social/youtube.png') }}
                                                                @elseif ($link['name'] === 'Twitter')
                                                                    {{ asset('frontend/img/svg/social/twitter.png') }}
                                                                @elseif ($link['name'] === 'LinkedIn')
                                                                    {{ asset('frontend/img/svg/social/linkedin.png') }}
                                                                @endif
                                                                " alt="{{ $link['name'] }}"/>
                                                            </a>
                                                        </li>
                                                    @endforeach
												</ul>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<!-- Form -->
							<div class="form_wrapper">
								<form id="contactForm">
									<div class="error_box" id="empty-form">
										<p>Please Fill Required Fields</p>
									</div>
									<div class="error_box" id="subject-alert">
										<p>Please Select Subject</p>
									</div>
									<div class="error_box" id="security-alert">
										<p>Security code does not match !</p>
									</div>
									<div class="error_box" id="email-invalid">
										<p>Please enter a valid email address. Exp. example@gmail.com</p>
									</div>
									<div class="error_box" id="phone-invalid">
										<p>Please enter a valid phone number.Exp. +998991774433</p>
									</div>
									<div class="error_box" id="error_mail">
										<p></p>
									</div>
									<div class="success_box" id="success_mail">
										<p>Your message has been sent. We will contact you as soon as possible.</p>
									</div>
									<ul>
										<li>
											<input type="text" placeholder="Name" name="contact_name" class="cf-form-control"/>
											<span></span>
										</li>
										<li>
											<input type="text" placeholder="Email" name="contact_email" class="cf-form-control" />
											<span></span>
										</li>
										<li>
											<input type="text" placeholder="Phone" name="contact_phone" class="cf-form-control"/>
											<span></span>
										</li>
										<li>
											<select name="contact_subject" class="cf-form-control">
                                                <option value="">Select Service</option>
                                                @pp
                                                @foreach ($services as $val)
                                                <option value="{{ $val->name }}">{{ $val->name }}</option>
                                                @endforeach
											</select>
										</li>
										<li id="text-area-w">
											<textarea placeholder="Message" name="contact_message" class="cf-form-control"></textarea>
										</li>
									</ul>
									<div class="kioto_tm_button">
										<a id="send_message" class="tm_text_effect" href="#">Send Message</a>
									</div>
								</form>
							</div>
							<!-- /Form -->
						</div>
					</div>
				</div>
				<!-- /CONTACT -->

			</div>
		</div>
		<!-- /RIGHTPART -->

		<!-- CURSOR -->
		<div class="mouse-cursor cursor-outer"></div>
		<div class="mouse-cursor cursor-inner"></div>
		<!-- /CURSOR -->
	</div>
	<!-- / WRAPPER ALL -->

<!-- SCRIPTS -->
<script src="{{ asset('frontend/js/jquery.js') }}"></script>
<script src="{{ asset('frontend/js/plugins.js') }}"></script>
<script src="{{ asset('frontend/js/contact.form.js') }}"></script>
<script src="{{ asset('frontend/js/init.js') }}"></script>
<!-- /SCRIPTS -->

</body>
</html>