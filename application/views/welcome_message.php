<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Landing Page</title>
    <link href="https://fonts.googleapis.com/css?family=Heebo:400,400i,500,700|Titillium+Web:600" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/elli/dist/css/style.css'); ?>">
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
</head>
<body class="is-boxed">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
								<svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
								    <title>Landing Page</title>
								    <defs>
								        <linearGradient x1="0%" y1="0%" y2="100%" id="logo-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="0%" y1="0%" y2="100%" id="logo-b">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="0%" y1="0%" y2="100%" id="logo-c">
								            <stop stop-color="#78F9FF" stop-opacity=".24" offset="0%"/>
								            <stop stop-color="#43F1FF" offset="55.496%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <path d="M4 0h12v16H0V4a4 4 0 0 1 4-4z" fill="url(#logo-a)"/>
								        <path d="M16 16h16v12a4 4 0 0 1-4 4H16V16z" fill="url(#logo-b)"/>
								        <path d="M11.5 20.5H.5v1h10v10h1v-11z" stroke="url(#logo-c)" transform="matrix(-1 0 0 1 12 0)"/>
								        <path d="M31.5.5h-11v1h10v10h1V.5z" stroke="url(#logo-c)" transform="matrix(1 0 0 -1 0 12)"/>
								    </g>
								</svg>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0 is-revealing">Landing template for startups</h1>
							<p class="hero-paragraph is-revealing">Our landing page template works on all devices, so you only have to set it up once, and get beautiful results forever.</p>
							
							<form action="<?php echo base_url("/email.php"); ?>" method="post">
							<div class="hero-form field field-grouped is-revealing">
	                            <div class="control control-expanded">
	                                <input class="input" type="email" name="email" placeholder="Seu Melhor E-Mail&hellip;">
	                            </div>
	                            <div class="control">
									<input class="button button-primary button-block"  type="submit" value="Notify Me" name="submit">
	                                <!--<a class="button button-primary button-block" href=<?php echo base_url("/email.php"); ?>>Notify Me</a> -->
	                            </div>
							</div>
							</form>
						</div>
						<div class="hero-illustration">
							<div class="hero-bg">
								<svg width="720" height="635" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="97.738%" id="a">
								            <stop stop-color="#151616" offset="0%"/>
								            <stop stop-color="#222424" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <path d="M0 0h720v504.382L279.437 630.304c-53.102 15.177-108.454-15.567-123.631-68.669-.072-.25-.142-.5-.211-.75L0 0z" fill="url(#a)" fill-rule="evenodd"/>
								</svg>
							</div>
							<div class="hero-square hero-square-1 is-moving-object is-rotating">
								<svg width="220" height="220" xmlns="http://www.w3.org/2000/svg">
									<defs>
										<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-1-a">
											<stop stop-color="#4353FF" offset="0%"/>
											<stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
										</linearGradient>
										<linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="square-1-b">
											<stop stop-color="#43F1FF" stop-opacity="0" offset="0%"/>
											<stop stop-color="#43F1FF" offset="53.489%"/>
											<stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
										</linearGradient>
									</defs>
									<g fill="none" fill-rule="evenodd">
										<path fill="url(#square-1-a)" opacity=".64" d="M0 0h220v220H0z"/>
										<path d="M0 65.022V61.7c51.102-26.116 77.322-13.388 77.322 38.41 0 57.718 25.944 67.701 79.782 30.373l1.709 2.466c-55.678 38.604-84.491 27.517-84.491-32.839 0-49.494-24.315-61.27-74.322-35.087z" fill="url(#square-1-b)" fill-rule="nonzero" opacity=".701"/>
										<path d="M113.203 220c2.943-57.607 37.666-164 90.473-164 4.973 0 10.458.203 16.324.614v77.24c-5.819.237-11.3 1.007-16.324 2.458-32.685 9.44-57.608 55.87-72.976 83.688h-17.497z" fill-opacity=".096" fill="#43F1FF"/>
									</g>
								</svg>
							</div>
							<div class="hero-square hero-square-2 is-moving-object is-rotating">
								<svg width="88" height="88" xmlns="http://www.w3.org/2000/svg">
									<defs>
										<linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-2-a">
											<stop stop-color="#4353FF" offset="0%"/>
											<stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
										</linearGradient>
										<linearGradient x1="-31.43%" y1="104.265%" x2="143.71%" y2="43.581%" id="square-2-b">
											<stop stop-color="#43F1FF" stop-opacity=".24" offset="0%"/>
											<stop stop-color="#43F1FF" stop-opacity=".16" offset="100%"/>
										</linearGradient>
									</defs>
									<g fill="none" fill-rule="evenodd">
										<path fill="url(#square-2-a)" d="M0 0h88v88H0z"/>
										<path d="M19.717 36.579C13.824 33.969 7.004 32.555 0 31.535V0h88v88H76.869C59.773 67.766 40.697 45.872 19.717 36.579z" fill="url(#square-2-b)"/>
									</g>
								</svg>
							</div>
							<div class="hero-square hero-square-3 is-moving-object is-rotating">
								<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-3-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".16" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="-58.825%" y1="39.622%" x2="81.589%" y2="-11.971%" id="square-3-b">
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".163" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd" opacity=".64">
								        <path fill="url(#square-3-a)" d="M0 0h64v64H0z"/>
								        <path d="M14.03 0C27.176 13.07 42 27.791 42 38.165c0 17.46-14.154-11.127-31.614-11.127-2.67 0-6.289.931-10.386 2.406V0h14.03z" fill="url(#square-3-b)"/>
								    </g>
								</svg>
							</div>
							<div class="hero-square hero-square-4 is-moving-object is-rotating">
								<svg width="320" height="320" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-4-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="square-4-b">
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="0%"/>
								            <stop stop-color="#43F1FF" offset="53.489%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="0%" y1="57.64%" x2="94.346%" y2="8.32%" id="square-4-c">
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".16" offset="100%"/>
								        </linearGradient>
								        <radialGradient cx="100%" cy="100%" fx="100%" fy="100%" r="136.8%" id="square-4-d">
								            <stop stop-color="#43F1FF" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </radialGradient>
								        <radialGradient cx="100%" cy="100%" fx="100%" fy="100%" r="140.264%" id="square-4-e">
								            <stop stop-color="#43F1FF" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </radialGradient>
								        <radialGradient cx="100%" cy="100%" fx="100%" fy="100%" r="137.638%" id="square-4-f">
								            <stop stop-color="#43F1FF" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </radialGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <rect fill="url(#square-4-a)" width="320" height="320" rx="2"/>
								        <path d="M278.958 209.715c-54.758 37.966-82.136 27.43-82.136-31.606s-34.335-65.905-103.005-20.607C49.492 185.246 33.604 160.412 46.154 83" stroke="url(#square-4-b)" stroke-width="3"/>
								        <path d="M71.05 41.844c57.243-16.532 154.657 38.697 154.657-16.532 0-8.934-4.692-17.934-10.123-25.312H0v99.92c19.6-22.665 44.942-50.536 71.05-58.076z" fill="url(#square-4-c)"/>
								        <path d="M320 320V66C179.72 66 66 179.72 66 320h254z" fill="url(#square-4-d)" opacity=".16"/>
								        <path d="M320 320V131c-104.382 0-189 84.618-189 189h189z" fill="url(#square-4-e)" opacity=".32"/>
								        <path d="M320 320V196c-68.483 0-124 55.517-124 124h124z" fill="url(#square-4-f)"/>
								    </g>
								</svg>
							</div>
							<div class="hero-square hero-square-5 is-moving-object is-rotating">
								<svg width="141" height="140" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-5-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="27.288%" y1="50%" x2="172.696%" y2="-8.701%" id="square-5-b">
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".16" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="square-5-c">
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="0%"/>
								            <stop stop-color="#43F1FF" offset="53.489%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <path opacity=".24" fill="url(#square-5-a)" d="M19 18h128v128H19z" transform="translate(-6 -6)"/>
								        <path d="M147 76.088V18h-35.004c-4.63 24.206-16.838 55.057-44.819 79.224-63.217 54.6 46.59-21.136 79.823-21.136z" opacity=".24" fill="url(#square-5-b)" transform="translate(-6 -6)"/>
								        <path d="M0 0l39.459 40.249" stroke="url(#square-5-c)" stroke-width="3" transform="translate(-6 -6)"/>
								    </g>
								</svg>
							</div>
							<div class="hero-square hero-square-6 is-moving-object is-rotating">
								<svg width="128" height="128" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-6-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="14.98%" y1="57.941%" x2="95.966%" y2="33.366%" id="square-6-b">
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".16" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="97.033%" y1="97.033%" x2="0%" y2="0%" id="square-6-c">
								            <stop stop-color="#43F1FF" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".24" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="square-6-d">
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="0%"/>
								            <stop stop-color="#43F1FF" offset="53.489%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <path fill="url(#square-6-a)" d="M0 0h128v128H0z"/>
								        <path d="M27.652 128H0V32.762c13.602-4.224 26.559-6.606 36.988-6.606 42.25 0-38.976 13.508-19.488 50.235C25.002 90.529 28.544 109.73 27.652 128z" fill="url(#square-6-b)"/>
								        <path fill="url(#square-6-c)" opacity=".32" d="M88 88h40v40H88z"/>
								        <path d="M69 68l39.459 40.249" stroke="url(#square-6-d)" stroke-width="3"/>
								    </g>
								</svg>
							</div>
							<div class="hero-square hero-square-7 is-moving-object is-rotating">
								<svg width="64" height="64" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-7-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <radialGradient cx="-5.754%" cy="67.691%" fx="-5.754%" fy="67.691%" r="140.869%" gradientTransform="scale(-1 -.64163) rotate(55.582 1.643 -.08)" id="square-7-b">
								            <stop stop-color="#43F1FF" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </radialGradient>
								        <linearGradient x1="0%" y1="23.176%" x2="96.787%" y2="88.669%" id="square-7-c">
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="0%"/>
								            <stop stop-color="#43F1FF" offset="32.912%"/>
								            <stop stop-color="#43F1FF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd" opacity=".601">
								        <path fill="url(#square-7-a)" d="M0 0h64v64H0z"/>
								        <path d="M0 64V.1C22.901 1.644 41 20.709 41 44c0 7.202-1.73 14-4.798 20H0z" fill="url(#square-7-b)"/>
								        <path d="M63.925 58.495c-4.136-2.459-9.143-4.747-15.272-6.916-23.745-8.402-32.768-20.182-27.972-32.9 2.7-7.16 9.914-13.947 18.763-18.679h7.221c-10.84 4.263-20.209 11.866-23.177 19.737-4.076 10.81 3.808 21.103 26.166 29.014 5.524 1.955 10.252 4.048 14.271 6.3v3.444z" fill="url(#square-7-c)" fill-rule="nonzero"/>
								    </g>
								</svg>
							</div>
							<div class="hero-square hero-square-8 is-moving-object is-rotating">
								<svg width="40" height="40" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="50%" y1="0%" x2="50%" y2="100%" id="square-8-a">
								            <stop stop-color="#4353FF" offset="0%"/>
								            <stop stop-color="#4353FF" stop-opacity=".32" offset="100%"/>
								        </linearGradient>
								        <linearGradient x1="66.071%" y1="50%" x2="168.952%" y2="11.585%" id="square-8-b">
								            <stop stop-color="#43F1FF" stop-opacity=".123" offset="0%"/>
								            <stop stop-color="#43F1FF" stop-opacity=".16" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <g fill="none" fill-rule="evenodd">
								        <path fill="url(#square-8-a)" opacity=".24" d="M0 0h40v40H0z"/>
								        <path d="M40 0h-4.67c-.999 7.225-3.804 17.536-12.85 25.35-15.393 13.294 5.041-.287 17.36-4.644L40 0z" fill="url(#square-8-b)"/>
								    </g>
								</svg>
							</div>
							<div class="hero-dots hero-dots-1 is-moving-object is-translating" data-translating-factor="160">
								<svg width="279" height="97" xmlns="http://www.w3.org/2000/svg">
								    <g fill="#43F1FF" fill-rule="evenodd">
								        <path d="M71.686 0l-2.899 1.334L68 4.157l.926 2.688L71.686 8l2.6-1.31L76 4.156l-1.295-2.94z"/>
								        <path fill-opacity=".64" d="M38.843 2l-1.45.667L37 4.079l.463 1.344 1.38.577 1.3-.655L41 4.079l-.648-1.47z"/>
								        <path fill-opacity=".24" d="M65.843 55l-1.45.667L64 57.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".64" d="M94.765 29l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".8" d="M58.765 25l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".48" d="M18.843 44l-1.45.667L17 46.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".64" d="M8.843 29l-1.45.667L7 31.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".48" d="M32.843 29l-1.45.667L31 31.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47zM.922 45l-.725.333L0 46.04l.232.672.69.289.65-.328L2 46.04l-.324-.735z"/>
								        <path fill-opacity=".24" d="M267.843 93l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".8" d="M275.765 75l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".48" d="M259.843 78l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								    </g>
								</svg>
							</div>
							<div class="hero-dots hero-dots-2 is-moving-object is-translating" data-translating-factor="120">
								<svg width="138" height="132" xmlns="http://www.w3.org/2000/svg">
								    <g fill="#43F1FF" fill-rule="evenodd">
								        <path d="M73.686 66l-2.899 1.334L70 70.157l.926 2.688L73.686 74l2.6-1.31L78 70.156l-1.295-2.94z"/>
								        <path fill-opacity=".64" d="M108.843 0l-1.45.667L107 2.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".24" d="M135.843 53l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".64" d="M107.765 53l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".8" d="M128.765 23l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".48" d="M88.843 42l-1.45.667L87 44.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".64" d="M78.843 27l-1.45.667L77 29.079l.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".48" d="M102.843 27l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47zM70.922 43l-.725.333-.197.706.232.672.69.289.65-.328.428-.633-.324-.735z"/>
								        <path d="M2.765 126L.59 127 0 129.118l.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
								        <path fill-opacity=".64" d="M24.843 127l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
								        <path fill-opacity=".48" d="M6.922 114l-.725.333-.197.706.232.672.69.289.65-.328.428-.633-.324-.735z"/>
								    </g>
								</svg>
							</div>
							<div class="hero-dots hero-dots-3 is-moving-object is-translating" data-translating-factor="160">
								<svg width="98" height="59" xmlns="http://www.w3.org/2000/svg">
								    <g fill="#43F1FF" fill-rule="evenodd">
								        <path d="M26.314 0l2.899 1.334L30 4.157l-.926 2.688L26.314 8l-2.6-1.31L22 4.156l1.295-2.94z"/>
								        <path fill-opacity=".64" d="M59.157 2l1.45.667L61 4.079l-.463 1.344-1.38.577-1.3-.655L57 4.079l.648-1.47z"/>
								        <path fill-opacity=".24" d="M32.157 55l1.45.667.393 1.412-.463 1.344-1.38.577-1.3-.655L30 57.079l.648-1.47z"/>
								        <path fill-opacity=".64" d="M3.235 29l2.175 1L6 32.118l-.695 2.016-2.07.866-1.95-.983L0 32.117l.972-2.204z"/>
								        <path fill-opacity=".8" d="M39.235 25l2.175 1 .59 2.118-.695 2.016-2.07.866-1.95-.983-1.285-1.9.972-2.204z"/>
								        <path fill-opacity=".48" d="M79.157 44l1.45.667.393 1.412-.463 1.344-1.38.577-1.3-.655L77 46.079l.648-1.47z"/>
								        <path fill-opacity=".64" d="M89.157 29l1.45.667.393 1.412-.463 1.344-1.38.577-1.3-.655L87 31.079l.648-1.47z"/>
								        <path fill-opacity=".48" d="M65.157 29l1.45.667.393 1.412-.463 1.344-1.38.577-1.3-.655L63 31.079l.648-1.47zM97.078 45l.725.333.197.706-.232.672-.69.289-.65-.328L96 46.04l.324-.735z"/>
								    </g>
								</svg>
							</div>
							<div class="hero-line hero-line-1">
								<svg width="344" height="217" xmlns="http://www.w3.org/2000/svg">
								    <defs>
								        <linearGradient x1="18.74%" y1="17.384%" x2="96.787%" y2="88.669%" id="line-1-a">
								            <stop stop-color="#5D6AFF" stop-opacity="0" offset="0%"/>
								            <stop stop-color="#5D6AFF" offset="53.489%"/>
								            <stop stop-color="#5D6AFF" stop-opacity="0" offset="100%"/>
								        </linearGradient>
								    </defs>
								    <path d="M340.86 180.664l2.281 3.287c-79.796 55.378-120.994 39.511-120.994-47.035 0-82.777-47.283-92.246-144.735-27.901-32.607 20.428-55.391 21.53-67.544 2.516C-1.882 93.147-3.092 56.053 5.987 0l3.948.64c-8.928 55.125-7.743 91.453 3.303 108.736 10.644 16.653 31.058 15.666 62.01-3.725 99.65-65.797 150.9-55.534 150.9 31.265 0 83.03 37.371 97.424 114.713 43.748z" fill="url(#line-1-a)" fill-rule="nonzero" transform="matrix(-1 0 0 1 343.141 0)"/>
								</svg>
							</div>
						</div>
                    </div>
                </div>
            </section>

            <section class="features section">
                <div class="container">
                    <div class="features-inner section-inner">
						<div class="features-wrap">
	                        <div class="feature">
	                            <div class="feature-inner">
									<div class="feature-header mb-16">
										<div class="feature-icon mr-16">
											<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
											    <g fill-rule="nonzero" fill="none">
											        <path d="M7 8H1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1zM19 8h-6a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z" fill="#4353FF"/>
											        <path d="M19 20h-6a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z" fill="#43F1FF"/>
											        <path d="M31 8h-6a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z" fill="#4353FF"/>
											        <path d="M7 20H1a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z" fill="#43F1FF"/>
											        <path d="M7 32H1a1 1 0 0 1-1-1v-6a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1z" fill="#4353FF"/>
											        <path d="M29.5 18h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5z" fill="#43F1FF"/>
											        <path d="M17.5 30h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5zM29.5 30h-3a.5.5 0 0 1-.5-.5v-3a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.5.5z" fill="#4353FF"/>
											    </g>
											</svg>
		                                </div>
		                                <h4 class="feature-title m-0">Discover</h4>
									</div>
	                                <p class="text-sm mb-0">A pseudo-Latin text used in web design, layout, and printing in place of things to emphasise design elements.</p>
	                            </div>
	                        </div>
							<div class="feature">
	                            <div class="feature-inner">
									<div class="feature-header mb-16">
										<div class="feature-icon mr-16">
											<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
											    <g fill-rule="nonzero" fill="none">
											        <path d="M4 12H0V5a5.006 5.006 0 0 1 5-5h7v4H5a1 1 0 0 0-1 1v7z" fill="#43F1FF"/>
											        <path d="M32 12h-4V5a1 1 0 0 0-1-1h-7V0h7a5.006 5.006 0 0 1 5 5v7zM12 32H5a5.006 5.006 0 0 1-5-5v-7h4v7a1 1 0 0 0 1 1h7v4z" fill="#4353FF"/>
											        <path d="M27 32h-7v-4h7a1 1 0 0 0 1-1v-7h4v7a5.006 5.006 0 0 1-5 5z" fill="#43F1FF"/>
											    </g>
											</svg>
		                                </div>
		                                <h4 class="feature-title m-0">Discover</h4>
									</div>
	                                <p class="text-sm mb-0">A pseudo-Latin text used in web design, layout, and printing in place of things to emphasise design elements.</p>
	                            </div>
	                        </div>
							<div class="feature">
	                            <div class="feature-inner">
									<div class="feature-header mb-16">
										<div class="feature-icon mr-16">
											<svg width="32" height="32" xmlns="http://www.w3.org/2000/svg">
											    <g fill="none" fill-rule="nonzero">
											        <path d="M16 9c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z" fill="#4353FF"/>
											        <path d="M27 9c2.206 0 4-1.794 4-4s-1.794-4-4-4-4 1.794-4 4 1.794 4 4 4z" fill="#43F1FF"/>
											        <path d="M27 12c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z" fill="#4353FF"/>
											        <path d="M5 23c-2.206 0-4 1.794-4 4s1.794 4 4 4 4-1.794 4-4-1.794-4-4-4z" fill="#43F1FF"/>
											        <path d="M27 23c-1.859 0-3.41 1.28-3.858 3h-3.284A3.994 3.994 0 0 0 17 23.142v-3.284c1.72-.447 3-2 3-3.858 0-2.206-1.794-4-4-4-1.859 0-3.41 1.28-3.858 3H8.858A3.994 3.994 0 0 0 6 12.142V8.858c1.72-.447 3-2 3-3.858 0-2.206-1.794-4-4-4S1 2.794 1 5c0 1.858 1.28 3.41 3 3.858v3.284c-1.72.447-3 2-3 3.858 0 2.206 1.794 4 4 4 1.859 0 3.41-1.28 3.858-3h3.284A3.994 3.994 0 0 0 15 19.858v3.284c-1.72.447-3 2-3 3.858 0 2.206 1.794 4 4 4 1.859 0 3.41-1.28 3.858-3h3.284c.447 1.72 2 3 3.858 3 2.206 0 4-1.794 4-4s-1.794-4-4-4z" fill="#4353FF"/>
											    </g>
											</svg>
		                                </div>
		                                <h4 class="feature-title m-0">Discover</h4>
									</div>
	                                <p class="text-sm mb-0">A pseudo-Latin text used in web design, layout, and printing in place of things to emphasise design elements.</p>
	                            </div>
	                        </div>
						</div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer">
			<div class="footer-bg">
				<svg width="385" height="305" xmlns="http://www.w3.org/2000/svg">
				    <defs>
				        <linearGradient x1="50%" y1="34.994%" x2="50%" y2="97.738%" id="footer-bg">
				            <stop stop-color="#151616" offset="0%"/>
				            <stop stop-color="#222424" offset="100%"/>
				        </linearGradient>
				    </defs>
				    <path d="M384.557 116.012V305H0L210.643 0l173.914 116.012z" fill="url(#footer-bg)" fill-rule="evenodd"/>
				</svg>
			</div>
			<div class="footer-dots is-moving-object is-translating" data-translating-factor="160">
				<svg width="69" height="91" xmlns="http://www.w3.org/2000/svg">
				    <g fill="#43F1FF" fill-rule="evenodd">
				        <path d="M37.105 41.007l-2.9 1.334-.786 2.823.926 2.689 2.76 1.154 2.6-1.31 1.714-2.533-1.296-2.94z"/>
				        <path fill-opacity=".64" d="M63.109 27.24l-1.45.666-.394 1.412.464 1.344 1.38.577 1.3-.655.856-1.266-.647-1.47z"/>
				        <path fill-opacity=".24" d="M66.226 86.638l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
				        <path fill-opacity=".64" d="M13.497 43.713l-2.175 1-.59 2.118.695 2.016 2.07.866 1.95-.983 1.285-1.9-.972-2.204z"/>
				        <path fill-opacity=".8" d="M59.076 56.658l-2.175 1-.59 2.117.695 2.017 2.07.866 1.949-.983 1.286-1.9-.972-2.204z"/>
				        <path fill-opacity=".48" d="M22.262 18.49l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
				        <path fill-opacity=".64" d="M23.422.5l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47z"/>
				        <path fill-opacity=".48" d="M2.637 12.5l-1.45.667-.393 1.412.463 1.344 1.38.577 1.3-.655.857-1.266-.648-1.47zM36.563 10.856l-.725.334-.197.706.232.672.69.288.65-.327.428-.633-.324-.735z"/>
				    </g>
				</svg>
			</div>
            <div class="container">
                <div class="site-footer-inner has-top-divider">
                    <div class="footer-copyright">&copy; 2021 VCR25, todos os direitos reservados.</div>
					<ul class="footer-social-links list-reset">
						<li>
							<a href="https://www.facebook.com/vagner.correarevocio/">
							<span class="screen-reader-text">Facebook</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
									<path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
								</svg>
							</a>
						</li>

						<li>
							<a href="https://www.instagram.com/vagner_c_revocio/">
							<span class="screen-reader-text">Instagram</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
									<path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
								</svg>
							</a>
						</li>

						<!--<li>
							<a href="#">
								<span class="screen-reader-text">Twitter</span>
								<svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
									<path d="M16 3c-.6.3-1.2.4-1.9.5.7-.4 1.2-1 1.4-1.8-.6.4-1.3.6-2.1.8-.6-.6-1.5-1-2.4-1-1.7 0-3.2 1.5-3.2 3.3 0 .3 0 .5.1.7-2.7-.1-5.2-1.4-6.8-3.4-.3.5-.4 1-.4 1.7 0 1.1.6 2.1 1.5 2.7-.5 0-1-.2-1.5-.4C.7 7.7 1.8 9 3.3 9.3c-.3.1-.6.1-.9.1-.2 0-.4 0-.6-.1.4 1.3 1.6 2.3 3.1 2.3-1.1.9-2.5 1.4-4.1 1.4H0c1.5.9 3.2 1.5 5 1.5 6 0 9.3-5 9.3-9.3v-.4C15 4.3 15.6 3.7 16 3z" fill="#FFFFFF"/>
								</svg>
							</a>
						</li> -->
						<li>
							<a href="<?php echo base_url(); ?>">
							<span class="screen-reader-text">Página</span>
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
									<path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
								</svg>
							</a>
						</li>
					</ul>
                </div>
            </div>
        </footer>
    </div>

    <script src="<?php echo base_url('public/assets/elli/dist/js/main.min.js'); ?>"></script>
</body>
</html>
