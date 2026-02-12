<?php
     
   $CurrentPage = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

	$DexignZoneSettings = [	
		'site_level' => [
			'site_title' => 'Zenix - PHP Crypto Bootstrap Admin Dashboard  Template',
			'favicon' => 'assets/images/favicon.png',
			'seo' => [
					'page_title' => 'Dashboard',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			'fonts' => [
	         'google' => [
	            'families' => [
	               'Poppins:300,400,500,600,700',
	            ]
	         ] 
	      ],
		   'asset_url' => 'assets/',
			'support_button' => true,
			'theme_option' => true,
		],
		'global' => [
			'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				'css/style.css',
			],
			'js' => [
				'top'=> [
					'vendor/global/global.min.js',
					'vendor/bootstrap-select/dist/js/bootstrap-select.min.js',
				],
				'bottom'=>[
					'js/custom.js',
					'js/deznav-init.js',
				],
			],
		],	
		'pagelevel' => [
			'index' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/dashboard-1.js',
					'vendor/owl-carousel/owl.carousel.js',
				],
				'seo' => [
					'page_title' => 'Dashboard',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'index-2' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/owl-carousel/owl.carousel.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/dashboard-1.js',
					'vendor/owl-carousel/owl.carousel.js',
				],
				'seo' => [
					'page_title' => 'Dashboard',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'my-wallets' => [
				'css' => [
					'vendor/owl-carousel/owl.carousel.css',
					'vendor/swiper/css/swiper-bundle.min.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/my-wallet.js',
					'vendor/owl-carousel/owl.carousel.js',
					'vendor/swiper/js/swiper-bundle.min.js',
				],
				'seo' => [
					'page_title' => 'My Wallets',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'tranasactions' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'seo' => [
					'page_title' => 'Tranasactions',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'coin-details' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/bootstrap-daterangepicker/daterangepicker.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/coin-details.js',
					'vendor/moment/moment.min.js',
					'vendor/bootstrap-daterangepicker/daterangepicker.js',
				],
				'seo' => [
					'page_title' => 'Coin Details',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			
			'portofolio' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/dashboard/portofolio.js',
				],
				'seo' => [
					'page_title' => 'Portofolio',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'market-capital' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'js/dashboard/market-capital.js',
				],
				'seo' => [
					'page_title' => 'Market Capital',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'contact-card' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					'js/dashboard/contact.js"'
				],
				'seo' => [
					'page_title' => 'Contact Card',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'user-list-datatable' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'seo' => [
					'page_title' => 'User List Datatable',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'contact-list' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'seo' => [
					'page_title' => 'Contact List',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'content-add' => [
				'css' => [
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
					'js/dashboard/cms.js',
				],
				'js' => [
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
					'vendor/ckeditor/ckeditor.js',
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Content Add',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'email-template' => [
				'css' => [
				'vendor/datatables/css/jquery.dataTables.min.css',
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Email Template',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'add-email' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/select2/css/select2.min.css',
				],
				'js' => [
					'vendor/ckeditor/ckeditor.js',
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Add Email',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'menu' => [
				'css' => [
				'vendor/nestable2/css/jquery.nestable.min.css',
				
				],
				'js' => [
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Menu',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'app-calender' => [
				'css' => [
				'vendor/fullcalendar/css/main.min.css'
				],
				'js' => [
					'vendor/moment/moment.min.js',
					'vendor/fullcalendar/js/main.min.js',
					'js/plugins-init/fullcalendar-init.js',
				],
				'seo' => [
					'page_title' => 'Calender',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'app-profile' => [
				'css' => [
					'vendor/lightgallery/css/lightgallery.min.css'
				],
				'js' => [
					'vendor/lightgallery/js/lightgallery-all.min.js'
				],
				'seo' => [
					'page_title' => 'Profile',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			
			'post-details' => [
				'css' => [
					'vendor/lightgallery/css/lightgallery.min.css'
				],
				'js' => [
					'vendor/lightgallery/js/lightgallery-all.min.js'
				],
				'seo' => [
					'page_title' => 'Post Details',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'add-blog' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css',
					'vendor/select2/css/select2.min.css',
				],
				'js' => [
					'vendor/ckeditor/ckeditor.js',
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Add Blog',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'blog-category' => [
				'css' => [
				'vendor/datatables/css/jquery.dataTables.min.css',
				
				],
				'js' => [
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Blog Category',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],

			'chart-chartist' => [
				'css' => [
				'vendor/chartist/css/chartist.min.css'
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'js/plugins-init/chartist-init.js',
				],
				'seo' => [
					'page_title' => 'Chart Chartist',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'chart-chartjs' => [
				'css' => [
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'js/plugins-init/chartjs-init.js',
				],
				'seo' => [
					'page_title' => 'Chartjs',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'chart-flot' => [
				'css' => [
				],
				'js' => [
					'vendor/flot/jquery.canvaswrapper.js',
					'vendor/flot/jquery.colorhelpers.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.saturated.js',
					'vendor/flot/jquery.flot.browser.js',
					'vendor/flot/jquery.flot.drawSeries.js',
					'vendor/flot/jquery.flot.uiConstants.js',
					'vendor/flot/jquery.flot.categories.js',
					'js/plugins-init/flot-init.js',
				],
				'seo' => [
					'page_title' => 'Chart Flot',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'chart-morris' => [
				'css' => [
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/raphael/raphael.min.js',
					'vendor/morris/morris.min.js',
					'js/plugins-init/morris-init.js',
				],
				'seo' => [
					'page_title' => 'Chart Morris',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'chart-peity' => [
				'css' => [
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
				],
				'seo' => [
					'page_title' => 'Chart Peity',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'chart-sparkline' => [
				'css' => [
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/svganimation/vivus.min.js',
					'vendor/svganimation/svg.animation.js',
				],
				'seo' => [
					'page_title' => 'Chart Sparkline',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-checkout' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Checkout',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-customers' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Customers',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-invoice' => [
				'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css'
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Invoice',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-product-detail' => [
				'css' => [
				'vendor/star-rating/star-rating-svg.css',
				],
				'js' => [
					'vendor/star-rating/jquery.star-rating-svg.js',
				],
				'seo' => [
					'page_title' => 'Product Detail',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-product-grid' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Product Grid',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-product-list' => [
				'css' => [
					'vendor/star-rating/star-rating-svg.css'
				],
				'js' => [
					'vendor/star-rating/jquery.star-rating-svg.js'
				],
				'seo' => [
					'page_title' => 'Product List',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ecom-product-order' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Product Order',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'email-compose' => [
				'css' => [
				'vendor/dropzone/dist/dropzone.css'
				],
				'js' => [
					'vendor/dropzone/dist/dropzone.js'
				],
				'seo' => [
					'page_title' => 'Compose',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'email-inbox' => [
				'css' => [
				
				],
				'js' => [
					'vendor/dropzone/dist/dropzone.js',
				],
				'seo' => [
					'page_title' => 'Inbox',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'email-read' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Email Read',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-ckeditor' => [
				'css' => [
				],
				'js' => [
					'vendor/ckeditor/ckeditor.js'
				],
				'seo' => [
					'page_title' => 'Ckeditor',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-element' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Element',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-pickers' => [
				'css' => [
					'vendor/bootstrap-daterangepicker/daterangepicker.css',
					'vendor/clockpicker/css/bootstrap-clockpicker.min.css',
					'vendor/jquery-asColorPicker/css/asColorPicker.min.css',
					'vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css',
					'vendor/pickadate/themes/default.css',
					'vendor/pickadate/themes/default.date.css',
					'https://fonts.googleapis.com/icon?family=Material+Icons',
				],
				'js' => [
					'vendor/moment/moment.min.js',
					'vendor/bootstrap-daterangepicker/daterangepicker.js',
					'vendor/clockpicker/js/bootstrap-clockpicker.min.js',
					'vendor/jquery-asColor/jquery-asColor.min.js',
					'vendor/jquery-asGradient/jquery-asGradient.min.js',
					'vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js',
					'vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js',
					'vendor/pickadate/picker.js',
					'vendor/pickadate/picker.time.js',
					'vendor/pickadate/picker.date.js',
					'js/plugins-init/bs-daterange-picker-init.js',
					'js/plugins-init/clock-picker-init.js',
					'js/plugins-init/jquery-asColorPicker.init.js',
					'js/plugins-init/material-date-picker-init.js',
					'js/plugins-init/pickadate-init.js',
				],
				'seo' => [
					'page_title' => 'Pickers',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'blog' => [
				'css' => [
				'vendor/datatables/css/jquery.dataTables.min.css',
				'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
				],
				'js' => [
					'js/dashboard/cms.js',
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
				],
				'seo' => [
					'page_title' => 'Blog',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'content' => [
				'css' => [
					'vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css',
				],
				'js' => [
					'vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js',
					'js/dashboard/cms.js',
				],
				'seo' => [
					'page_title' => 'Content',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-validation-jquery' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Form Validation',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-wizard' => [
				'css' => [
					'vendor/jquery-smartwizard/dist/css/smart_wizard.min.css',
				],
				'js' => [
					'vendor/jquery-steps/build/jquery.steps.min.js',
					'vendor/jquery-validation/jquery.validate.min.js',
					'js/plugins-init/jquery.validate-init.js',
					'vendor/jquery-smartwizard/dist/js/jquery.smartWizard.js',
				],
				'seo' => [
					'page_title' => 'Wizard',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'map-jqvmap' => [
				'css' => [
				'vendor/jqvmap/css/jqvmap.min.css'
				],
				'js' => [
					'vendor/jqvmap/js/jquery.vmap.min.js',
					'vendor/jqvmap/js/jquery.vmap.world.js',
					'vendor/jqvmap/js/jquery.vmap.usa.js',
					'js/plugins-init/jqvmap-init.js',
				],
				'seo' => [
					'page_title' => 'Jqvmap',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'page-error-400' => [
				'css' => [
				'vendor/bootstrap-select/dist/css/bootstrap-select.min.css'
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Dashboard',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'table-bootstrap-basic' => [
				'css' => [
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'seo' => [
					'page_title' => 'Table Bootstrap',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'table-datatable-basic' => [
				'css' => [
					'vendor/datatables/css/jquery.dataTables.min.css'
				],
				'js' => [
					'vendor/datatables/js/jquery.dataTables.min.js',
					'js/plugins-init/datatables.init.js',
				],
				'seo' => [
					'page_title' => 'Table Datatable',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-lightgallery' => [
				'css' => [
					'vendor/lightgallery/css/lightgallery.min.css',
					
				],
				'js' => [
					'vendor/lightgallery/js/lightgallery-all.min.js',
				],
				'seo' => [
					'page_title' => 'Lightgallery',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-nestable' => [
				'css' => [
					'vendor/nestable2/css/jquery.nestable.min.css'
				],
				'js' => [
					'vendor/nestable2/js/jquery.nestable.min.js',
					'js/plugins-init/nestable-init.js',
				],
				'seo' => [
					'page_title' => 'Nestable',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-noui-slider' => [
				'css' => [
					'vendor/nouislider/nouislider.min.css'
				],
				'js' => [
					'vendor/nouislider/nouislider.min.js',
					'vendor/wnumb/wNumb.js',
					'js/plugins-init/nouislider-init.js',
				],
				'seo' => [
					'page_title' => 'Noui Slider',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-select2' => [
				'css' => [
					'vendor/select2/css/select2.min.css'
				],
				'js' => [
					'vendor/select2/js/select2.full.min.js',
					'js/plugins-init/select2-init.js',
				],
				'seo' => [
					'page_title' => 'Select2',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-sweetalert' => [
				'css' => [
					'vendor/sweetalert2/dist/sweetalert2.min.css'
				],
				'js' => [
					'vendor/sweetalert2/dist/sweetalert2.min.js',
					'js/plugins-init/sweetalert.init.js',
				],
				'seo' => [
					'page_title' => 'Sweetalert',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'uc-toastr' => [
				'css' => [
				'vendor/toastr/css/toastr.min.css'
				],
				'js' => [
					'vendor/toastr/js/toastr.min.js',
					'js/plugins-init/toastr-init.js',
				],
				'seo' => [
					'page_title' => 'Toastr',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'form-editor-summernote' => [
				'css' => [
				
				],
				'js' => [
					'vendor/ckeditor/ckeditor.js'
				],
				'seo' => [
					'page_title' => 'Summernote',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-accordion' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Accordion',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-alert' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Alert',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-badge' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Badge',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-button' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Button',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-button-group' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Button Group',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-card' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Card',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-carousel' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Carousel',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-dropdown' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Dropdown',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-grid' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Grid',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-list-group' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'List Group',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-media-object' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Media Object',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-modal' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Modal',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-pagination' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Pagination',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-popover' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Popover',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-progressbar' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Progressbar',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-tab' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Tab',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'ui-typography' => [
				'css' => [
				],
				'js' => [
					
				],
				'seo' => [
					'page_title' => 'Typography',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
			'widget-basic' => [
				'css' => [
					'vendor/chartist/css/chartist.min.css',
					'vendor/bootstrap-select/dist/css/bootstrap-select.min.css',
				],
				'js' => [
					'vendor/chart.js/Chart.bundle.min.js',
					'vendor/apexchart/apexchart.js',
					'vendor/chartist/js/chartist.min.js',
					'vendor/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js',
					'vendor/flot/jquery.canvaswrapper.js',
					'vendor/flot/jquery.colorhelpers.js',
					'vendor/flot/jquery.flot.js',
					'vendor/flot/jquery.flot.saturated.js',
					'vendor/flot/jquery.flot.browser.js',
					'vendor/flot/jquery.flot.drawSeries.js',
					'vendor/flot/jquery.flot.uiConstants.js',
					'vendor/flot/jquery.flot.categories.js',
					'vendor/jquery-sparkline/jquery.sparkline.min.js',
					'js/plugins-init/sparkline-init.js',
					'vendor/peity/jquery.peity.min.js',
					'js/plugins-init/piety-init.js',
					'js/plugins-init/widgets-script-init.js',
				],
				'seo' => [
					'page_title' => 'Widget Basic',
					'meta' => [
						['name' => 'keywords', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements."
						'],
						['name' => 'author', 'content' => 'DexignZone'],

						['name' => 'robots', 'content' => 'index, follow'],

						['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, minimal-ui, viewport-fit=cover'],

						['name' => 'description', 'content' => 'Explore Zenix, a powerful PHP crypto admin dashboard and frontend template built with Bootstrap. Enhance your cryptocurrency web application development with this responsive and customizable admin panel and frontend template. Includes HTML5, CSS3, Bootstrap, and modern design elements.'],
						['property' => 'og:title', 'content' => ''],
						['property' => 'og:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['property' => 'og:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'format-detection', 'content' => 'telephone=no'],
						['name' => 'twitter:title', 'content' => ''],

						['name' => 'twitter:description', 'content' => 'PHP Crypto Bootstrap Admin Dashboard, FrontEnd Template, Zenix, Admin Panel, Bootstrap Dashboard, PHP Dashboard Template, Crypto Admin Template, Responsive Design, HTML5, CSS3, Bootstrap, Customizable, Modern Design, Crypto Dashboard, Cryptocurrency Admin Template, Crypto UI Kit, Web Application Development, Dashboard UI Components, Data Visualization, User Interface, Backend Template, PHP Framework'],

						['name' => 'twitter:image', 'content' => 'https://zenix.dexignzone.com/php/social-image.png'],
						['name' => 'twitter:card', 'content' => 'summary_large_image'],
					],
				],
			],
		],
	];
	



	$pageTitle = !empty($DexignZoneSettings['pagelevel'][$CurrentPage]['seo']['page_title']) ? $DexignZoneSettings['pagelevel'][$CurrentPage]['seo']['page_title'] : $DexignZoneSettings['site_level']['seo']['page_title'];

	global $AdminTitle;
	global $CurrentPage; 
	global $pageTitle; 
	global $DexignZoneSettings; 
?>
